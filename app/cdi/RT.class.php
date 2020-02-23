<?php

require_once "Helper.php";

class RT {

	 //private function strlen($str){
           // return (!isset($str) || trim($str) === '');
       // }

	// IL METODO SOPRA DAVA ERRORE DI FUNZIONE NON DEFINITA PERTANTO è STATO SOSTITUITO CON if (!strlen($str) == 0)

        public function getXML($post_params) {
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><RT></RT>');

            $xml->addAttribute("xmlns", "http://www.digitpa.gov.it/schemas/2011/Pagamenti/");
            $xml->addChild("versioneOggetto", $post_params["versioneOggetto"]);
            $dominio = $xml->addChild("dominio");
            $dominio->addChild("identificativoDominio", $post_params["identificativoDominio"]);
            $xml->addChild("identificativoMessaggioRicevuta", $post_params["identificativoMessaggioRicevuta"]);
            $xml->addChild("dataOraMessaggioRicevuta", $post_params["dataOraMessaggioRicevuta"]);
            $xml->addChild("riferimentoMessaggioRichiesta", $post_params["riferimentoMessaggioRichiesta"]);
            $xml->addChild("riferimentoDataRichiesta", $post_params["riferimentoDataRichiesta"]);

            //istitutoAttestante
            $istitutoAttestante = $xml->addChild("istitutoAttestante");
            $identificativoUnivocoAttestante = $istitutoAttestante->addChild("identificativoUnivocoAttestante");
            $identificativoUnivocoAttestante->addChild("tipoIdentificativoUnivoco", $post_params["tipoIdentificativoUnivocoAttestante"]);
            $identificativoUnivocoAttestante->addChild("codiceIdentificativoUnivoco", $post_params["codiceIdentificativoUnivocoAttestante"]);
            $istitutoAttestante->addChild("denominazioneAttestante", $post_params["denominazioneAttestante"]);
            $istitutoAttestante->addChild("codiceUnitOperAttestante", $post_params["codiceUnitOperAttestante"]);
            if (!strlen($post_params["denomUnitOperAttestante"])==0) $istitutoAttestante->addChild("denomUnitOperAttestante", $post_params["denomUnitOperAttestante"]);
            if (!strlen($post_params["indirizzoAttestante"])==0) $istitutoAttestante->addChild("indirizzoAttestante", $post_params["indirizzoAttestante"]);
            if (!strlen($post_params["civicoAttestante"])==0) $istitutoAttestante->addChild("civicoAttestante", $post_params["civicoAttestante"]);
            if (!strlen($post_params["capAttestante"])==0) $istitutoAttestante->addChild("capAttestante", $post_params["capAttestante"]);
            if (!strlen($post_params["localitaAttestante"])==0) $istitutoAttestante->addChild("localitaAttestante", $post_params["localitaAttestante"]);
            if (!strlen($post_params["provinciaAttestante"])==0) $istitutoAttestante->addChild("provinciaAttestante", $post_params["provinciaAttestante"]);
            if (!strlen($post_params["nazioneAttestante"])==0) $istitutoAttestante->addChild("nazioneAttestante", $post_params["nazioneAttestante"]);

            //enteBeneficiario
            $enteBeneficiario = $xml->addChild("enteBeneficiario");
            $identificativoUnivocoBeneficiario = $enteBeneficiario->addChild("identificativoUnivocoBeneficiario");
            $identificativoUnivocoBeneficiario->addChild("tipoIdentificativoUnivoco", $post_params["tipoIdentificativoUnivocoBeneficiario"]);
            $identificativoUnivocoBeneficiario->addChild("codiceIdentificativoUnivoco", $post_params["codiceIdentificativoUnivocoBeneficiario"]);
            $enteBeneficiario->addChild("denominazioneBeneficiario", $post_params["denominazioneBeneficiario"]);
            if (!strlen($post_params["indirizzoBeneficiario"])==0) $enteBeneficiario->addChild("indirizzoBeneficiario", $post_params["indirizzoBeneficiario"]);
            if (!strlen($post_params["civicoBeneficiario"])==0) $enteBeneficiario->addChild("civicoBeneficiario", $post_params["civicoBeneficiario"]);
            if (!strlen($post_params["capBeneficiario"])==0) $enteBeneficiario->addChild("capBeneficiario", $post_params["capBeneficiario"]);
            if (!strlen($post_params["localitaBeneficiario"])==0) $enteBeneficiario->addChild("localitaBeneficiario", $post_params["localitaBeneficiario"]);
            if (!strlen($post_params["provinciaBeneficiario"])==0) $enteBeneficiario->addChild("provinciaBeneficiario", $post_params["provinciaBeneficiario"]);
            if (!strlen($post_params["nazioneBeneficiario"])==0) $enteBeneficiario->addChild("nazioneBeneficiario", $post_params["nazioneBeneficiario"]);

            //Versante
            $soggettoVersante = $xml->addChild("soggettoVersante");
            $identificativoUnivocoVersante = $soggettoVersante->addChild("identificativoUnivocoVersante");
            $identificativoUnivocoVersante->addChild("tipoIdentificativoUnivoco", $post_params["tipoIdentificativoUnivocoVersante"]);
            $identificativoUnivocoVersante->addChild("codiceIdentificativoUnivoco", $post_params["codiceIdentificativoUnivocoVersante"]);
            $soggettoVersante->addChild("anagraficaVersante", $post_params["anagraficaVersante"]);
            if (!strlen($post_params["indirizzoVersante"])==0) $soggettoVersante->addChild("indirizzoVersante", $post_params["indirizzoVersante"]);
            if (!strlen($post_params["civicoVersante"])==0) $soggettoVersante->addChild("civicoVersante", $post_params["civicoVersante"]);
            if (!strlen($post_params["capVersante"])==0) $soggettoVersante->addChild("capVersante", $post_params["capVersante"]);
            if (!strlen($post_params["localitaVersante"])==0) $soggettoVersante->addChild("localitaVersante", $post_params["localitaVersante"]);
            if (!strlen($post_params["provinciaVersante"])==0)  $soggettoVersante->addChild("provinciaVersante", $post_params["provinciaVersante"]);
            if (!strlen($post_params["nazioneVersante"])==0) $soggettoVersante->addChild("nazioneVersante", $post_params["nazioneVersante"]);
            if (!strlen($post_params["e-mailVersante"])==0)  $soggettoVersante->addChild("e-mailVersante", $post_params["e-mailVersante"]);

            //Pagatore
            $soggettoPagatore = $xml->addChild("soggettoPagatore");
            $identificativoUnivocoPagatore = $soggettoPagatore->addChild("identificativoUnivocoPagatore");
            $identificativoUnivocoPagatore->addChild("tipoIdentificativoUnivoco", $post_params["tipoIdentificativoUnivocoPagatore"]);
            $identificativoUnivocoPagatore->addChild("codiceIdentificativoUnivoco", $post_params["codiceIdentificativoUnivocoPagatore"]);
            $soggettoPagatore->addChild("anagraficaPagatore", $post_params["anagraficaPagatore"]);
            if (!strlen($post_params["indirizzoPagatore"])==0) $soggettoPagatore->addChild("indirizzoPagatore", $post_params["indirizzoPagatore"]);
            if (!strlen($post_params["civicoPagatore"])==0) $soggettoPagatore->addChild("civicoPagatore", $post_params["civicoPagatore"]);
            if (!strlen($post_params["capPagatore"])==0) $soggettoPagatore->addChild("capPagatore", $post_params["capPagatore"]);
            if (!strlen($post_params["localitaPagatore"])==0) $soggettoPagatore->addChild("localitaPagatore", $post_params["localitaPagatore"]);
            if (!strlen($post_params["provinciaPagatore"])==0) $soggettoPagatore->addChild("provinciaPagatore", $post_params["provinciaPagatore"]);
            if (!strlen($post_params["nazionePagatore"])==0) $soggettoPagatore->addChild("nazionePagatore", $post_params["nazionePagatore"]);
            if (!strlen($post_params["e-mailPagatore"])==0) $soggettoPagatore->addChild("e-mailPagatore", $post_params["e-mailPagatore"]);

            //Pagamento
            $numPagamenti=$post_params["dropdownNumPagamenti"];

            $datiPagamento = $xml->addChild("datiPagamento");
            $datiPagamento->addChild("codiceEsitoPagamento", $post_params["codiceEsitoPagamento"]);
            $datiPagamento->addChild("importoTotalePagato",  sprintf('%0.2f', (float) $post_params["importoTotalePagato"]));
            $datiPagamento->addChild("identificativoUnivocoVersamento", $post_params["identificativoUnivocoVersamento"]);
            $datiPagamento->addChild("CodiceContestoPagamento", $post_params["codiceContestoPagamento"]);

            //singoli pagamenti
            for ($i=1; $i<=$numPagamenti; $i++) {
                $datiSingoloPagamento=$datiPagamento->addChild("datiSingoloPagamento");

                $datiSingoloPagamento->addChild("singoloImportoPagato",  sprintf('%0.2f', (float) $post_params["singoloImportoPagato" . $i]));
                $datiSingoloPagamento->addChild("esitoSingoloPagamento", $post_params["esitoSingoloPagamento" . $i]);
                $datiSingoloPagamento->addChild("dataEsitoSingoloPagamento", $post_params["dataEsitoSingoloPagamento" . $i]);
                $datiSingoloPagamento->addChild("identificativoUnivocoRiscossione", $post_params["identificativoUnivocoRiscossione" . $i]);
                $datiSingoloPagamento->addChild("causaleVersamento", $post_params["causaleVersamento" . $i]);
                $datiSingoloPagamento->addChild("datiSpecificiRiscossione", $post_params["datiSpecificiRiscossione" . $i]);

            }

            return $xml->asXML();
        }



    }
