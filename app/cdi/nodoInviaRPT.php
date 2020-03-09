<?php
    require_once "libs/Smarty.class.php";
    require_once "Helper.php";
    require_once "RPT.class.php";
    require_once "RPTRequest.class.php";
    require_once "logWriter.class.php";
    require_once "DOMValidator.class.php";
    require_once "dbms.class.php";


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
            $IUV="RF".rand(100000000,1000000000);
            $CCP=rand(7000,7000000);
            $IDM="AGID".rand(10,100)."IDM";
            $IMPORTO1=rand(0.1,1499);
            $DEC1=rand(00,99);
            $IMPORTO2=rand(0.1,1499);
            $DEC2=rand(00,99);
            $IMPORTO3=rand(0.1,1499);
            $DEC3=rand(00,99);
            $IMPORTO4=rand(0.1,1499);
            $DEC4=rand(00,99);
            $IMPORTO5=rand(0.1,1499);
            $DEC5=rand(00,99);

            $smarty->assign("page_title", "Mock pagoPA - nodoInviaRPT");

            $smarty->assign("IUV", $IUV);
            $smarty->assign("CCP", $CCP);
            $smarty->assign("IDM", $IDM);
            $importo=$IMPORTO1 . "." . $DEC1;
            $smarty->assign("IMPORTOPGAMENTO1", sprintf('%0.2f', (float) $importo));
            $smarty->assign("CAUSALE1", "/RFS/$IUV/" . sprintf('%0.2f', (float) $importo));
            $importo=$IMPORTO2 . "." . $DEC2;
            $smarty->assign("IMPORTOPGAMENTO2", sprintf('%0.2f', (float) $importo));
            $smarty->assign("CAUSALE2", "/RFS/$IUV/" . sprintf('%0.2f', $importo));
            $importo=$IMPORTO3 . "." . $DEC3;
            $smarty->assign("IMPORTOPGAMENTO3", sprintf('%0.2f', (float) $importo));
            $smarty->assign("CAUSALE3", "/RFS/$IUV/" . sprintf('%0.2f', (float) $importo));
            $importo=$IMPORTO4 . "." . $DEC4;
            $smarty->assign("IMPORTOPGAMENTO4", sprintf('%0.2f', (float) $importo));
            $smarty->assign("CAUSALE4", "/RFS/$IUV/" . sprintf('%0.2f', (float) $importo));
            $importo=$IMPORTO5 . "." . $DEC5;
            $smarty->assign("IMPORTOPGAMENTO5", sprintf('%0.2f', (float) $importo));
            $smarty->assign("CAUSALE5", "/RFS/$IUV/" . sprintf('%0.2f', (float) $importo));


            $smarty->assign("DATARICHIESTA", date("c"));
            $smarty->assign("DATAPAGAMENTO", date("Y-m-d"));

            $smarty->display('views/nodoInviaRPT_0.tpl');

            break;

            /* * * * * * * * * * * * * * * * *  PAGE 1  * * * * * * * * * * * * * * * * */
            case 1:

                //Parametri RPT
                $settings = array(
                    'versioneOggetto' => $_POST["versioneOggetto"],
                    'identificativoDominio' => $_POST["identificativoDominioRPT"],
                    'identificativoMessaggioRichiesta' => $_POST["identificativoMessaggioRichiesta"],
                    'dataOraMessaggioRichiesta' => $_POST["dataOraMessaggioRichiesta"],
                    'autenticazioneSoggetto' => $_POST["autenticazioneSoggetto"],
                    'tipoIdentificativoUnivocoVersante' => $_POST["tipoIdentificativoUnivocoVersante"],
                    'codiceIdentificativoUnivocoVersante' => $_POST["codiceIdentificativoUnivocoVersante"],
                    'anagraficaVersante' => $_POST["anagraficaVersante"],
                    'indirizzoVersante' => $_POST["indirizzoVersante"],
                    'civicoVersante' => $_POST["civicoVersante"],
                    'capVersante' => $_POST["capVersante"],
                    'localitaVersante' => $_POST["localitaVersante"],
                    'provinciaVersante' => $_POST["provinciaVersante"],
                    'nazioneVersante' => $_POST["nazioneVersante"],
                    'e-mailVersante' => $_POST["e-mailVersante"],
                    'tipoIdentificativoUnivocoPagatore' => $_POST["tipoIdentificativoUnivocoPagatore"],
                    'codiceIdentificativoUnivocoPagatore' => $_POST["codiceIdentificativoUnivocoPagatore"],
                    'anagraficaPagatore' => $_POST["anagraficaPagatore"],
                    'indirizzoPagatore' => $_POST["indirizzoPagatore"],
                    'civicoPagatore' => $_POST["civicoPagatore"],
                    'capPagatore' => $_POST["capPagatore"],
                    'localitaPagatore' => $_POST["localitaPagatore"],
                    'provinciaPagatore' => $_POST["provinciaPagatore"],
                    'nazionePagatore' => $_POST["nazionePagatore"],
                    'e-mailPagatore' => $_POST["e-mailPagatore"],
                    'tipoIdentificativoUnivocoBeneficiario' => $_POST["tipoIdentificativoUnivocoBeneficiario"],
                    'codiceIdentificativoUnivocoBeneficiario' => $_POST["codiceIdentificativoUnivocoBeneficiario"],
                    'denominazioneBeneficiario' => $_POST["denominazioneBeneficiario"],
                    'indirizzoBeneficiario' => $_POST["indirizzoBeneficiario"],
                    'civicoBeneficiario' => $_POST["civicoBeneficiario"],
                    'capBeneficiario' => $_POST["capBeneficiario"],
                    'localitaBeneficiario' => $_POST["localitaBeneficiario"],
                    'provinciaBeneficiario' => $_POST["provinciaBeneficiario"],
                    'nazioneBeneficiario' => $_POST["nazioneBeneficiario"],
                    'dataEsecuzionePagamento' => $_POST["dataEsecuzionePagamento"],
                    'importoTotaleDaVersare' => (float) $_POST["importoTotaleDaVersare"],
                    'tipoVersamento' => $_POST["tipoVersamento"],
                    'identificativoUnivocoVersamento' => $_POST["identificativoUnivocoVersamento"],
                    'codiceContestoPagamento' => $_POST["codiceContestoPagamento"],
                    'ibanAddebito' => $_POST["ibanAddebito"],
                    'firmaRicevuta' => $_POST["firmaRicevuta"],
                    'importoSingoloVersamento1' => (float) $_POST["importoSingoloVersamento1"],
                    'ibanAccredito1' => $_POST["ibanAccredito1"],
                    'ibanAppoggio1' => $_POST["ibanAppoggio1"],
                    'credenzialiPagatore1' => $_POST["credenzialiPagatore1"],
                    'causaleVersamento1' => $_POST["causaleVersamento1"],
                    'datiSpecificiRiscossione1' => $_POST["datiSpecificiRiscossione1"],
                    'importoSingoloVersamento2' => (float) $_POST["importoSingoloVersamento2"],
                    'ibanAccredito2' => $_POST["ibanAccredito2"],
                    'ibanAppoggio2' => $_POST["ibanAppoggio2"],
                    'credenzialiPagatore2' => $_POST["credenzialiPagatore2"],
                    'causaleVersamento2' => $_POST["causaleVersamento2"],
                    'datiSpecificiRiscossione2' => $_POST["datiSpecificiRiscossione2"],
                    'importoSingoloVersamento3' => (float) $_POST["importoSingoloVersamento3"],
                    'ibanAccredito3' => $_POST["ibanAccredito3"],
                    'ibanAppoggio3' => $_POST["ibanAppoggio3"],
                    'credenzialiPagatore3' => $_POST["credenzialiPagatore3"],
                    'causaleVersamento3' => $_POST["causaleVersamento3"],
                    'datiSpecificiRiscossione3' => $_POST["datiSpecificiRiscossione3"],
                    'importoSingoloVersamento4' => (float) $_POST["importoSingoloVersamento4"],
                    'ibanAccredito4' => $_POST["ibanAccredito4"],
                    'ibanAppoggio4' => $_POST["ibanAppoggio4"],
                    'credenzialiPagatore4' => $_POST["credenzialiPagatore4"],
                    'causaleVersamento4' => $_POST["causaleVersamento4"],
                    'datiSpecificiRiscossione4' => $_POST["datiSpecificiRiscossione4"],
                    'importoSingoloVersamento5' => (float) $_POST["importoSingoloVersamento5"],
                    'ibanAccredito5' => $_POST["ibanAccredito5"],
                    'ibanAppoggio5' => $_POST["ibanAppoggio5"],
                    'credenzialiPagatore5' => $_POST["credenzialiPagatore5"],
                    'causaleVersamento5' => $_POST["causaleVersamento5"],
                    'datiSpecificiRiscossione5' => $_POST["datiSpecificiRiscossione5"],
                    'dropdownNumVersamenti' => $_POST["dropdownNumVersamenti"]
                );

                try {
                    //Classes
                    $helper = new Helper;
                    $rptGen = new RPT;
                    $rptContent = $rptGen->getXML($settings);
                    $rptEncodedContent = base64_encode($rptContent);

                    //XSD
                    $enableValidaton = isset($_POST['toggleXSD']) ? $_POST['toggleXSD'] : false;
                    if ($enableValidaton) {
                        $validator = new DomValidator("uploads/wsdl/nodo/PagInf_RPT_RT_6_2_0.xsd");
                        $validated = $validator->validateStrings($rptContent);

                        if ($validated) {
                            $xsdMessage = "Validazione dello schema XSD avvenuta correttamente";
                        } else {
                            $xsdMessage = "La RPT ha degli errori di validazione dello schema:";
                            $xsdMessage .= "<br/><div class=\"alert alert-danger\" role=\"alert\">";
                            $xsdMessage .= implode(" ", $validator->displayErrors());
                            $xsdMessage .= "</div><br/>";
                        }
                    } else {
                        $xsdMessage = "Validazione dello schema XSD disattivata";
                    }


                    //Action
                    $endpointURL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/RPT6T";
                    $privKey='/opt/moc-other/pagopatest.agid.gov.it.key';
                    $pubKey='/opt/moc-other/pagopatest.agid.gov.it.crt';
                    $headers = array(
                        'Content-type: text/xml',
                        'SOAPAction: nodoInviaRPT',
                    );
                    $requestParams = array(
                        'identificativoIntermediarioPA' => $_POST['identificativoIntermediarioPA'],
                        'identificativoStazioneIntermediarioPA' => $_POST['identificativoStazioneIntermediarioPA'],
                        'identificativoDominio' => $_POST['identificativoDominio'],
                        'identificativoUnivocoVersamento' => $_POST['identificativoUnivocoVersamento'],
                        'codiceContestoPagamento' => $_POST['codiceContestoPagamento'],
                        'password' => $_POST['password'],
                        'identificativoPSP' => $_POST['identificativoPSP'],
                        'identificativoIntermediarioPSP' => $_POST['identificativoIntermediarioPSP'],
                        'identificativoCanale' => $_POST['identificativoCanale'],
                        'tipoFirma' => $_POST['tipoFirma'],
                        'rptEncodedContent' => $rptEncodedContent
                    );
                    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

                    $request = new RPTRequest();
                    $soapRequest=$request->getXMLInviaNodo($requestParams);

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
                    $status=$responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->esito;

                    //Log
                    $time = date('d-M-Y');
                    $logPath='uploads/logs/log-' . $time . '.txt';
                    $log = new logWriter($logPath);
                    $logMessage="Scarica dal server mock il <a href='" . $logPath . "' target='_blank'>file di log odierno</a>";
                    $log->info('=============== SOAP ACTION: nodoInviaRPT ===============');

                    //Esito
                    $tableContent='';
                    $tableContent.='<tr><td>IUV</td><td>' . $_POST["identificativoUnivocoVersamento"] . '</td></tr>';
                    $tableContent.='<tr><td>Esito</td><td>' . $status . '</td></tr>';
                    switch ($status) {
                        case "OK":
                            //valid action
                            $log->info('Richiesta avente IUV: ' . $_POST["identificativoUnivocoVersamento"] . ' terminata correttamente.');
                            $log->info('RPT: ' . $helper->formatXmlString($rptContent));
                            $log->info('REQUEST: ' . $helper->formatXmlString($soapRequest));
                            $log->info('RESPONSE: ' . $helper->formatXmlString($responseBody));

                            $wisp=$responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->url;
                            $tableContent.='<tr><td>URL di redirect</td><td><a href="' . $wisp . '" target="_blank">WISP</a></td></tr>';
                            break;

                        case "KO":
                             //KO app error
                            $log->error('Richiesta avente IUV: ' . $_POST["identificativoUnivocoVersamento"] . ' terminata con errori.');
                            $log->error('REQUEST: ' . $helper->formatXmlString($soapRequest));
                            $log->error('RESPONSE: ' . $helper->formatXmlString($responseBody));
                            $log->error('Codice errore: ' . $responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->fault->faultCode);
                            $log->error('Stringa errore: ' . $responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->fault->faultString);
                            $log->error('Descrizione errore: ' . $responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->fault->description);

                            $tableContent.='<tr><td>Errore applicativo</td><td> <div class="it-list-wrapper"><ul class="it-list danger"><li>Codice: ' . $responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->fault->faultCode .  '</li><li>Stringa: ' . $responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->fault->faultString .  '</li><li>Descrizione: ' . $responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->fault->description .  '</li></ul> </td></tr>';
                            break;

                        default:
                            //SOAP fault
                            $log->error('Richiesta avente IUV: ' . $_POST["identificativoUnivocoVersamento"] . ' SOAP Error.');
                            $log->error('REQUEST: ' . $helper->formatXmlString($soapRequest));
                            $log->error('RESPONSE: ' . $helper->formatXmlString($responseBody));
                            $log->error('Codice errore: ' . $responseBodyXML->soapenvBody->soapenvFault->faultcode);
                            $log->error('Descrizione errore: ' . $responseBodyXML->soapenvBody->soapenvFault->faultstring);
                            $log->error('Dettaglio errore: ' . $responseBodyXML->soapenvBody->soapenvFault->detail);
                            $tableContent.='<tr><td>Errore SOAP</td><td> <div class="it-list-wrapper"><ul class="it-list danger"><li>Codice: ' . $responseBodyXML->soapenvBody->soapenvFault->faultcode .  '</li><li>Descrizione: ' . $responseBodyXML->soapenvBody->soapenvFault->faultstring .  '</li><li>Dettaglio: ' . $responseBodyXML->soapenvBody->soapenvFault->detail .  '</li></ul> </td></tr>';
                    }

                    $smarty->assign("page_title", "Mock pagoPA - nodoInviaRPT");
                    $smarty->assign("xsdCheck", $xsdMessage);
                    $smarty->assign("tableContent", $tableContent);
                    $smarty->assign("rptXmlContent", htmlspecialchars( $helper->formatXmlString($rptContent),ENT_QUOTES) );
                    $smarty->assign("xmlRequestContent", htmlspecialchars( $helper->formatXmlString($soapRequest),ENT_QUOTES) );
                    $smarty->assign("xmlResponseContent", htmlspecialchars( $helper->formatXmlString($responseBody),ENT_QUOTES) );
                    $smarty->assign("xmlLogContent", $logMessage);

                    $smarty->display('views/nodoInviaRPT_1.tpl');

                    //DB
                    /* DB: Calcolo totale importo */
                    $numVersamenti=$settings["dropdownNumVersamenti"];
                    $importoTotaleDaVersare=0;

                    for ($i=1; $i<=$numVersamenti; $i++) {
                        $isBollo = isset( $settings["toggleXSD" . $i] ) ? $settings["toggleXSD" . $i] : false;
                        if(!$isBollo) {
                            $importoTotaleDaVersare += $settings["importoSingoloVersamento" . $i];
                        } else {
                            $importoTotaleDaVersare += $settings["importoSingoloVersamentoBollo" . $i];
                        }

                    }
                    if ($settings["importoTotaleDaVersare"]=="") {
                        $importoTotaleDaVersare = (float) $importoTotaleDaVersare;
                    } else {
                        $importoTotaleDaVersare = (float) $settings["importoTotaleDaVersare"];
                    }
                    /* fine calcolo totale */
                    try {
                        $db = new dbms();
                        $insert = $db->query('INSERT INTO clientparpt (identificativodominio, identificativopsp, iuv, ccp, id_statorptrt, dataesecuzionepagamento, importototaledaversare) VALUES (?,?,?,?,?,?,?)',
                            $_POST["identificativoDominioRPT"],
                            $_POST['identificativoPSP'],
                            $_POST["identificativoUnivocoVersamento"],
                            $_POST["codiceContestoPagamento"],
                            3,
                            $_POST["dataEsecuzionePagamento"],
                            $importoTotaleDaVersare );

                        $log->info('=============== DB ===============');
                        $log->info('MYSQL - Esito inserimento RPT: ' . $insert->affectedRows() . ' record.' );
                        $db->close();
                    } catch (Exception $e) {
                        $log->error('=============== DB ===============');
                        $log->error('MYSQL - Errore inserimento RPT: ' . $e->getMessage() );
                    }

                } catch (Exception $e) {
                    $helper = new Helper();
                    $helper->var_dump_pre($e->getMessage());
                }

            break;
    }

?>
