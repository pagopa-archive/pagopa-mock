<?php
    require_once "../logWriter.class.php";
    require_once "../Helper.php";
    require_once "../RT.class.php";
    require_once "../RTRequest.class.php";
    require_once "../dbms.class.php";

    //Log
    $time = date('d-M-Y');
    $logPath='../uploads/logs/log-PSPserver-' . $time . '.txt';
    $log = new logWriter($logPath);

    //Read from DB - Model 3
    $db = new dbms();
    $rts = $db->query('SELECT * FROM paaattivarptcoda WHERE statusInviataRT=0')->fetchAll();

    //Send RT queue
    sleep(6);

    foreach ($rts as $rt) {

        //Parametri RT
        $length=15;
        $idMessaggio = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);

        $RTsettings = array(
            'versioneOggetto' => '6.2.0',
            'identificativoDominio' => $rt["identificativoDominio"], //'77777777777',
            'identificativoMessaggioRicevuta' => $idMessaggio,
            'dataOraMessaggioRicevuta' => date("c"),
            'riferimentoMessaggioRichiesta' => 'AGID56IDM',
            'riferimentoDataRichiesta' => date("Y-m-d"),

            'tipoIdentificativoUnivocoAttestante' => 'G',
            'codiceIdentificativoUnivocoAttestante' => '97735020584',
            'denominazioneAttestante' => "Agenzia per l'Italia Digitale",
            'codiceUnitOperAttestante' => 'n/a',
            'denomUnitOperAttestante' => 'n/a',
            'indirizzoAttestante' => 'Via Liszt',
            'civicoAttestante' => '21',
            'capAttestante' => '00144',
            'localitaAttestante' => 'Roma',
            'provinciaAttestante' => 'RM',
            'nazioneAttestante' => 'IT',

            'tipoIdentificativoUnivocoBeneficiario' => 'G',
            'codiceIdentificativoUnivocoBeneficiario' => $rt["identificativoDominio"],  //'77777777777'
            'denominazioneBeneficiario' => 'Ente Intermediato di Test da AgID TEST',
            'indirizzoBeneficiario' => 'Viale Liszt',
            'civicoBeneficiario' => '21',
            'capBeneficiario' => '00100',
            'localitaBeneficiario' => 'Roma',
            'provinciaBeneficiario' => 'RM',
            'nazioneBeneficiario' => 'IT',

            'tipoIdentificativoUnivocoVersante' => 'F',
            'codiceIdentificativoUnivocoVersante' => 'KSMKSH80A01H501D',
            'anagraficaVersante' => 'Kenshiro Kasumi',
            'indirizzoVersante' => 'Divina Scuola di Hokuto',
            'civicoVersante' => '100',
            'capVersante' => '00100',
            'localitaVersante' => 'Croce del Sud',
            'provinciaVersante' => 'RM',
            'nazioneVersante' => 'IT',
            'e-mailVersante' => 'kenshiro.kasumi@divinascuolahokuto.it',

            'tipoIdentificativoUnivocoPagatore' => 'F',
            'codiceIdentificativoUnivocoPagatore' => 'KSMKSH80A01H501D',
            'anagraficaPagatore' => 'Kenshiro Kasumi',
            'indirizzoPagatore' => 'Divina Scuola di Hokuto',
            'civicoPagatore' => '100',
            'capPagatore' => '00100',
            'localitaPagatore' => 'Croce del Sud',
            'provinciaPagatore' => 'RM',
            'nazionePagatore' => 'IT',
            'e-mailPagatore' => 'kenshiro.kasumi@divinascuolahokuto.it',


            'codiceEsitoPagamento' => 0,
            'importoTotalePagato' => (float) $rt["importoSingoloVersamento"],
            'identificativoUnivocoVersamento' => $rt["identificativoUnivocoVersamento"],
            'codiceContestoPagamento' => $rt["codiceContestoPagamento"],

            'singoloImportoPagato1' => (float) $rt["importoSingoloVersamento"],
            'esitoSingoloPagamento1' => 'OK',
            'dataEsitoSingoloPagamento1' => date("Y-m-d"),
            'identificativoUnivocoRiscossione1' => '123456789',
            'causaleVersamento1' => '/RFS/' . $rt["identificativoUnivocoVersamento"] . '/' . (float) $rt["importoSingoloVersamento"],
            'datiSpecificiRiscossione1' => '9/abcdefg',

            'dropdownNumPagamenti' => 1
        );


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
                'identificativoIntermediarioPSP' => $rt["identificativoIntermediarioPSP"],  //'97735020584'
                'identificativoCanale' => $rt["identificativoCanalePSP"],  //'97735020584_04'
                'password' => 'pwd_AgID',
                'identificativoPSP' => $rt["identificativoPSP"], //'AGID_02',
                'identificativoDominio' => $rt["identificativoDominio"],  //'77777777777',
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
            $insert = $db->query('UPDATE paaattivarptcoda SET statusInviataRT=1 WHERE id=?', $rt["id"]);

            //Log
            $log->info('=============================== RT ===============================' );
            $log->info('RT in coda con ID locale ' . $rt["id"] . ' avente IUV ' . $rt['identificativoUnivocoVersamento'] . ' e CCP ' . $rt['codiceContestoPagamento'] . ' è stata inviata al NodoSPC.' );
            $log->info('RT inviata: ' . $helper->formatXmlString($rtContent) );
            $log->info('Richiesta RT inviata: ' . $helper->formatXmlString($soapRequest) );
            $log->info('Esito RT: ' . $helper->formatXmlString($RTResponseBody) );

        } catch (Exception $e) {
            $log->error("Esecuzione RT in coda per paaAttivaRPT: " . $e->getMessage());
        }
    }

    $db->close();



?>