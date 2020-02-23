<?php

require_once "Helper.php";

    class RPT {

        public function getXML($post_params) {
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><RPT></RPT>');

            $xml->addAttribute("xmlns", "http://www.digitpa.gov.it/schemas/2011/Pagamenti/");
            $xml->addChild("versioneOggetto", $post_params["versioneOggetto"]);
            $dominio = $xml->addChild("dominio");
            $dominio->addChild("identificativoDominio", $post_params["identificativoDominio"]);
            $xml->addChild("identificativoMessaggioRichiesta", $post_params["identificativoMessaggioRichiesta"]);
            $xml->addChild("dataOraMessaggioRichiesta", $post_params["dataOraMessaggioRichiesta"]);
            $xml->addChild("autenticazioneSoggetto", $post_params["autenticazioneSoggetto"]);

            //Versante
            $soggettoVersante = $xml->addChild("soggettoVersante");
            $identificativoUnivocoVersante = $soggettoVersante->addChild("identificativoUnivocoVersante");
            $identificativoUnivocoVersante->addChild("tipoIdentificativoUnivoco", $post_params["tipoIdentificativoUnivocoVersante"]);
            $identificativoUnivocoVersante->addChild("codiceIdentificativoUnivoco", $post_params["codiceIdentificativoUnivocoVersante"]);
            $soggettoVersante->addChild("anagraficaVersante", $post_params["anagraficaVersante"]);
            $soggettoVersante->addChild("indirizzoVersante", $post_params["indirizzoVersante"]);
            $soggettoVersante->addChild("civicoVersante", $post_params["civicoVersante"]);
            $soggettoVersante->addChild("capVersante", $post_params["capVersante"]);
            $soggettoVersante->addChild("localitaVersante", $post_params["localitaVersante"]);
            $soggettoVersante->addChild("provinciaVersante", $post_params["provinciaVersante"]);
            $soggettoVersante->addChild("nazioneVersante", $post_params["nazioneVersante"]);
            $soggettoVersante->addChild("e-mailVersante", $post_params["e-mailVersante"]);

            //Pagatore
            $soggettoPagatore = $xml->addChild("soggettoPagatore");
            $identificativoUnivocoPagatore = $soggettoPagatore->addChild("identificativoUnivocoPagatore");
            $identificativoUnivocoPagatore->addChild("tipoIdentificativoUnivoco", $post_params["tipoIdentificativoUnivocoPagatore"]);
            $identificativoUnivocoPagatore->addChild("codiceIdentificativoUnivoco", $post_params["codiceIdentificativoUnivocoPagatore"]);
            $soggettoPagatore->addChild("anagraficaPagatore", $post_params["anagraficaPagatore"]);
            $soggettoPagatore->addChild("indirizzoPagatore", $post_params["indirizzoPagatore"]);
            $soggettoPagatore->addChild("civicoPagatore", $post_params["civicoPagatore"]);
            $soggettoPagatore->addChild("capPagatore", $post_params["capPagatore"]);
            $soggettoPagatore->addChild("localitaPagatore", $post_params["localitaPagatore"]);
            $soggettoPagatore->addChild("provinciaPagatore", $post_params["provinciaPagatore"]);
            $soggettoPagatore->addChild("nazionePagatore", $post_params["nazionePagatore"]);
            $soggettoPagatore->addChild("e-mailPagatore", $post_params["e-mailPagatore"]);


            //Ente
            $enteBeneficiario = $xml->addChild("enteBeneficiario");
            $identificativoUnivocoBeneficiario = $enteBeneficiario->addChild("identificativoUnivocoBeneficiario");
            $identificativoUnivocoBeneficiario->addChild("tipoIdentificativoUnivoco", $post_params["tipoIdentificativoUnivocoBeneficiario"]);
            $identificativoUnivocoBeneficiario->addChild("codiceIdentificativoUnivoco", $post_params["codiceIdentificativoUnivocoBeneficiario"]);
            $enteBeneficiario->addChild("denominazioneBeneficiario", $post_params["denominazioneBeneficiario"]);
            $enteBeneficiario->addChild("indirizzoBeneficiario", $post_params["indirizzoBeneficiario"]);
            $enteBeneficiario->addChild("civicoBeneficiario", $post_params["civicoBeneficiario"]);
            $enteBeneficiario->addChild("capBeneficiario", $post_params["capBeneficiario"]);
            $enteBeneficiario->addChild("localitaBeneficiario", $post_params["localitaBeneficiario"]);
            $enteBeneficiario->addChild("provinciaBeneficiario", $post_params["provinciaBeneficiario"]);
            $enteBeneficiario->addChild("nazioneBeneficiario", $post_params["nazioneBeneficiario"]);

            //Versamento
            $numVersamenti=$post_params["dropdownNumVersamenti"];
            $importoTotaleDaVersare=0;

            $datiVersamento = $xml->addChild("datiVersamento");
            $datiVersamento->addChild("dataEsecuzionePagamento", $post_params["dataEsecuzionePagamento"]);
            for ($i=1; $i<=$numVersamenti; $i++) {
                $isBollo = isset( $post_params["toggleXSD" . $i] ) ? $post_params["toggleXSD" . $i] : false;
                if(!$isBollo) {
                    $importoTotaleDaVersare += $post_params["importoSingoloVersamento" . $i];
                } else {
                    $importoTotaleDaVersare += $post_params["importoSingoloVersamentoBollo" . $i];
                }

            }
            if ($post_params["importoTotaleDaVersare"]=="") {
                $datiVersamento->addChild("importoTotaleDaVersare",  sprintf('%0.2f', (float) $importoTotaleDaVersare));
            } else {
                $datiVersamento->addChild("importoTotaleDaVersare",  sprintf('%0.2f', (float) $post_params["importoTotaleDaVersare"]));
            }

            $datiVersamento->addChild("tipoVersamento", $post_params["tipoVersamento"]);
            $datiVersamento->addChild("identificativoUnivocoVersamento", $post_params["identificativoUnivocoVersamento"]);
            $datiVersamento->addChild("codiceContestoPagamento", $post_params["codiceContestoPagamento"]);
            $datiVersamento->addChild("ibanAddebito", $post_params["ibanAddebito"]);
            $datiVersamento->addChild("firmaRicevuta", $post_params["firmaRicevuta"]);
            //singoli versamenti
            for ($i=1; $i<=$numVersamenti; $i++) {
                $datiSingoloVersamento=$datiVersamento->addChild("datiSingoloVersamento");
                $isBollo = isset( $post_params["toggleXSD" . $i] ) ? $post_params["toggleXSD" . $i] : false;
                if (!$isBollo) {
                    $datiSingoloVersamento->addChild("importoSingoloVersamento",  sprintf('%0.2f', (float) $post_params["importoSingoloVersamento" . $i]));
                    $datiSingoloVersamento->addChild("ibanAccredito", $post_params["ibanAccredito" . $i]);
                    $datiSingoloVersamento->addChild("ibanAppoggio", $post_params["ibanAppoggio" . $i]);
                    $datiSingoloVersamento->addChild("credenzialiPagatore", $post_params["credenzialiPagatore" . $i]);
                    $datiSingoloVersamento->addChild("causaleVersamento", $post_params["causaleVersamento" . $i]);
                    $datiSingoloVersamento->addChild("datiSpecificiRiscossione", $post_params["datiSpecificiRiscossione" . $i]);
                }
                else{ //eBollo
                    $datiSingoloVersamento->addChild("importoSingoloVersamento",  sprintf('%0.2f', (float) $post_params["importoSingoloVersamentoBollo" . $i]));
                    $datiSingoloVersamento->addChild("causaleVersamento", $post_params["causaleVersamentoBollo" . $i]);
                    $datiSingoloVersamento->addChild("datiSpecificiRiscossione", $post_params["datiSpecificiRiscossioneBollo" . $i]);
                    $marcaBollo = $datiSingoloVersamento->addChild("datiMarcaBolloDigitale");
                    $marcaBollo->addChild("tipoBollo", $post_params["tipoBollo" . $i]);
                    $marcaBollo->addChild("hashDocumento", $post_params["hashDocumento" . $i]);
                    $marcaBollo->addChild("provinciaResidenza", $post_params["provinciaResidenza" . $i]);
                }
            }

            return $xml->asXML();
        }

}