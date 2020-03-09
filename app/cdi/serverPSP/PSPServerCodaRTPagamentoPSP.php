<?php
    require_once "../logWriter.class.php";
    require_once "../Helper.php";
    require_once "../RT.class.php";
    require_once "../RR.class.php";
    require_once "../RTRequest.class.php";
    require_once "../RRRequest.class.php";
    require_once "../dbms.class.php";
    require_once "../DOMValidator.class.php";

    //Log
    $time = date('d-M-Y');
    $logPath='../uploads/logs/log-PSPserver-' . $time . '.txt';
    $log = new logWriter($logPath);

    $db = new dbms();
    $rts = $db->query('SELECT * FROM pspinviacarrellortcoda WHERE rtinviata=0')->fetchAll();

    //Invia le RT accodate dal modello 1
    sleep(5);

    foreach ($rts as $rt) {

		//Parametri RT
        $length=15;
        $idMessaggio = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);

        $RTsettings = (array)unserialize($rt["rtarray"]);
        echo "RT inviata: <br/>";
        print_r($RTsettings);

        try {
            //Classes
            $helper = new Helper;
            $rtGen = new RT;
            $rtContent = $rtGen->getXML($RTsettings);
            $rtEncodedContent = base64_encode($rtContent);


            //Action
            $endpointURL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/PROXYPagamentiTelematiciPspNodo";
            $privKey='/opt/moc-other/pagopatest.agid.gov.it.key';
            $pubKey='/opt/moc-other/pagopatest.agid.gov.it.crt';
            $headers = array(
                'Content-type: text/xml',
                'SOAPAction: nodoInviaRT',
            );
            $RTrequestParams = array(
                'identificativoIntermediarioPSP' => '97735020584',
                'identificativoCanale' => '97735020584_04',
                'password' => 'pwd_AgID',
                'identificativoPSP' => 'AGID_02',
                'identificativoDominio' =>  $rt["identificativoDominio"],  //'77777777777'
                'identificativoUnivocoVersamento' => $rt["identificativoUnivocoVersamento"],
                'codiceContestoPagamento' => $rt["codiceContestoPagamento"],
                'rtEncodedContent' => $rtEncodedContent
            );
            $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

            $request = new RTRequest();
            $soapRequest=$request->getXMLInviaNodo($RTrequestParams);

            $ch = curl_init($endpointURL);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_PORT , 443);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSLKEY, $privKey);
            curl_setopt($ch, CURLOPT_SSLCERT, $pubKey);
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

            $RTResponseBody  = curl_exec($ch);
            curl_close($ch);


            // SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
            $RTResponseBody = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $RTResponseBody);
            $responseBodyXML = simplexml_load_string($RTResponseBody);
            $status=$responseBodyXML->soapenvBody->pptnodoInviaRTRisposta->esito;

            //DB update
            $update = $db->query('UPDATE pspinviacarrellortcoda SET rtinviata=1 WHERE id=?', $rt["id"]);

            $log->info('=============================== RT ===============================' );
            $log->info('RT in coda con ID locale ' . $rt["id"] . ' avente IUV ' . $rt['identificativoUnivocoVersamento'] . ' e CCP ' . $rt['codiceContestoPagamento'] . ' è stata inviata al NodoSPC.' );
            $log->info('RT inviata: ' . $helper->formatXmlString($rtContent) );
            $log->info('Richiesta RT inviata: ' . $helper->formatXmlString($soapRequest) );
            $log->info('Esito RT: ' . $helper->formatXmlString($RTResponseBody) );

        } catch (Exception $e) {
            $log->error("Errore durante l'esecuzione differita di RT in coda per pspInviaCarrelloRPTCarte: " . $e->getMessage());
        }

		
		
		if ($rt["rrrichiesta"]==1 && $rt["rrinviata"]==0) {

            sleep(3);

            try {
                //RR class
                ///////$RRsettings = json_decode($rt["rrarray"], true);
                $RRsettings = (array)unserialize($rt["rtarray"]);

                $rrGen = new RR;
                $rrContent = $rrGen->getXML($RRsettings);
                $rrEncodedContent = base64_encode($rrContent);

                //////////////////////////////////
                //Action nodoInviaRichiestaRevoca
                $endpointURL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/PROXYPagamentiTelematiciPspNodo";
                $privKey='/opt/moc-other/pagopatest.agid.gov.it.key';
                $pubKey='/opt/moc-other/pagopatest.agid.gov.it.crt';
                $headers = array(
                    'Content-type: text/xml',
                    'SOAPAction: nodoInviaRichiestaRevoca',
                );
                $RRrequestParams = array(
                    'identificativoIntermediarioPSP' => '97735020584',
                    'identificativoCanale' => '97735020584_04',
                    'password' => 'pwd_AgID',
                    'identificativoPSP' => 'AGID_02',
                    'identificativoDominio' => $rt["identificativoDominio"],  //'77777777777'
                    'identificativoUnivocoVersamento' => $rt["identificativoUnivocoVersamento"],
                    'codiceContestoPagamento' => $rt["codiceContestoPagamento"],
                    'rrEncodedContent' => $rrEncodedContent
                );
                $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

                $RRrequest = new RRRequest();
                $RRsoapRequest=$RRrequest->getXMLInviaNodo($RRrequestParams);

                $ch = curl_init($endpointURL);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 1);
                curl_setopt($ch, CURLOPT_PORT , 443);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_SSLKEY, $privKey);
                curl_setopt($ch, CURLOPT_SSLCERT, $pubKey);
                curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

                $RRresponseBody  = curl_exec($ch);
                $content["RRrequest" . $numRPT]=$helper->formatXmlString($RRsoapRequest);
                $content["RR" . $numRPT]=$helper->formatXmlString($rrContent);
                $content["RRresponse" . $numRPT]=$helper->formatXmlString($RRresponseBody);
                curl_close($ch);

                $log->info('=============================== RR ===============================' );
                $log->info('RR in coda con ID locale ' . $rt["id"] . ' avente IUV ' . $rt['identificativoUnivocoVersamento'] . ' e CCP ' . $rt['codiceContestoPagamento'] . ' è stata inviata al NodoSPC.' );
                $log->info('RR inviata: ' . $helper->formatXmlString($rrContent) );
                $log->info('Richiesta RR inviata: ' . $helper->formatXmlString($RRsoapRequest) );
                $log->info('Esito RR: ' . $helper->formatXmlString($RRresponseBody) );
				
				//update
				$update = $db->query('UPDATE pspinviacarrellortcoda SET rrinviata=1 WHERE id=?', $rt["id"]);

            } catch (Exception $e) {
                logError($e->getMessage());
            }
        }
		
    }

    $db->close();

?>