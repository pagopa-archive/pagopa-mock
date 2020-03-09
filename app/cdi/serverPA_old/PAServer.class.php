<?php
    require_once "../logWriter.class.php";
    require_once "../Helper.php";
    require_once "../DOMValidator.class.php";

    define("SEC", 60);

    class PAServer
    {
         function paaInviaRT()
        {
            $soapResponse = new StdClass;
            $isValid=true;
            $faultBean="";
            $faultBeanString="";
            $faultBeanDescr="";
            $esito="";
            $idDominio = "77777777777";

            /************************
             * Inserimento timeout
             */
            $minutes=2; //minutes to wait

            $seconds=SEC*$minutes;
           // sleep($seconds);
            /* Fine timeout */

            $soapRequest = file_get_contents ('php://input');
            $xmlRequest = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $soapRequest);
            $xmlRequest = simplexml_load_string($xmlRequest, null, LIBXML_NOCDATA);

            $encodedRT=$xmlRequest->soapenvBody->pptpaaInviaRT->rt;
            $decodedRT=base64_decode($encodedRT);

            //Verify
            if (!$this->verifySchema($decodedRT)) {
                $isValid=false;
                $faultBean="PAA_SINTASSI_XSD";
                $faultBeanString="Errore di sintassi XSD.";
                $faultBeanDescr="Si e' verificato un errore di validazione dello schema XSD della rischiesta.";
            }
            if ($isValid && $xmlRequest->soapenvHeader->pptheadintestazionePPT->identificativoIntermediarioPA != "97735020584") {
                $isValid=false;
                $faultBean="PAA_ID_INTERMEDIARIO_ERRATO";
                $faultBeanString="Identificativo intermediario non corrispondente.";
                $faultBeanDescr="Si e' verificato un errore di validazione dell'intestazione SOAP";
            }
            if ($isValid && $xmlRequest->soapenvHeader->pptheadintestazionePPT->identificativoStazioneIntermediarioPA != "97735020584_01") {
                $isValid=false;
                $faultBean="PAA_STAZIONE_INT_ERRATA";
                $faultBeanString="Stazione intermediario non corrispondente.";
                $faultBeanDescr="Si e' verificato un errore di validazione dell'intestazione SOAP";
            }
            if ($isValid && $xmlRequest->soapenvHeader->pptheadintestazionePPT->identificativoDominio != "77777777777") {
                $isValid=false;
                $faultBean="PAA_ID_DOMINIO_ERRATO";
                $faultBeanString="La PAA non corrisponde al dominio indicato.";
                $faultBeanDescr="Si e' verificato un errore di validazione dell'intestazione SOAP";
            }

            if ($isValid) {
                $esito="OK";
                $soapResponse->paaInviaRTRisposta->esito = $esito;

                $soapMessage = new SoapVar($soapResponse, SOAP_ENC_OBJECT);
            } else {
                $esito="KO";
                $soapResponse->paaInviaRTRisposta->fault->faultCode = $faultBean;
                $soapResponse->paaInviaRTRisposta->fault->faultString = $faultBeanString;
                $soapResponse->paaInviaRTRisposta->fault->id = $idDominio;
                $soapResponse->paaInviaRTRisposta->fault->description = $faultBeanDescr;
                $soapResponse->paaInviaRTRisposta->esito = $esito;
                $soapMessage = new SoapVar($soapResponse, SOAP_ENC_OBJECT);
            }


            $content["request"] = $soapRequest;
            $content["decodedRT"] = $decodedRT;
            $content["response"] = json_encode($soapResponse);
            $this->logRequest($content);

            return $soapMessage;

        }

        function logRequest($infos) {
            //Log
            $time = date('d-M-Y');
            $logPath='../uploads/logs/log-PAserver-' . $time . '.txt';
            $log = new logWriter($logPath);
            $helper = new Helper;

            $log->info('=================================================================');
            $log->info('=== SERVER PA paaInviaRT REQUEST: ' .PHP_EOL. $helper->formatXmlString($infos["request"]));
            $log->info('=================================================================');
            $log->info('=== Contenuto della RT: ' .PHP_EOL. $helper->formatXmlString($infos["decodedRT"]) );
            $log->info('=================================================================');
            $log->info('=== Risposta del server alla RT: ' .PHP_EOL. $infos["response"] );
        }

        public function verifySchema($RT)
        {
            //XSD validation
            $validator = new DomValidator("../uploads/wsdl/nodo/PagInf_RPT_RT_6_2_0.xsd");
            $validated = $validator->validateStrings($RT);

            //Log
            $time = date('d-M-Y');
            $logPath = '../uploads/logs/log-PAserver-' . $time . '.txt';
            $log = new logWriter($logPath);
            if ($validated) {
                $xsdMessage = "La validazione dello schema XSD della RT è avvenuta correttamente";
                $log->info('=================================================================');
                $log->info($xsdMessage);
            } else {
                $xsdMessage = "La RT ha degli errori di validazione dello schema XSD: ";
                $xsdMessage .= implode(" ", $validator->displayErrors());
                $log->error('=================================================================');
                $log->error($xsdMessage);
            }

            return $validated;
        }
    }
