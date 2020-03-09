<?php
    require_once "../logWriter.class.php";
    require_once "../Helper.php";
    require_once "../DOMValidator.class.php";
    require_once "../dbms.class.php";
    require_once "../RT.class.php";
    require_once "../RR.class.php";
    require_once "../RTRequest.class.php";
    require_once "../RRRequest.class.php";

    class PSPServer
    {

        /* Se è true viene automaticamente inviata la revoca del pagamento */
        /** @var $inviaREVOCA bool  */
        private $inviaREVOCA = true;


        function pspInviaRPT()
        {
            //Request
            $soapRequest = file_get_contents ('php://input');
            $soapRequestX = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $soapRequest);
            $soapRequestXML = simplexml_load_string($soapRequestX);

            //Response
            $soapResponse = new StdClass;
            $esito="OK";
            $soapResponse->pspInviaRPTResponse->esitoComplessivoOperazione = $esito;
            $soapMessage = new SoapVar($soapResponse, SOAP_ENC_OBJECT);

            /////////////
            /* RPT */
            $item=$soapRequestXML->soapenvBody->pptpspInviaCarrelloRPT->listaRPT->elementoListaCarrelloRPT;
            $numRPT=1;

            $identificativoDominio = (string)$item->identificativoDominio;
            $identificativoUnivocoVersamento = (string)$item->identificativoUnivocoVersamento;
            $codiceContestoPagamento = (string)$item->codiceContestoPagamento;
            $encodedRPT = (string)$item->rpt;

            $decodedRPT = base64_decode($encodedRPT);
            $decodedRPTXML = simplexml_load_string($decodedRPT);

            //Log Received RPT
            $content["RPT" . $numRPT] = $decodedRPT;
            $content["identificativoUnivocoVersamento" . $numRPT] = $identificativoUnivocoVersamento;
            $content["codiceContestoPagamento" . $numRPT] = $codiceContestoPagamento;


            //Sending RT
            $decodedRPT = base64_decode($encodedRPT);
            $decodedRPTXML = simplexml_load_string($decodedRPT);

            //Message
            $length=15;
            $idMessaggio = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
            $numPagamenti = 0;
            $datiVersamento = array();

            foreach($decodedRPTXML->datiVersamento->datiSingoloVersamento as $item) {
                $numPagamenti += 1;
                $datiVersamento["singoloImportoPagato" . $numPagamenti]=sprintf('%0.2f', (float) $item->importoSingoloVersamento);
                $datiVersamento["esitoSingoloPagamento" . $numPagamenti]="OK";
                $datiVersamento["dataEsitoSingoloPagamento" . $numPagamenti]=$decodedRPTXML->datiVersamento->dataEsecuzionePagamento;
                $datiVersamento["identificativoUnivocoRiscossione" . $numPagamenti]=rand(10,99999);
                $datiVersamento["causaleVersamento" . $numPagamenti]=$item->causaleVersamento;
                $datiVersamento["datiSpecificiRiscossione" . $numPagamenti]=$item->datiSpecificiRiscossione;
            }
            $numPagamenti += 1;
            for($d=$numPagamenti; $d<6; $d++) {
                $datiVersamento["singoloImportoPagato" . $d]=0;
                $datiVersamento["esitoSingoloPagamento" . $d]=0;
                $datiVersamento["dataEsitoSingoloPagamento" . $d]=0;
                $datiVersamento["identificativoUnivocoRiscossione" . $d]=0;
                $datiVersamento["causaleVersamento" . $d]=0;
                $datiVersamento["datiSpecificiRiscossione" . $d]=0;
            }

            //RT class
            $RTsettings = array(
                'versioneOggetto' => (string)$decodedRPTXML->versioneOggetto,
                'identificativoDominio' => $identificativoDominio,
                'identificativoMessaggioRicevuta' => $idMessaggio,
                'dataOraMessaggioRicevuta' => date("c"),
                'riferimentoMessaggioRichiesta' => (string)$decodedRPTXML->identificativoMessaggioRichiesta,
                'riferimentoDataRichiesta' => date("Y-m-d", strtotime($decodedRPTXML->dataOraMessaggioRichiesta)),

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

                'tipoIdentificativoUnivocoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->identificativoUnivocoBeneficiario->tipoIdentificativoUnivoco,
                'codiceIdentificativoUnivocoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->identificativoUnivocoBeneficiario->codiceIdentificativoUnivoco,
                'denominazioneBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->denominazioneBeneficiario,
                'indirizzoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->indirizzoBeneficiario,
                'civicoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->civicoBeneficiario,
                'capBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->capBeneficiario,
                'localitaBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->localitaBeneficiario,
                'provinciaBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->provinciaBeneficiario,
                'nazioneBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->nazioneBeneficiario,

                'tipoIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->tipoIdentificativoUnivoco,
                'codiceIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->codiceIdentificativoUnivoco,
                'anagraficaVersante' => (string)$decodedRPTXML->soggettoVersante->anagraficaVersante,
                'indirizzoVersante' => (string)$decodedRPTXML->soggettoVersante->indirizzoVersante,
                'civicoVersante' => (string)$decodedRPTXML->soggettoVersante->civicoVersante,
                'capVersante' => (string)$decodedRPTXML->soggettoVersante->capVersante,
                'localitaVersante' => (string)$decodedRPTXML->soggettoVersante->localitaVersante,
                'provinciaVersante' => (string)$decodedRPTXML->soggettoVersante->provinciaVersante,
                'nazioneVersante' => (string)$decodedRPTXML->soggettoVersante->nazioneVersante,
                'e-mailVersante' => "daniele.landro@agid.gov.it",

                'tipoIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->tipoIdentificativoUnivoco,
                'codiceIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->codiceIdentificativoUnivoco,
                'anagraficaPagatore' => (string)$decodedRPTXML->soggettoPagatore->anagraficaPagatore,
                'indirizzoPagatore' => (string)$decodedRPTXML->soggettoPagatore->indirizzoPagatore,
                'civicoPagatore' => (string)$decodedRPTXML->soggettoPagatore->civicoPagatore,
                'capPagatore' => (string)$decodedRPTXML->soggettoPagatore->capPagatore,
                'localitaPagatore' => (string)$decodedRPTXML->soggettoPagatore->localitaPagatore,
                'provinciaPagatore' => (string)$decodedRPTXML->soggettoPagatore->provinciaPagatore,
                'nazionePagatore' => (string)$decodedRPTXML->soggettoPagatore->nazionePagatore,
                'e-mailPagatore' => "daniele.landro@agid.gov.it",


                'codiceEsitoPagamento' => 0,
                'importoTotalePagato' => (float) $decodedRPTXML->datiVersamento->importoTotaleDaVersare,
                'identificativoUnivocoVersamento' => (string)$decodedRPTXML->datiVersamento->identificativoUnivocoVersamento,
                'codiceContestoPagamento' => (string)$decodedRPTXML->datiVersamento->codiceContestoPagamento,

                'singoloImportoPagato1' => (float) $datiVersamento["singoloImportoPagato1"],
                'esitoSingoloPagamento1' => $datiVersamento["esitoSingoloPagamento1"],
                'dataEsitoSingoloPagamento1' => (string)$datiVersamento["dataEsitoSingoloPagamento1"],
                'identificativoUnivocoRiscossione1' => $datiVersamento["identificativoUnivocoRiscossione1"],
                'causaleVersamento1' => (string)$datiVersamento["causaleVersamento1"],
                'datiSpecificiRiscossione1' => (string)$datiVersamento["datiSpecificiRiscossione1"],
                'singoloImportoPagato2' => (float) $datiVersamento["singoloImportoPagato2"],
                'esitoSingoloPagamento2' => $datiVersamento["esitoSingoloPagamento2"],
                'dataEsitoSingoloPagamento2' => (string)$datiVersamento["dataEsitoSingoloPagamento2"],
                'identificativoUnivocoRiscossione2' => $datiVersamento["identificativoUnivocoRiscossione2"],
                'causaleVersamento2' => (string)$datiVersamento["causaleVersamento2"],
                'datiSpecificiRiscossione2' => (string)$datiVersamento["datiSpecificiRiscossione2"],
                'singoloImportoPagato3' => (float) $datiVersamento["singoloImportoPagato3"],
                'esitoSingoloPagamento3' => $datiVersamento["esitoSingoloPagamento3"],
                'dataEsitoSingoloPagamento3' => (string)$datiVersamento["dataEsitoSingoloPagamento3"],
                'identificativoUnivocoRiscossione3' => $datiVersamento["identificativoUnivocoRiscossione3"],
                'causaleVersamento3' => (string)$datiVersamento["causaleVersamento3"],
                'datiSpecificiRiscossione3' => (string)$datiVersamento["datiSpecificiRiscossione3"],
                'singoloImportoPagato4' => (float) $datiVersamento["singoloImportoPagato4"],
                'esitoSingoloPagamento4' => $datiVersamento["esitoSingoloPagamento4"],
                'dataEsitoSingoloPagamento4' => (string)$datiVersamento["dataEsitoSingoloPagamento4"],
                'identificativoUnivocoRiscossione4' => $datiVersamento["identificativoUnivocoRiscossione4"],
                'causaleVersamento4' => (string)$datiVersamento["causaleVersamento4"],
                'datiSpecificiRiscossione4' => (string)$datiVersamento["datiSpecificiRiscossione4"],
                'singoloImportoPagato5' => (float) $datiVersamento["singoloImportoPagato5"],
                'esitoSingoloPagamento5' => $datiVersamento["esitoSingoloPagamento5"],
                'dataEsitoSingoloPagamento5' => (string)$datiVersamento["dataEsitoSingoloPagamento5"],
                'identificativoUnivocoRiscossione5' => $datiVersamento["identificativoUnivocoRiscossione5"],
                'causaleVersamento5' => (string)$datiVersamento["causaleVersamento5"],
                'datiSpecificiRiscossione5' => (string)$datiVersamento["datiSpecificiRiscossione5"],

                'dropdownNumPagamenti' => $numPagamenti-1
            );

            //Database
            $dblog="";
            try {
                $db = new dbms();

                $insert = $db->query('INSERT INTO pspinviacarrellortcoda (rtarray, rrrichiesta, rtinviata, identificativoDominio, identificativoUnivocoVersamento, codiceContestoPagamento) VALUES (?,?,?,?,?,?)',
                    (string)serialize($RTsettings),
                    (($this->inviaREVOCA==true) ? 1 : 0),
                    0,
                    (string)$identificativoDominio,
                    (string)$decodedRPTXML->datiVersamento->identificativoUnivocoVersamento,
                    (string)$decodedRPTXML->datiVersamento->codiceContestoPagamento
                );

                $dblog='MYSQL - Esito inserimento pspInviaCarrelloRPT: ' . $insert->affectedRows() . ' record.';
                $db->close();
            } catch (Exception $e) {
                $dblog='MYSQL - Errore inserimento pspInviaCarrelloRPT: ' . $e->getMessage();
            }

            ////////////

            /* Log */
            $content["request"] = $soapRequest;
            $content["response"] = json_encode($soapResponse);
            $this->logSmallRequest1($content);

            /* Invio asincrono RT in coda */
            $command = "curl --insecure https://pagopatest.agid.gov.it/cdi/serverPSP/PSPServerCodaRT.php";
            shell_exec( $command . "> /dev/null 2>/dev/null &" );

            return $soapMessage;
        }

        function pspInviaCarrelloRPT()
        {
            //Request
            $soapRequest = file_get_contents ('php://input');
            $soapRequestX = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $soapRequest);
            $soapRequestXML = simplexml_load_string($soapRequestX);

            //Response
            $soapResponse = new StdClass;
            $esito="OK";
            $soapResponse->pspInviaCarrelloRPTResponse->esitoComplessivoOperazione = $esito;
            $soapResponse->pspInviaCarrelloRPTResponse->parametriPagamentoImmediato = "idRichiesta=717bdafa-c111-47ec-83d5-53".rand ( 10000 , 99999 );
            $soapMessage = new SoapVar($soapResponse, SOAP_ENC_OBJECT);


            $numRPT=0;
            foreach($soapRequestXML->soapenvBody->pptpspInviaCarrelloRPT->listaRPT->elementoListaCarrelloRPT as $item)
            {
                $numRPT+=1;
                $identificativoDominio = (string)$item->identificativoDominio;
                $identificativoUnivocoVersamento = (string)$item->identificativoUnivocoVersamento;
                $codiceContestoPagamento = (string)$item->codiceContestoPagamento;
                $encodedRPT = (string)$item->rpt;

                $decodedRPT = base64_decode($encodedRPT);
                $decodedRPTXML = simplexml_load_string($decodedRPT);

                //Log Received RPT
                $content["RPT" . $numRPT] = $decodedRPT;
                $content["identificativoUnivocoVersamento" . $numRPT] = $identificativoUnivocoVersamento;
                $content["codiceContestoPagamento" . $numRPT] = $codiceContestoPagamento;

                ///////////////////////////
                //Sending RT
                $decodedRPT = base64_decode($encodedRPT);
                $decodedRPTXML = simplexml_load_string($decodedRPT);

                //Message
                $length=15;
                $idMessaggio = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                $numPagamenti = 0;
                $datiVersamento = array();

                foreach($decodedRPTXML->datiVersamento->datiSingoloVersamento as $item) {
                    $numPagamenti += 1;
                    $datiVersamento["singoloImportoPagato" . $numPagamenti]=sprintf('%0.2f', (float) $item->importoSingoloVersamento);
                    $datiVersamento["esitoSingoloPagamento" . $numPagamenti]="OK";
                    $datiVersamento["dataEsitoSingoloPagamento" . $numPagamenti]=$decodedRPTXML->datiVersamento->dataEsecuzionePagamento;
                    $datiVersamento["identificativoUnivocoRiscossione" . $numPagamenti]=rand(10,99999);
                    $datiVersamento["causaleVersamento" . $numPagamenti]=$item->causaleVersamento;
                    $datiVersamento["datiSpecificiRiscossione" . $numPagamenti]=$item->datiSpecificiRiscossione;
                }
                $numPagamenti += 1;
                for($d=$numPagamenti; $d<6; $d++) {
                    $datiVersamento["singoloImportoPagato" . $d]=0;
                    $datiVersamento["esitoSingoloPagamento" . $d]=0;
                    $datiVersamento["dataEsitoSingoloPagamento" . $d]=0;
                    $datiVersamento["identificativoUnivocoRiscossione" . $d]=0;
                    $datiVersamento["causaleVersamento" . $d]=0;
                    $datiVersamento["datiSpecificiRiscossione" . $d]=0;
                }

                /***********************************/
                //RT class
                $RTsettings = array(
                    'versioneOggetto' => (string)$decodedRPTXML->versioneOggetto,
                    'identificativoDominio' => $identificativoDominio,  //'77777777777'
                    'identificativoMessaggioRicevuta' => $idMessaggio,
                    'dataOraMessaggioRicevuta' => date("c"),
                    'riferimentoMessaggioRichiesta' => (string)$decodedRPTXML->identificativoMessaggioRichiesta,
                    'riferimentoDataRichiesta' => date("Y-m-d", strtotime($decodedRPTXML->dataOraMessaggioRichiesta)),

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

                    'tipoIdentificativoUnivocoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->identificativoUnivocoBeneficiario->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->identificativoUnivocoBeneficiario->codiceIdentificativoUnivoco,
                    'denominazioneBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->denominazioneBeneficiario,
                    'indirizzoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->indirizzoBeneficiario,
                    'civicoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->civicoBeneficiario,
                    'capBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->capBeneficiario,
                    'localitaBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->localitaBeneficiario,
                    'provinciaBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->provinciaBeneficiario,
                    'nazioneBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->nazioneBeneficiario,

                    'tipoIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->codiceIdentificativoUnivoco,
                    'anagraficaVersante' => (string)$decodedRPTXML->soggettoVersante->anagraficaVersante,
                    'indirizzoVersante' => (string)$decodedRPTXML->soggettoVersante->indirizzoVersante,
                    'civicoVersante' => (string)$decodedRPTXML->soggettoVersante->civicoVersante,
                    'capVersante' => (string)$decodedRPTXML->soggettoVersante->capVersante,
                    'localitaVersante' => (string)$decodedRPTXML->soggettoVersante->localitaVersante,
                    'provinciaVersante' => (string)$decodedRPTXML->soggettoVersante->provinciaVersante,
                    'nazioneVersante' => (string)$decodedRPTXML->soggettoVersante->nazioneVersante,
                    'e-mailVersante' => "daniele.landro@agid.gov.it",

                    'tipoIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->codiceIdentificativoUnivoco,
                    'anagraficaPagatore' => (string)$decodedRPTXML->soggettoPagatore->anagraficaPagatore,
                    'indirizzoPagatore' => (string)$decodedRPTXML->soggettoPagatore->indirizzoPagatore,
                    'civicoPagatore' => (string)$decodedRPTXML->soggettoPagatore->civicoPagatore,
                    'capPagatore' => (string)$decodedRPTXML->soggettoPagatore->capPagatore,
                    'localitaPagatore' => (string)$decodedRPTXML->soggettoPagatore->localitaPagatore,
                    'provinciaPagatore' => (string)$decodedRPTXML->soggettoPagatore->provinciaPagatore,
                    'nazionePagatore' => (string)$decodedRPTXML->soggettoPagatore->nazionePagatore,
                    'e-mailPagatore' => "daniele.landro@agid.gov.it",


                    'codiceEsitoPagamento' => 0,
                    'importoTotalePagato' => (float) $decodedRPTXML->datiVersamento->importoTotaleDaVersare,
                    'identificativoUnivocoVersamento' => (string)$decodedRPTXML->datiVersamento->identificativoUnivocoVersamento,
                    'codiceContestoPagamento' => (string)$decodedRPTXML->datiVersamento->codiceContestoPagamento,

                    'singoloImportoPagato1' => (float) $datiVersamento["singoloImportoPagato1"],
                    'esitoSingoloPagamento1' => $datiVersamento["esitoSingoloPagamento1"],
                    'dataEsitoSingoloPagamento1' => (string)$datiVersamento["dataEsitoSingoloPagamento1"],
                    'identificativoUnivocoRiscossione1' => $datiVersamento["identificativoUnivocoRiscossione1"],
                    'causaleVersamento1' => (string)$datiVersamento["causaleVersamento1"],
                    'datiSpecificiRiscossione1' => (string)$datiVersamento["datiSpecificiRiscossione1"],
                    'singoloImportoPagato2' => (float) $datiVersamento["singoloImportoPagato2"],
                    'esitoSingoloPagamento2' => $datiVersamento["esitoSingoloPagamento2"],
                    'dataEsitoSingoloPagamento2' => (string)$datiVersamento["dataEsitoSingoloPagamento2"],
                    'identificativoUnivocoRiscossione2' => $datiVersamento["identificativoUnivocoRiscossione2"],
                    'causaleVersamento2' => (string)$datiVersamento["causaleVersamento2"],
                    'datiSpecificiRiscossione2' => (string)$datiVersamento["datiSpecificiRiscossione2"],
                    'singoloImportoPagato3' => (float) $datiVersamento["singoloImportoPagato3"],
                    'esitoSingoloPagamento3' => $datiVersamento["esitoSingoloPagamento3"],
                    'dataEsitoSingoloPagamento3' => (string)$datiVersamento["dataEsitoSingoloPagamento3"],
                    'identificativoUnivocoRiscossione3' => $datiVersamento["identificativoUnivocoRiscossione3"],
                    'causaleVersamento3' => (string)$datiVersamento["causaleVersamento3"],
                    'datiSpecificiRiscossione3' => (string)$datiVersamento["datiSpecificiRiscossione3"],
                    'singoloImportoPagato4' => (float) $datiVersamento["singoloImportoPagato4"],
                    'esitoSingoloPagamento4' => $datiVersamento["esitoSingoloPagamento4"],
                    'dataEsitoSingoloPagamento4' => (string)$datiVersamento["dataEsitoSingoloPagamento4"],
                    'identificativoUnivocoRiscossione4' => $datiVersamento["identificativoUnivocoRiscossione4"],
                    'causaleVersamento4' => (string)$datiVersamento["causaleVersamento4"],
                    'datiSpecificiRiscossione4' => (string)$datiVersamento["datiSpecificiRiscossione4"],
                    'singoloImportoPagato5' => (float) $datiVersamento["singoloImportoPagato5"],
                    'esitoSingoloPagamento5' => $datiVersamento["esitoSingoloPagamento5"],
                    'dataEsitoSingoloPagamento5' => (string)$datiVersamento["dataEsitoSingoloPagamento5"],
                    'identificativoUnivocoRiscossione5' => $datiVersamento["identificativoUnivocoRiscossione5"],
                    'causaleVersamento5' => (string)$datiVersamento["causaleVersamento5"],
                    'datiSpecificiRiscossione5' => (string)$datiVersamento["datiSpecificiRiscossione5"],

                    'dropdownNumPagamenti' => $numPagamenti-1
                );


                //RR class
                $RRsettings = array(
                    'versioneOggetto' => (string)$decodedRPTXML->versioneOggetto,
                    'identificativoDominio' => $identificativoDominio, //'77777777777'
                    'identificativoMessaggioRicevuta' => $idMessaggio,
                    'identificativoStazioneRichiedente' => '97735020584_04',
                    'dataOraMessaggioRevoca' => date("c"),


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

                    'tipoIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->codiceIdentificativoUnivoco,
                    'anagraficaVersante' => (string)$decodedRPTXML->soggettoVersante->anagraficaVersante,
                    'indirizzoVersante' => (string)$decodedRPTXML->soggettoVersante->indirizzoVersante,
                    'civicoVersante' => (string)$decodedRPTXML->soggettoVersante->civicoVersante,
                    'capVersante' => (string)$decodedRPTXML->soggettoVersante->capVersante,
                    'localitaVersante' => (string)$decodedRPTXML->soggettoVersante->localitaVersante,
                    'provinciaVersante' => (string)$decodedRPTXML->soggettoVersante->provinciaVersante,
                    'nazioneVersante' => (string)$decodedRPTXML->soggettoVersante->nazioneVersante,
                    'e-mailVersante' => "daniele.landro@agid.gov.it",

                    'tipoIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->codiceIdentificativoUnivoco,
                    'anagraficaPagatore' => (string)$decodedRPTXML->soggettoPagatore->anagraficaPagatore,
                    'indirizzoPagatore' => (string)$decodedRPTXML->soggettoPagatore->indirizzoPagatore,
                    'civicoPagatore' => (string)$decodedRPTXML->soggettoPagatore->civicoPagatore,
                    'capPagatore' => (string)$decodedRPTXML->soggettoPagatore->capPagatore,
                    'localitaPagatore' => (string)$decodedRPTXML->soggettoPagatore->localitaPagatore,
                    'provinciaPagatore' => (string)$decodedRPTXML->soggettoPagatore->provinciaPagatore,
                    'nazionePagatore' => (string)$decodedRPTXML->soggettoPagatore->nazionePagatore,
                    'e-mailPagatore' => "daniele.landro@agid.gov.it",


                    'importoTotaleRevocato' => (float) $decodedRPTXML->datiVersamento->importoTotaleDaVersare,
                    'identificativoUnivocoVersamento' => (string)$decodedRPTXML->datiVersamento->identificativoUnivocoVersamento,
                    'codiceContestoPagamento' => (string)$decodedRPTXML->datiVersamento->codiceContestoPagamento,

                    'singoloImportoRevocato1' => (float) $datiVersamento["singoloImportoPagato1"],
                    'singoloImportoRevocato2' => (float) $datiVersamento["singoloImportoPagato2"],
                    'singoloImportoRevocato3' => (float) $datiVersamento["singoloImportoPagato3"],
                    'singoloImportoRevocato4' => (float) $datiVersamento["singoloImportoPagato4"],
                    'singoloImportoRevocato5' => (float) $datiVersamento["singoloImportoPagato5"],


                    'dropdownNumPagamenti' => $numPagamenti-1
                );

                //Database
                $dblog="";
                try {
                    $db = new dbms();

                    $insert = $db->query('INSERT INTO pspinviacarrellortcoda (rtarray, rrarray, rrrichiesta, rtinviata, identificativoDominio, identificativoUnivocoVersamento, codiceContestoPagamento) VALUES (?,?,?,?,?,?,?)',
                        (string)serialize($RTsettings),
                        (string)serialize($RRsettings),
                        (($this->inviaREVOCA==true) ? 1 : 0),
                        0,
                        (string)$identificativoDominio,
                        (string)$decodedRPTXML->datiVersamento->identificativoUnivocoVersamento,
                        (string)$decodedRPTXML->datiVersamento->codiceContestoPagamento
                    );

                    $dblog='MYSQL - Esito inserimento pspInviaCarrelloRPT: ' . $insert->affectedRows() . ' record.';
                    $db->close();
                } catch (Exception $e) {
                    $dblog='MYSQL - Errore inserimento pspInviaCarrelloRPT: ' . $e->getMessage();
                }

                //Log
                $content["request"] = $soapRequest;
                $content["response"] = json_encode($soapResponse);
                $content["dblog"] = $dblog;
                $this->logSmallRequest2($content);

                //Sending RT
                $command = "curl --insecure https://pagopatest.agid.gov.it/cdi/serverPSP/PSPServerCodaRTPagamentoPSP.php";
                shell_exec( $command . "> /dev/null 2>/dev/null &" );


            } // foreach elementoListaCarrelloRPT

            /* Log */
            $content["request"] = $soapRequest;
            $content["response"] = json_encode($soapResponse);
            $content["numRPT"] = $numRPT;
            $this->logSmallRequest3($content);

            return $soapMessage;
        }

        function pspInviaCarrelloRPTCarte()
        {
            //Request
            $soapRequest = file_get_contents ('php://input');
            $soapRequestX = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $soapRequest);
            $soapRequestXML = simplexml_load_string($soapRequestX);

            //Response
            $soapResponse = new StdClass;
            $esito="OK";
            $soapResponse->pspInviaCarrelloRPTResponse->esitoComplessivoOperazione = $esito;
            $soapMessage = new SoapVar($soapResponse, SOAP_ENC_OBJECT);

            $numRPT=0;
            foreach($soapRequestXML->soapenvBody->pptpspInviaCarrelloRPTCarte->listaRPT->elementoListaCarrelloRPT as $item)
            {
                $numRPT+=1;
                $identificativoDominio = (string)$item->identificativoDominio;
                $identificativoUnivocoVersamento = (string)$item->identificativoUnivocoVersamento;
                $codiceContestoPagamento = (string)$item->codiceContestoPagamento;
                $encodedRPT = (string)$item->rpt;

                $decodedRPT = base64_decode($encodedRPT);
                $decodedRPTXML = simplexml_load_string($decodedRPT);

                //Log Received RPT
                $content["RPT" . $numRPT] = $decodedRPT;
                $content["identificativoUnivocoVersamento" . $numRPT] = $identificativoUnivocoVersamento;
                $content["codiceContestoPagamento" . $numRPT] = $codiceContestoPagamento;

                ///////////////////////////
                //Sending RT
                $decodedRPT = base64_decode($encodedRPT);
                $decodedRPTXML = simplexml_load_string($decodedRPT);

                //Message
                $length=15;
                $idMessaggio = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                $numPagamenti = 0;
                $datiVersamento = array();

                foreach($decodedRPTXML->datiVersamento->datiSingoloVersamento as $item) {
                    $numPagamenti += 1;
                    $datiVersamento["singoloImportoPagato" . $numPagamenti]=sprintf('%0.2f', (float) $item->importoSingoloVersamento);
                    $datiVersamento["esitoSingoloPagamento" . $numPagamenti]="OK";
                    $datiVersamento["dataEsitoSingoloPagamento" . $numPagamenti]=$decodedRPTXML->datiVersamento->dataEsecuzionePagamento;
                    $datiVersamento["identificativoUnivocoRiscossione" . $numPagamenti]=rand(10,99999);
                    $datiVersamento["causaleVersamento" . $numPagamenti]=$item->causaleVersamento;
                    $datiVersamento["datiSpecificiRiscossione" . $numPagamenti]=$item->datiSpecificiRiscossione;
                }
                $numPagamenti += 1;
                for($d=$numPagamenti; $d<6; $d++) {
                    $datiVersamento["singoloImportoPagato" . $d]=0;
                    $datiVersamento["esitoSingoloPagamento" . $d]=0;
                    $datiVersamento["dataEsitoSingoloPagamento" . $d]=0;
                    $datiVersamento["identificativoUnivocoRiscossione" . $d]=0;
                    $datiVersamento["causaleVersamento" . $d]=0;
                    $datiVersamento["datiSpecificiRiscossione" . $d]=0;
                }

                /***********************************/
                //RT class
                $RTsettings = array(
                    'versioneOggetto' => (string)$decodedRPTXML->versioneOggetto,
                    'identificativoDominio' => $identificativoDominio,  //'77777777777'
                    'identificativoMessaggioRicevuta' => $idMessaggio,
                    'dataOraMessaggioRicevuta' => date("c"),
                    'riferimentoMessaggioRichiesta' => (string)$decodedRPTXML->identificativoMessaggioRichiesta,
                    'riferimentoDataRichiesta' => date("Y-m-d", strtotime($decodedRPTXML->dataOraMessaggioRichiesta)),

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

                    'tipoIdentificativoUnivocoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->identificativoUnivocoBeneficiario->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->identificativoUnivocoBeneficiario->codiceIdentificativoUnivoco,
                    'denominazioneBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->denominazioneBeneficiario,
                    'indirizzoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->indirizzoBeneficiario,
                    'civicoBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->civicoBeneficiario,
                    'capBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->capBeneficiario,
                    'localitaBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->localitaBeneficiario,
                    'provinciaBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->provinciaBeneficiario,
                    'nazioneBeneficiario' => (string)$decodedRPTXML->enteBeneficiario->nazioneBeneficiario,

                    'tipoIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->codiceIdentificativoUnivoco,
                    'anagraficaVersante' => (string)$decodedRPTXML->soggettoVersante->anagraficaVersante,
                    'indirizzoVersante' => (string)$decodedRPTXML->soggettoVersante->indirizzoVersante,
                    'civicoVersante' => (string)$decodedRPTXML->soggettoVersante->civicoVersante,
                    'capVersante' => (string)$decodedRPTXML->soggettoVersante->capVersante,
                    'localitaVersante' => (string)$decodedRPTXML->soggettoVersante->localitaVersante,
                    'provinciaVersante' => (string)$decodedRPTXML->soggettoVersante->provinciaVersante,
                    'nazioneVersante' => (string)$decodedRPTXML->soggettoVersante->nazioneVersante,
                    'e-mailVersante' => "daniele.landro@agid.gov.it",

                    'tipoIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->codiceIdentificativoUnivoco,
                    'anagraficaPagatore' => (string)$decodedRPTXML->soggettoPagatore->anagraficaPagatore,
                    'indirizzoPagatore' => (string)$decodedRPTXML->soggettoPagatore->indirizzoPagatore,
                    'civicoPagatore' => (string)$decodedRPTXML->soggettoPagatore->civicoPagatore,
                    'capPagatore' => (string)$decodedRPTXML->soggettoPagatore->capPagatore,
                    'localitaPagatore' => (string)$decodedRPTXML->soggettoPagatore->localitaPagatore,
                    'provinciaPagatore' => (string)$decodedRPTXML->soggettoPagatore->provinciaPagatore,
                    'nazionePagatore' => (string)$decodedRPTXML->soggettoPagatore->nazionePagatore,
                    'e-mailPagatore' => "daniele.landro@agid.gov.it",


                    'codiceEsitoPagamento' => 0,
                    'importoTotalePagato' => (float) $decodedRPTXML->datiVersamento->importoTotaleDaVersare,
                    'identificativoUnivocoVersamento' => (string)$decodedRPTXML->datiVersamento->identificativoUnivocoVersamento,
                    'codiceContestoPagamento' => (string)$decodedRPTXML->datiVersamento->codiceContestoPagamento,

                    'singoloImportoPagato1' => (float) $datiVersamento["singoloImportoPagato1"],
                    'esitoSingoloPagamento1' => $datiVersamento["esitoSingoloPagamento1"],
                    'dataEsitoSingoloPagamento1' => (string)$datiVersamento["dataEsitoSingoloPagamento1"],
                    'identificativoUnivocoRiscossione1' => $datiVersamento["identificativoUnivocoRiscossione1"],
                    'causaleVersamento1' => (string)$datiVersamento["causaleVersamento1"],
                    'datiSpecificiRiscossione1' => (string)$datiVersamento["datiSpecificiRiscossione1"],
                    'singoloImportoPagato2' => (float) $datiVersamento["singoloImportoPagato2"],
                    'esitoSingoloPagamento2' => $datiVersamento["esitoSingoloPagamento2"],
                    'dataEsitoSingoloPagamento2' => (string)$datiVersamento["dataEsitoSingoloPagamento2"],
                    'identificativoUnivocoRiscossione2' => $datiVersamento["identificativoUnivocoRiscossione2"],
                    'causaleVersamento2' => (string)$datiVersamento["causaleVersamento2"],
                    'datiSpecificiRiscossione2' => (string)$datiVersamento["datiSpecificiRiscossione2"],
                    'singoloImportoPagato3' => (float) $datiVersamento["singoloImportoPagato3"],
                    'esitoSingoloPagamento3' => $datiVersamento["esitoSingoloPagamento3"],
                    'dataEsitoSingoloPagamento3' => (string)$datiVersamento["dataEsitoSingoloPagamento3"],
                    'identificativoUnivocoRiscossione3' => $datiVersamento["identificativoUnivocoRiscossione3"],
                    'causaleVersamento3' => (string)$datiVersamento["causaleVersamento3"],
                    'datiSpecificiRiscossione3' => (string)$datiVersamento["datiSpecificiRiscossione3"],
                    'singoloImportoPagato4' => (float) $datiVersamento["singoloImportoPagato4"],
                    'esitoSingoloPagamento4' => $datiVersamento["esitoSingoloPagamento4"],
                    'dataEsitoSingoloPagamento4' => (string)$datiVersamento["dataEsitoSingoloPagamento4"],
                    'identificativoUnivocoRiscossione4' => $datiVersamento["identificativoUnivocoRiscossione4"],
                    'causaleVersamento4' => (string)$datiVersamento["causaleVersamento4"],
                    'datiSpecificiRiscossione4' => (string)$datiVersamento["datiSpecificiRiscossione4"],
                    'singoloImportoPagato5' => (float) $datiVersamento["singoloImportoPagato5"],
                    'esitoSingoloPagamento5' => $datiVersamento["esitoSingoloPagamento5"],
                    'dataEsitoSingoloPagamento5' => (string)$datiVersamento["dataEsitoSingoloPagamento5"],
                    'identificativoUnivocoRiscossione5' => $datiVersamento["identificativoUnivocoRiscossione5"],
                    'causaleVersamento5' => (string)$datiVersamento["causaleVersamento5"],
                    'datiSpecificiRiscossione5' => (string)$datiVersamento["datiSpecificiRiscossione5"],

                    'dropdownNumPagamenti' => $numPagamenti-1
                );


                //RR class
                $RRsettings = array(
                    'versioneOggetto' => (string)$decodedRPTXML->versioneOggetto,
                    'identificativoDominio' => $identificativoDominio, //'77777777777'
                    'identificativoMessaggioRicevuta' => $idMessaggio,
                    'identificativoStazioneRichiedente' => '97735020584_04',
                    'dataOraMessaggioRevoca' => date("c"),


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

                    'tipoIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoVersante' => (string)$decodedRPTXML->soggettoVersante->identificativoUnivocoVersante->codiceIdentificativoUnivoco,
                    'anagraficaVersante' => (string)$decodedRPTXML->soggettoVersante->anagraficaVersante,
                    'indirizzoVersante' => (string)$decodedRPTXML->soggettoVersante->indirizzoVersante,
                    'civicoVersante' => (string)$decodedRPTXML->soggettoVersante->civicoVersante,
                    'capVersante' => (string)$decodedRPTXML->soggettoVersante->capVersante,
                    'localitaVersante' => (string)$decodedRPTXML->soggettoVersante->localitaVersante,
                    'provinciaVersante' => (string)$decodedRPTXML->soggettoVersante->provinciaVersante,
                    'nazioneVersante' => (string)$decodedRPTXML->soggettoVersante->nazioneVersante,
                    'e-mailVersante' => "daniele.landro@agid.gov.it",

                    'tipoIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->tipoIdentificativoUnivoco,
                    'codiceIdentificativoUnivocoPagatore' => (string)$decodedRPTXML->soggettoPagatore->identificativoUnivocoPagatore->codiceIdentificativoUnivoco,
                    'anagraficaPagatore' => (string)$decodedRPTXML->soggettoPagatore->anagraficaPagatore,
                    'indirizzoPagatore' => (string)$decodedRPTXML->soggettoPagatore->indirizzoPagatore,
                    'civicoPagatore' => (string)$decodedRPTXML->soggettoPagatore->civicoPagatore,
                    'capPagatore' => (string)$decodedRPTXML->soggettoPagatore->capPagatore,
                    'localitaPagatore' => (string)$decodedRPTXML->soggettoPagatore->localitaPagatore,
                    'provinciaPagatore' => (string)$decodedRPTXML->soggettoPagatore->provinciaPagatore,
                    'nazionePagatore' => (string)$decodedRPTXML->soggettoPagatore->nazionePagatore,
                    'e-mailPagatore' => "daniele.landro@agid.gov.it",


                    'importoTotaleRevocato' => (float) $decodedRPTXML->datiVersamento->importoTotaleDaVersare,
                    'identificativoUnivocoVersamento' => (string)$decodedRPTXML->datiVersamento->identificativoUnivocoVersamento,
                    'codiceContestoPagamento' => (string)$decodedRPTXML->datiVersamento->codiceContestoPagamento,

                    'singoloImportoRevocato1' => (float) $datiVersamento["singoloImportoPagato1"],
                    'singoloImportoRevocato2' => (float) $datiVersamento["singoloImportoPagato2"],
                    'singoloImportoRevocato3' => (float) $datiVersamento["singoloImportoPagato3"],
                    'singoloImportoRevocato4' => (float) $datiVersamento["singoloImportoPagato4"],
                    'singoloImportoRevocato5' => (float) $datiVersamento["singoloImportoPagato5"],


                    'dropdownNumPagamenti' => $numPagamenti-1
                );

                //Database
                $dblog="";
                try {
                    $db = new dbms();

                    $insert = $db->query('INSERT INTO pspinviacarrellortcoda (rtarray, rrarray, rrrichiesta, rtinviata, identificativoDominio, identificativoUnivocoVersamento, codiceContestoPagamento) VALUES (?,?,?,?,?,?,?)',
                        (string)serialize($RTsettings),
                        (string)serialize($RRsettings),
                        (($this->inviaREVOCA==true) ? 1 : 0),
                        0,
                        (string)$identificativoDominio,
                        (string)$decodedRPTXML->datiVersamento->identificativoUnivocoVersamento,
                        (string)$decodedRPTXML->datiVersamento->codiceContestoPagamento
                    );

                    $dblog='MYSQL - Esito inserimento pspInviaCarrelloRPTCarte: ' . $insert->affectedRows() . ' record.';
                    $db->close();
                } catch (Exception $e) {
                    $dblog='MYSQL - Errore inserimento pspInviaCarrelloRPTCarte: ' . $e->getMessage();
                }

                //Log
                $content["request"] = $soapRequest;
                $content["response"] = json_encode($soapResponse);
                $content["dblog"] = $dblog;
                $this->logSmallRequest2($content);

                //Sending RT
                $command = "curl --insecure https://pagopatest.agid.gov.it/cdi/serverPSP/PSPServerCodaRTPagamentoPSP.php";
                shell_exec( $command . "> /dev/null 2>/dev/null &" );


            } // foreach elementoListaCarrelloRPT


            /* Log */
            $content["request"] = $soapRequest;
            $content["response"] = json_encode($soapResponse);
            $content["numRPT"] = $numRPT;
            $this->logSmallRequest3($content);

            return $soapMessage;

        }

        function pspInviaRispostaRevoca()
        {
            $soapResponse = new StdClass;
            $esito="OK";
            $soapResponse->pspInviaRispostaRevocaResponse->esito = $esito;
            $soapMessage = new SoapVar($soapResponse, SOAP_ENC_OBJECT);

            /////
            $soapRequest = file_get_contents ('php://input');
            $content["request"] = $soapRequest;
            $content["response"] = json_encode($soapResponse);
            $this->logSmallRequest4($content);
            /////

            return $soapMessage;
        }

        /* Log */
        function logError($message) {
            //Log
            $time = date('d-M-Y');
            $logPath='../uploads/logs/log-PSPserver-' . $time . '.txt';
            $log = new logWriter($logPath);
            $helper = new Helper;

            $separator = PHP_EOL .'=================================================================';
            $log->error($separator . PHP_EOL . '=== ERRORE NEL SERVER PSP: ' . PHP_EOL . $helper->formatXmlString($message) );
        }

        function logSmallRequest1($infos) {
            //Log
            $time = date('d-M-Y');
            $logPath='../uploads/logs/log-PSPserver-' . $time . '.txt';
            $log = new logWriter($logPath);
            $helper = new Helper;

            $separator = PHP_EOL .'=================================================================';
            $log->info($separator . PHP_EOL . '=== SERVER PSP pspInviaRPT REQUEST: ' . PHP_EOL . $helper->formatXmlString($infos["request"]) );
            $log->info($separator . PHP_EOL . '=== SERVER PSP pspInviaRPT Risposta del server alla RPT: ' . PHP_EOL . $infos["response"] );
        }

        function logSmallRequest2($infos) {
            //Log
            $time = date('d-M-Y');
            $logPath='../uploads/logs/log-PSPserver-' . $time . '.txt';
            $log = new logWriter($logPath);
            $helper = new Helper;

            $separator = PHP_EOL .'=================================================================';
            $log->info($separator . PHP_EOL . '=== SERVER PSP pspInviaCarrelloRPT REQUEST: ' . PHP_EOL . $helper->formatXmlString($infos["request"]));
            $log->info($separator . PHP_EOL . '=== Risposta del server al carrello RPT: ' . PHP_EOL . $infos["response"] );
            $log->info($separator . PHP_EOL . '=== Esito DB: ' . PHP_EOL . $infos["dblog"] );
        }

        function logSmallRequest3($infos) {
            //Log
            $time = date('d-M-Y');
            $logPath='../uploads/logs/log-PSPserver-' . $time . '.txt';
            $log = new logWriter($logPath);
            $helper = new Helper;

            $separator = PHP_EOL .'=================================================================';
            $numRPT = $infos["numRPT"];
            $log->info($separator . PHP_EOL . '=== SERVER numero RPT: ' . PHP_EOL . $numRPT);
            $log->info($separator . PHP_EOL . '=== SERVER PSP InviaCarrelloRPT REQUEST: ' . PHP_EOL . $helper->formatXmlString($infos["request"]));
            $log->info($separator . PHP_EOL . '=== Risposta del server al carrello RPT: ' . PHP_EOL . $infos["response"] );
        }

        function logSmallRequest4($infos) {
            //Log
            $time = date('d-M-Y');
            $logPath='../uploads/logs/log-PSPserver-' . $time . '.txt';
            $log = new logWriter($logPath);
            $helper = new Helper;

            $separator = PHP_EOL .'=================================================================';
            $log->info($separator . PHP_EOL . '=== SERVER PSP pspInviaRispostaRevoca REQUEST: ' . PHP_EOL . $helper->formatXmlString($infos["request"]));
            $log->info($separator . PHP_EOL . '=== Risposta del server alla revoca: ' . PHP_EOL . $infos["response"] );
        }

    }
