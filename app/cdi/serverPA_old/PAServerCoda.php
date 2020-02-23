<?php
    require_once "../logWriter.class.php";
    require_once "../Helper.php";
    require_once "../RPT.class.php";
    require_once "../RPTRequest.class.php";
    require_once "../dbms.class.php";

    //Log
    $time = date('d-M-Y');
    $logPath='../uploads/logs/log-PACoda-' . $time . '.txt';
    $log = new logWriter($logPath);


    $db = new dbms();
    $rpts = $db->query('SELECT * FROM paaattivarptcoda WHERE statusInviata=0')->fetchAll();

    //Invio delle RPT accodate da paaAttivaRPT
    sleep(5);

    foreach ($rpts as $rpt) {

        //Parametri RPT
        $settings = array(
            'versioneOggetto' => '6.2.0',
            'identificativoDominio' => $rpt['identificativoDominio'],
            'identificativoMessaggioRichiesta' => 'AGID56IDM',
            'dataOraMessaggioRichiesta' => date("c"),
            'autenticazioneSoggetto' => 'N/A',
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
            'tipoIdentificativoUnivocoBeneficiario' => 'G',
            'codiceIdentificativoUnivocoBeneficiario' => '77777777777',
            'denominazioneBeneficiario' => 'Ente Intermediato di Test da AgID TEST',
            'indirizzoBeneficiario' => 'Viale Liszt',
            'civicoBeneficiario' => '21',
            'capBeneficiario' => '00100',
            'localitaBeneficiario' => 'Roma',
            'provinciaBeneficiario' => 'RM',
            'nazioneBeneficiario' => 'IT',
            'dataEsecuzionePagamento' => date("Y-m-d"),
            'importoTotaleDaVersare' => (float) $rpt["importoSingoloVersamento"],
            'tipoVersamento' => 'PO',
            'identificativoUnivocoVersamento' => $rpt["identificativoUnivocoVersamento"],
            'codiceContestoPagamento' => $rpt["codiceContestoPagamento"],
            'ibanAddebito' => 'IT06T1063911700000000010535',
            'firmaRicevuta' => 0,
            'importoSingoloVersamento1' => (float) $rpt["importoSingoloVersamento"],
            'ibanAccredito1' => 'IT30N0103076271000001823603',
            'ibanAppoggio1' => 'IT57N0760114800000011050036',
            'credenzialiPagatore1' => 'n/a',
            'causaleVersamento1' => '/RFS/' . $rpt["identificativoUnivocoVersamento"] . '/' . (float) $rpt["importoSingoloVersamento"],
            'datiSpecificiRiscossione1' => '9/abcdefg',
            'dropdownNumVersamenti' => 1
        );

        try {
            //Classes
            $helper = new Helper;
            $rptGen = new RPT;
            $rptContent = $rptGen->getXML($settings);
            $rptEncodedContent = base64_encode($rptContent);

            //Action
            $endpointURL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/RPT6T";
            $privKey='/opt/moc-other/pagopatest.agid.gov.it.key';
            $pubKey='/opt/moc-other/pagopatest.agid.gov.it.crt';
            $headers = array(
                'Content-type: text/xml',
                'SOAPAction: nodoInviaRPT',
            );
            $requestParams = array(
                'identificativoIntermediarioPA' => $rpt['identificativoIntermediarioPA'],
                'identificativoStazioneIntermediarioPA' => $rpt['identificativoStazioneIntermediarioPA'],
                'identificativoDominio' => $rpt['identificativoDominio'],
                'identificativoUnivocoVersamento' => $rpt['identificativoUnivocoVersamento'],
                'codiceContestoPagamento' => $rpt['codiceContestoPagamento'],
                'password' => 'TestECTE01',                                                                     /* Verificare quale password va inserita per l'invio di RPT */
                'identificativoPSP' => $rpt['identificativoPSP'],
                'identificativoIntermediarioPSP' => $rpt['identificativoIntermediarioPSP'],
                //'identificativoCanale' => "97735020584_05",
                'identificativoCanale' => $rpt['identificativoCanalePSP'],
                'tipoFirma' => 0,
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
            curl_close($ch);


            // SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
            $responseBody = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $responseBody);
            $responseBodyXML = simplexml_load_string($responseBody);
            $status=$responseBodyXML->soapenvBody->pptnodoInviaRPTRisposta->esito;

            //insert
            $insert = $db->query('UPDATE paaattivarptcoda SET statusInviata=1 WHERE id=?', $rpt["id"]);
            $log->info('=============================== RPT ===============================' );
            $log->info('La RPT in coda (paaAttivaRPT) con id ' . $rpt["id"] . ' avente IUV ' . $rpt['identificativoUnivocoVersamento'] . ' e CCP ' . $rpt['codiceContestoPagamento'] . ' e\' stata inviata al NodoSPC.' );
            $log->info('RPT inviata: ' . $helper->formatXmlString($rptContent) );
            $log->info('Richiesta RPT inviata: ' . $helper->formatXmlString($soapRequest) );
            $log->info('Esito RPT: ' . $helper->formatXmlString($responseBody) );

        } catch (Exception $e) {
            $log->error("Esecuzione RPT in coda per paaAttivaRPT: " . $e->getMessage());
        }
    }

    $db->close();



?>
