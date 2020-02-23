<?php

    require_once "../cdi/logWriter.class.php";
    require_once "../cdi/Helper.php";

    class PAServer
    {
        public function paaInviaRT()
        {
            $esito="";

            $soapResponse = new StdClass;
            $helper = new Helper;

            $soapRequest = file_get_contents ('php://input');
            $xmlContent = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $soapRequest);
            $xmlContent = simplexml_load_string($xmlContent, null, LIBXML_NOCDATA);

            if ($this->verifyRequest($soapRequest)) {
		$esito= "OK";
		$encodedRT=$xmlContent->soapenvBody->pptpaaInviaRT->rt;
                $decodedRT=base64_decode($encodedRT);

                //Log
                $time = date('d-M-Y');
                $logPath='../cdi/uploads/logs/log-server-' . $time . '.txt';
                $log = new logWriter($logPath);
                $log->info('=============== SERVER SOAP ACTION: paaInviaRT ===============');
		$log->info('REQUEST: ' . $helper->formatXmlString($soapRequest));
	        $log->info('=================== RT ===================');
                $log->info('Contenuto decodificato della RT: ' . $decodedRT );

            }
            else {
                $esito="KO";
                //fault details
                $soapResponse->paaInviaRTRisposta->fault->faultCode = "";
                $soapResponse->paaInviaRTRisposta->fault->faultString = "";
                $idDominio = "77777777777";
                $soapResponse->paaInviaRTRisposta->fault->id = $idDominio;
                $soapResponse->paaInviaRTRisposta->fault->description = "";
            }
            $soapResponse->paaInviaRTRisposta->esito = $esito;
            $soapMessage = new SoapVar($soapResponse, SOAP_ENC_OBJECT);

            return $soapMessage;
        }


        public function verifyRequest($request)
        {
            return true;
        }
    }

?>
