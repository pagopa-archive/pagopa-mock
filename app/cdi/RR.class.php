<?php

require_once "Helper.php";

    class RR {

        public function getXML($post_params) {
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><RR></RR>');

            $xml->addAttribute("xmlns", "http://www.digitpa.gov.it/schemas/2011/Pagamenti/Revoche/");
            $xml->addChild("versioneOggetto", $post_params["versioneOggetto"]);
            $dominio = $xml->addChild("dominio");
            $dominio->addChild("identificativoDominio", $post_params["identificativoDominio"]);
            $dominio->addChild("identificativoStazioneRichiedente", $post_params["identificativoStazioneRichiedente"]);
            $xml->addChild("identificativoMessaggioRevoca", $post_params["identificativoMessaggioRevoca"]);
            $xml->addChild("dataOraMessaggioRevoca", $post_params["dataOraMessaggioRevoca"]);

            //istitutoAttestante
            $istitutoAttestante = $xml->addChild("istitutoAttestante");
            $identificativoUnivocoAttestante = $istitutoAttestante->addChild("identificativoUnivocoAttestante");
            $identificativoUnivocoAttestante->addChild("tipoIdentificativoUnivoco", $post_params["tipoIdentificativoUnivocoAttestante"]);
            $identificativoUnivocoAttestante->addChild("codiceIdentificativoUnivoco", $post_params["codiceIdentificativoUnivocoAttestante"]);
            $istitutoAttestante->addChild("denominazioneAttestante", $post_params["denominazioneAttestante"]);
            $istitutoAttestante->addChild("codiceUnitOperAttestante", $post_params["codiceUnitOperAttestante"]);
            $istitutoAttestante->addChild("denomUnitOperAttestante", $post_params["denomUnitOperAttestante"]);
            $istitutoAttestante->addChild("indirizzoAttestante", $post_params["indirizzoAttestante"]);
            $istitutoAttestante->addChild("civicoAttestante", $post_params["civicoAttestante"]);
            $istitutoAttestante->addChild("capAttestante", $post_params["capAttestante"]);
            $istitutoAttestante->addChild("localitaAttestante", $post_params["localitaAttestante"]);
            $istitutoAttestante->addChild("provinciaAttestante", $post_params["provinciaAttestante"]);
            $istitutoAttestante->addChild("nazioneAttestante", $post_params["nazioneAttestante"]);

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

            //REVOCA
            $numPagamenti=$post_params["dropdownNumPagamenti"];

            $datiRevoca = $xml->addChild("datiRevoca");
            $datiRevoca->addChild("importoTotaleRevocato",  sprintf('%0.2f', (float) $post_params["importoTotaleRevocato"]));
            $datiRevoca->addChild("identificativoUnivocoVersamento", $post_params["identificativoUnivocoVersamento"]);
            $datiRevoca->addChild("codiceContestoPagamento", $post_params["codiceContestoPagamento"]);
            $datiRevoca->addChild("tipoRevoca", 0);

            //singole revoche
            for ($i=1; $i<=$numPagamenti; $i++) {
                $datiSingolaRevoca=$datiRevoca->addChild("datiSingolaRevoca");

                $datiSingolaRevoca->addChild("singoloImportoRevocato",  sprintf('%0.2f', (float) $post_params["singoloImportoRevocato" . $i]));
                $datiSingolaRevoca->addChild("identificativoUnivocoRiscossione", rand(0.500));
                $datiSingolaRevoca->addChild("causaleRevoca", 'Revoca ' . $i . ' ' . $post_params["identificativoUnivocoVersamento"]);
                $datiSingolaRevoca->addChild("datiAggiuntiviRevoca", 'Test' . $i);

            }

            return $xml->asXML();
        }

}