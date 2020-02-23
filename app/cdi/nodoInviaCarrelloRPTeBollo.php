<?php
    require_once "libs/Smarty.class.php";
    require_once "Helper.php";
    require_once "RPT.class.php";
    require_once "RPTCarrelloRequest.class.php";
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
            $IDCarrello="AGID".rand(900,90000);
            
            $IUV = array();
            for ($i=1; $i<6; $i++) {
                 $IUV[$i] = "RF".rand(100000000,1000000000);
            }
            $CCP = array();
            for ($i=1; $i<6; $i++) {
                 $CCP[$i] = rand(7000,7000000);
            }
            $IDM="AGID".rand(10,100)."IDM";         

            $smarty->assign("page_title", "Mock pagoPA - nodoInviaCarrelloRPT");
            $smarty->assign("IDCarrello", $IDCarrello);
            for ($i=1; $i<6; $i++) {
                $smarty->assign("IUV_" . $i, $IUV[$i]);
                $smarty->assign("CCP_" . $i, $CCP[$i]);
            }
            $smarty->assign("IDM", $IDM);

            $importo = array();
            $parteIntera = array();
            $parteDec = array();
            for ($i=1; $i<6; $i++) {
                for ($j=1; $j<6; $j++) {
                     $parteIntera[$i][$j] = rand(0.1,1499);
                     $parteDec[$i][$j]=rand(00,99);
                     $importo[$i][$j]=$parteIntera[$i][$j] . "." . $parteDec[$i][$j];
                }
            }           

            for ($i=1; $i<6; $i++) {
                for ($j=1; $j<6; $j++) {
                    $smarty->assign("IMPORTOPGAMENTO" . $i . "_" . $j, sprintf('%0.2f', $importo[$i][$j]));
                    $smarty->assign("CAUSALE" . $i . "_" . $j, "/RFS/" . $IUV[$i] . "/" . sprintf('%0.2f', $importo[$i][$j]));
                    $smarty->assign("CAUSALEBOLLO" . $i . "_" . $j, "/RFS/" . $IUV[$i] . "/" . sprintf('%0.2f', 16.00));
                }
            }             
            $smarty->assign("DATARICHIESTA", date("c"));
            $smarty->assign("DATAPAGAMENTO", date("Y-m-d"));

            $smarty->display('views/nodoInviaCarrelloRPTeBollo_0.tpl');

            break;

            /* * * * * * * * * * * * * * * * *  PAGE 1  * * * * * * * * * * * * * * * * */
            case 1:

                //Parametri RPT
                $numRPT =  $_POST["dropdownNumRPT"];
                $settings=array();
                for ($i=1; $i<$numRPT+1; $i++) {
                    $settings[$i] = array(
                        'versioneOggetto' => $_POST["versioneOggetto" . $i],
                        'identificativoDominio' => $_POST["identificativoDominioRPT" . $i],
                        'identificativoMessaggioRichiesta' => $_POST["identificativoMessaggioRichiesta" . $i],
                        'dataOraMessaggioRichiesta' => $_POST["dataOraMessaggioRichiesta" . $i],
                        'autenticazioneSoggetto' => $_POST["autenticazioneSoggetto" . $i],
                        'tipoIdentificativoUnivocoVersante' => $_POST["tipoIdentificativoUnivocoVersante" . $i],
                        'codiceIdentificativoUnivocoVersante' => $_POST["codiceIdentificativoUnivocoVersante" . $i],
                        'anagraficaVersante' => $_POST["anagraficaVersante" . $i],
                        'indirizzoVersante' => $_POST["indirizzoVersante" . $i],
                        'civicoVersante' => $_POST["civicoVersante" . $i],
                        'capVersante' => $_POST["capVersante" . $i],
                        'localitaVersante' => $_POST["localitaVersante" . $i],
                        'provinciaVersante' => $_POST["provinciaVersante" . $i],
                        'nazioneVersante' => $_POST["nazioneVersante" . $i],
                        'e-mailVersante' => $_POST["e-mailVersante" . $i],
                        'tipoIdentificativoUnivocoPagatore' => $_POST["tipoIdentificativoUnivocoPagatore" . $i],
                        'codiceIdentificativoUnivocoPagatore' => $_POST["codiceIdentificativoUnivocoPagatore" . $i],
                        'anagraficaPagatore' => $_POST["anagraficaPagatore" . $i],
                        'indirizzoPagatore' => $_POST["indirizzoPagatore" . $i],
                        'civicoPagatore' => $_POST["civicoPagatore" . $i],
                        'capPagatore' => $_POST["capPagatore" . $i],
                        'localitaPagatore' => $_POST["localitaPagatore" . $i],
                        'provinciaPagatore' => $_POST["provinciaPagatore" . $i],
                        'nazionePagatore' => $_POST["nazionePagatore" . $i],
                        'e-mailPagatore' => $_POST["e-mailPagatore" . $i],
                        'tipoIdentificativoUnivocoBeneficiario' => $_POST["tipoIdentificativoUnivocoBeneficiario" . $i],
                        'codiceIdentificativoUnivocoBeneficiario' => $_POST["codiceIdentificativoUnivocoBeneficiario" . $i],
                        'denominazioneBeneficiario' => $_POST["denominazioneBeneficiario" . $i],
                        'indirizzoBeneficiario' => $_POST["indirizzoBeneficiario" . $i],
                        'civicoBeneficiario' => $_POST["civicoBeneficiario" . $i],
                        'capBeneficiario' => $_POST["capBeneficiario" . $i],
                        'localitaBeneficiario' => $_POST["localitaBeneficiario" . $i],
                        'provinciaBeneficiario' => $_POST["provinciaBeneficiario" . $i],
                        'nazioneBeneficiario' => $_POST["nazioneBeneficiario" . $i],
                        'dataEsecuzionePagamento' => $_POST["dataEsecuzionePagamento" . $i],
                        'importoTotaleDaVersare' => $_POST["importoTotaleDaVersare" . $i],
                        'tipoVersamento' => $_POST["tipoVersamento" . $i],
                        'identificativoUnivocoVersamento' => $_POST["identificativoUnivocoVersamento" . $i],
                        'codiceContestoPagamento' => $_POST["codiceContestoPagamento" . $i],
                        'ibanAddebito' => $_POST["ibanAddebito" . $i],
                        'firmaRicevuta' => $_POST["firmaRicevuta" . $i],

                        'importoSingoloVersamento1' => $_POST["importoSingoloVersamento1_" . $i],
                        'ibanAccredito1' => $_POST["ibanAccredito1_" . $i],
                        'ibanAppoggio1' => $_POST["ibanAppoggio1_" . $i],
                        'credenzialiPagatore1' => $_POST["credenzialiPagatore1_" . $i],
                        'causaleVersamento1' => $_POST["causaleVersamento1_" . $i],
                        'datiSpecificiRiscossione1' => $_POST["datiSpecificiRiscossione1_" . $i],
                        'importoSingoloVersamento2' => $_POST["importoSingoloVersamento2_" . $i],
                        'ibanAccredito2' => $_POST["ibanAccredito2_" . $i],
                        'ibanAppoggio2' => $_POST["ibanAppoggio2_" . $i],
                        'credenzialiPagatore2' => $_POST["credenzialiPagatore2_" . $i],
                        'causaleVersamento2' => $_POST["causaleVersamento2_" . $i],
                        'datiSpecificiRiscossione2' => $_POST["datiSpecificiRiscossione2_" . $i],
                        'importoSingoloVersamento3' => $_POST["importoSingoloVersamento3_" . $i],
                        'ibanAccredito3' => $_POST["ibanAccredito3_" . $i],
                        'ibanAppoggio3' => $_POST["ibanAppoggio3_" . $i],
                        'credenzialiPagatore3' => $_POST["credenzialiPagatore3_" . $i],
                        'causaleVersamento3' => $_POST["causaleVersamento3_" . $i],
                        'datiSpecificiRiscossione3' => $_POST["datiSpecificiRiscossione3_" . $i],
                        'importoSingoloVersamento4' => $_POST["importoSingoloVersamento4_" . $i],
                        'ibanAccredito4' => $_POST["ibanAccredito4_" . $i],
                        'ibanAppoggio4' => $_POST["ibanAppoggio4_" . $i],
                        'credenzialiPagatore4' => $_POST["credenzialiPagatore4_" . $i],
                        'causaleVersamento4' => $_POST["causaleVersamento4_" . $i],
                        'datiSpecificiRiscossione4' => $_POST["datiSpecificiRiscossione4_" . $i],
                        'importoSingoloVersamento5' => $_POST["importoSingoloVersamento5_" . $i],
                        'ibanAccredito5' => $_POST["ibanAccredito5_" . $i],
                        'ibanAppoggio5' => $_POST["ibanAppoggio5_" . $i],
                        'credenzialiPagatore5' => $_POST["credenzialiPagatore5_" . $i],
                        'causaleVersamento5' => $_POST["causaleVersamento5_" . $i],
                        'datiSpecificiRiscossione5' => $_POST["datiSpecificiRiscossione5_" . $i],

                        'dropdownNumVersamenti' => $_POST["dropdownNumVersamenti" . $i],

                        'importoSingoloVersamentoBollo1' => $_POST["importoSingoloVersamentoBollo1_" . $i],
                        'causaleVersamentoBollo1' => $_POST["causaleVersamentoBollo1_" . $i],
                        'datiSpecificiRiscossioneBollo1' => $_POST["datiSpecificiRiscossioneBollo1_" . $i],
                        'tipoBollo1' => $_POST["tipoBollo1_" . $i],
                        'hashDocumento1' => $_POST["hashDocumento1_" . $i],
                        'provinciaResidenza1' => $_POST["provinciaResidenza1_" . $i],
                        'importoSingoloVersamentoBollo2' => $_POST["importoSingoloVersamentoBollo2_" . $i],
                        'causaleVersamentoBollo2' => $_POST["causaleVersamentoBollo2_" . $i],
                        'datiSpecificiRiscossioneBollo2' => $_POST["datiSpecificiRiscossioneBollo2_" . $i],
                        'tipoBollo2' => $_POST["tipoBollo2_" . $i],
                        'hashDocumento2' => $_POST["hashDocumento2_" . $i],
                        'provinciaResidenza2' => $_POST["provinciaResidenza2_" . $i],
                        'importoSingoloVersamentoBollo3' => $_POST["importoSingoloVersamentoBollo3_" . $i],
                        'causaleVersamentoBollo3' => $_POST["causaleVersamentoBollo3_" . $i],
                        'datiSpecificiRiscossioneBollo3' => $_POST["datiSpecificiRiscossioneBollo3_" . $i],
                        'tipoBollo3' => $_POST["tipoBollo3_" . $i],
                        'hashDocumento3' => $_POST["hashDocumento3_" . $i],
                        'provinciaResidenza3' => $_POST["provinciaResidenza3_" . $i],
                        'importoSingoloVersamentoBollo4' => $_POST["importoSingoloVersamentoBollo4_" . $i],
                        'causaleVersamentoBollo4' => $_POST["causaleVersamentoBollo4_" . $i],
                        'datiSpecificiRiscossioneBollo4' => $_POST["datiSpecificiRiscossioneBollo4_" . $i],
                        'tipoBollo4' => $_POST["tipoBollo4_" . $i],
                        'hashDocumento4' => $_POST["hashDocumento4_" . $i],
                        'provinciaResidenza4' => $_POST["provinciaResidenza4_" . $i],
                        'importoSingoloVersamentoBollo5' => $_POST["importoSingoloVersamentoBollo5_" . $i],
                        'causaleVersamentoBollo5' => $_POST["causaleVersamentoBollo5_" . $i],
                        'datiSpecificiRiscossioneBollo5' => $_POST["datiSpecificiRiscossioneBollo5_" . $i],
                        'tipoBollo5' => $_POST["tipoBollo5_" . $i],
                        'hashDocumento5' => $_POST["hashDocumento5_" . $i],
                        'provinciaResidenza5' => $_POST["provinciaResidenza5_" . $i],

                        'toggleXSD1' => $_POST["toggleXSD1_" . $i],
                        'toggleXSD2' => $_POST["toggleXSD2_" . $i],
                        'toggleXSD3' => $_POST["toggleXSD3_" . $i],
                        'toggleXSD4' => $_POST["toggleXSD4_" . $i],
                        'toggleXSD5' => $_POST["toggleXSD5_" . $i]
                    );
                }

                try {
                    //Classes
                    $helper = new Helper;                    

                    $rptGen =  array();
                    $rptContent = array();
                    $rptEncodedContent = array();
                    //XSD
                    $enableValidaton = isset($_POST['toggleXSD']) ? $_POST['toggleXSD'] : false;
                    $xsdMessage = "";
                    for ($i=1; $i<$numRPT+1; $i++) {
                        $rptGen[$i] = new RPT;
                        $rptContent[$i] = $rptGen[$i]->getXML($settings[$i]);
                        $rptEncodedContent[$i] = base64_encode($rptContent[$i]);

                        //XSD
                        if ($enableValidaton) {
                            $validator = new DomValidator("uploads/wsdl/nodo/PagInf_RPT_RT_6_2_0.xsd");
                            $validated = $validator->validateStrings($rptContent[$i]);

                            if ($validated) {
                                $xsdMessage .= "Validazione dello schema XSD, relativo alla RPT $i, avvenuta correttamente.";
                                $xsdMessage .= "<br/>";
                            } else {
                                $xsdMessage = "La RPT $i ha degli errori di validazione dello schema:";
                                $xsdMessage .= "<br/><div class=\"alert alert-danger\" role=\"alert\">";
                                $xsdMessage .= implode(" ", $validator->displayErrors());
                                $xsdMessage .= "</div><br/>";
                            }
                        } else {
                            $xsdMessage = "Validazione dello schema XSD disattivata";
                            $xsdMessage .= "<br/>";
                        }
                    }




                    //Action
                    $endpointURL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/RPT6T";
                    $privKey='/opt/moc-other/pagopatest.agid.gov.it.key';
                    $pubKey='/opt/moc-other/pagopatest.agid.gov.it.crt';
                    $headers = array(
                        'Content-type: text/xml',
                        'SOAPAction: nodoInviaCarrelloRPT',
                    );
                    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

                    $identificativoDominio = array();
                    $identificativoUnivocoVersamento = array();
                    $codiceContestoPagamento = array();
                    $tipoFirma = array();
                    for ($i=1; $i<$numRPT+1; $i++) {
                        $identificativoDominio[$i] = $_POST["identificativoDominio" . $i];
                        $identificativoUnivocoVersamento[$i] = $_POST["identificativoUnivocoVersamento" . $i];
                        $codiceContestoPagamento[$i] = $_POST["codiceContestoPagamento" . $i];
                        $tipoFirma[$i] = $_POST["tipoFirma" . $i];
                    }
                    $requestParams = array(
                        'identificativoIntermediarioPA' => $_POST['identificativoIntermediarioPA'],
                        'identificativoStazioneIntermediarioPA' => $_POST['identificativoStazioneIntermediarioPA'],
                        'identificativoCarrello' => $_POST['identificativoCarrello'],
                        'password' => $_POST['password'],
                        'identificativoPSP' => $_POST['identificativoPSP'],
                        'identificativoIntermediarioPSP' => $_POST['identificativoIntermediarioPSP'],
                        'identificativoCanale' => $_POST['identificativoCanale'],

                        'numeroRPT' => $_POST["dropdownNumRPT"],
                        'identificativoDominio' => $identificativoDominio,
                        'identificativoUnivocoVersamento' => $identificativoUnivocoVersamento,
                        'codiceContestoPagamento' => $codiceContestoPagamento,  
                        'tipoFirma' => $tipoFirma,                      
                        'rptEncodedContent' => $rptEncodedContent
                    );
                    $request = new RPTCarrelloRequest();
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

                    /************************ VERBOSE MODE
                     *
                     * $fp_err = fopen('uploads/logs/verbose_file.txt', 'ab+');
                     * fwrite($fp_err, date('Y-m-d H:i:s')."\n\n"); //add timestamp to the verbose log
                     * curl_setopt($ch, CURLOPT_VERBOSE, 1);
                     * curl_setopt($ch, CURLOPT_FAILONERROR, true);
                     * curl_setopt($ch, CURLOPT_STDERR, $fp_err);
                     *
                     */

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
                    $status=$responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->esitoComplessivoOperazione;

                    //Log
                    $time = date('d-M-Y');
                    $logPath='uploads/logs/log-' . $time . '.txt';
                    $log = new logWriter($logPath);
                    $logMessage="Scarica dal server mock il <a href='" . $logPath . "' target='_blank'>file di log odierno</a>";
                    $log->info('=============== SOAP ACTION: nodoInviaCarrelloRPT ===============');

                    //Esito
                    $tableContent='';
                    $tableContent.='<tr><td>Identificativo Carrello</td><td>' . $_POST["identificativoCarrello"] . '</td></tr>';
                    $tableContent.='<tr><td>Esito complessivo operarazione</td><td>' . $status . '</td></tr>';
                    switch ($status) {
                        case "OK":
                            //valid action
                            for ($i=1; $i<$numRPT+1; $i++) {
                                $log->info('Richiesta ID carrello ' . $_POST["identificativoCarrello"] .  ' avente IUV: ' . $identificativoUnivocoVersamento[$i] . ' terminata correttamente.');
                                $log->info('RPT: ' . $helper->formatXmlString($rptContent[$i]));
                            }
                            $log->info('REQUEST: ' . $helper->formatXmlString($soapRequest));
                            $log->info('RESPONSE: ' . $helper->formatXmlString($responseBody));

                            $wisp=$responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->url;
                            $tableContent.='<tr><td>URL di redirect</td><td><a href="' . $wisp . '" target="_blank">WISP</a></td></tr>';
                            break;

                        case "KO":
                             //KO app error
                            $log->error('Richiesta avente codice ID carrello: ' . $_POST["identificativoCarrello"] . ' terminata con errori.');
                            $log->error('REQUEST: ' . $helper->formatXmlString($soapRequest));
                            $log->error('RESPONSE: ' . $helper->formatXmlString($responseBody));
                            $log->error('Codice errore: ' . $responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->fault->faultCode);
                            $log->error('Stringa errore: ' . $responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->fault->faultString);
                            $log->error('Descrizione errore: ' . $responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->fault->description);
                            $dettaglio="";
                            foreach($responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->listaErroriRPT->fault as $faults) {
                               $log->error('Dettaglio errore RPT - Codice: ' . $faults->faultCode . ' Stringa errore RPT: ' . $faults->faultString . ' Descrizione errore RPT: ' . $faults->description);
                               $dettaglio .= '<ul class="it-list danger"><li>Codice errore RPT: ' . $faults->faultCode . '</li><li> Stringa errore RPT: ' . $faults->faultString . '</li><li> Descrizione errore RPT: ' . $faults->description . '</li></ul>';
                            }

                            $tableContent.='<tr><td>Errore applicativo</td><td> <div class="it-list-wrapper"><ul class="it-list danger"><li>Codice errore applicativo: ' . $responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->fault->faultCode .  '</li><li>Stringa errore applicativo: ' . $responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->fault->faultString .  '</li><li>Descrizione errore applicativo: ' . $responseBodyXML->soapenvBody->pptnodoInviaCarrelloRPTRisposta->fault->description .  '</li><li>' . $dettaglio . '</li></ul> </td></tr>';
                            break;

                        default:
                            //SOAP fault
                            $log->error('Richiesta avente codice ID carrello: ' . $_POST["identificativoCarrello"] . ' SOAP Error.');
                            $log->error('REQUEST: ' . $helper->formatXmlString($soapRequest));
                            $log->error('RESPONSE: ' . $helper->formatXmlString($responseBody));
                            $log->error('Codice errore: ' . $responseBodyXML->soapenvBody->soapenvFault->faultcode);
                            $log->error('Descrizione errore: ' . $responseBodyXML->soapenvBody->soapenvFault->faultstring);
                            $log->error('Dettaglio errore: ' . $responseBodyXML->soapenvBody->soapenvFault->detail);
                            $tableContent.='<tr><td>Errore SOAP</td><td> <div class="it-list-wrapper"><ul class="it-list danger"><li>Codice: ' . $responseBodyXML->soapenvBody->soapenvFault->faultcode .  '</li><li>Descrizione: ' . $responseBodyXML->soapenvBody->soapenvFault->faultstring .  '</li><li>Dettaglio: ' . $responseBodyXML->soapenvBody->soapenvFault->detail .  '</li></ul> </td></tr>';
                    }


                    $smarty->assign("page_title", "Mock pagoPA - nodoInviaCarrelloRPT");
                    $smarty->assign("xsdCheck", $xsdMessage);
                    $smarty->assign("tableContent", $tableContent);
                    $smarty->assign("numRPTView", $numRPT);
                    for ($i=1; $i<$numRPT+1; $i++) {
                        $smarty->assign("rptXmlContent" . $i, htmlspecialchars( $helper->formatXmlString($rptContent[$i]),ENT_QUOTES) );
                    }                   
                    $smarty->assign("xmlRequestContent", htmlspecialchars( $helper->formatXmlString($soapRequest),ENT_QUOTES) );
                    $smarty->assign("xmlResponseContent", htmlspecialchars( $helper->formatXmlString($responseBody),ENT_QUOTES) );
                    $smarty->assign("xmlLogContent", $logMessage);

                    $smarty->display('views/nodoInviaCarrelloRPT_1.tpl');

                } catch (Exception $e) {
                    $helper = new Helper();
                    $helper->var_dump_pre($e->getMessage());
                }

            break;
    }

?>
