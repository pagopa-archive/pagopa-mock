<?php
    require_once "libs/Smarty.class.php";
    require_once "Helper.php";
    require_once "InformativaRequest.class.php";
    require_once "logWriter.class.php";
    require_once "DOMValidator.class.php";


    if (!isset($_GET["page"])) {
        $page = 0;
    } else {
        $page = $_GET["page"];
    }
    if (isset($_POST["page"])) {
        $page = $_POST["page"];
    }

    $smarty = new Smarty;

    session_start();

    switch ($page) {
        /* * * * * * * * * * * * * * * * *  PAGE 0  * * * * * * * * * * * * * * * * */
        case 0:

            $smarty->assign("page_title", "Mock pagoPA - nodoChiediInformativaPSP");
            $smarty->display('views/nodoChiediInformativaPSP_0.tpl');

            break;

            /* * * * * * * * * * * * * * * * *  PAGE 1  * * * * * * * * * * * * * * * * */
            case 1:
              //Classes
              $helper = new Helper;

                try {
                    //Action
                    $endpointURL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/RPT6T";
                    $privKey='/opt/moc-other/pagopatest.agid.gov.it.key';
                    $pubKey='/opt/moc-other/pagopatest.agid.gov.it.crt';
                    $headers = array(
                        'Content-type: text/xml',
                        'SOAPAction: nodoChiediInformativaPSP',
                    );
                    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

                    $request = new InformativaRequest();
                    $soapRequest=$request->getXMLInviaNodo();

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

                    $responseBody  = curl_exec($ch);
                    if ($responseBody === false) {
                        $errors = "Errore durante l'esecuzione di direttive CURL: " . curl_error($ch);
                        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        if ($responseCode >= 400) {
                            $errors .= "<br/>";
                            $errors .= "Errore HTTP: " . $responseCode;
                        }
                        //Visualizza errore
                        $smarty->assign("page_title", "Mock pagoPA - Errore");
                        $smarty->assign("errorMessage", $errors);
                        $smarty->display('views/error.tpl');
                        throw new Exception("Errore durante la richiesta SOAP.");
                    }
                    curl_close($ch);


                    // SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
                    $responseBody = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $responseBody);
                    $responseBodyXML = simplexml_load_string($responseBody);
                    $xmlInformativaEncoded=$responseBodyXML->soapenvBody->pptnodoChiediInformativaPSPRisposta->xmlInformativa;
                    $xmlInformativa=base64_decode($xmlInformativaEncoded);

                    $time = date('d-M-Y');
                    $logPath='uploads/logs/log-' . $time . '.txt';

                    if ($xmlInformativa=="") {
                        $errors = "Non è stato possibile generare l'informativa PSP.";
                        $smarty->assign("errorMessage", $errors);
                        $log = new logWriter($logPath);
                        $log->error('=============== SOAP ACTION: nodoChiediInformativaPSP ===============');
                        $log->error($errors);
                    } else {
                        //Log
                        $log = new logWriter($logPath);
                        $logMessage="Scarica dal server mock il <a href='" . $logPath . "' target='_blank'>file di log odierno</a>";
                        $log->info('=============== SOAP ACTION: nodoChiediInformativaPSP ===============');

                        $log->info('REQUEST: ' . $helper->formatXmlString($soapRequest));
                        $log->info('RESPONSE: ' . $helper->formatXmlString($responseBody));
                        $log->info('Informativa: ' . $helper->formatXmlString($xmlInformativa));

                        $filePath="uploads/catalogoDatiInformativi.xml";
                        $file=fopen($filePath, "w") or die("ERROR: Unable to write to file!");
                        fwrite($file, $xmlInformativa);
                        fclose($file);
                    }


                    $smarty->assign("page_title", "Mock pagoPA - nodoChiediStatoRPT");
                    $smarty->assign("urlFile", "Il file generato è disponibile per il download. <a href='" . $filePath . "' download='" . $filePath . "'>Scarica il Catalogo</a>");
                    $smarty->assign("xmlInformativa", htmlspecialchars( $helper->formatXmlString($xmlInformativa),ENT_QUOTES) );
                    $smarty->assign("xmlRequestContent", htmlspecialchars( $helper->formatXmlString($soapRequest),ENT_QUOTES) );
                    $smarty->assign("xmlResponseContent", htmlspecialchars( $helper->formatXmlString($responseBody),ENT_QUOTES) );
                    $smarty->assign("xmlLogContent", $logMessage);

                    $smarty->display('views/nodoChiediInformativaPSP_1.tpl');

                } catch (Exception $e) {
                    $helper = new Helper();
                    $helper->var_dump_pre($e->getMessage());
                }

            break;
    }

?>
