<?php

require_once "Helper.php";

    class RPTRequest {

        public function getXMLInviaNodo($params) {
            $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ppt="http://ws.pagamenti.telematici.gov/ppthead" xmlns:ws="http://ws.pagamenti.telematici.gov/">
                               <soapenv:Header>
                                  <ppt:intestazionePPT>
                                     <identificativoIntermediarioPA>'.$params['identificativoIntermediarioPA'].'</identificativoIntermediarioPA>
                                     <identificativoStazioneIntermediarioPA>'.$params['identificativoStazioneIntermediarioPA'].'</identificativoStazioneIntermediarioPA>
                                               <identificativoDominio>'.$params['identificativoDominio'].'</identificativoDominio>
                                           <identificativoUnivocoVersamento>'.$params['identificativoUnivocoVersamento'].'</identificativoUnivocoVersamento>
                                           <codiceContestoPagamento>'.$params['codiceContestoPagamento'].'</codiceContestoPagamento>
                            </ppt:intestazionePPT>
                               </soapenv:Header>
                               <soapenv:Body>
                                  <ws:nodoInviaRPT>
                                     <password>'.$params['password'].'</password>
                                     <identificativoPSP>'.$params['identificativoPSP'].'</identificativoPSP>
                                     <!--Optional:-->
                                     <identificativoIntermediarioPSP>'.$params['identificativoIntermediarioPSP'].'</identificativoIntermediarioPSP>
                                     <!--Optional:-->
                                     <identificativoCanale>'.$params['identificativoCanale'].'</identificativoCanale>
                                     <tipoFirma>'.$params['tipoFirma'].'</tipoFirma>
                                           <rpt>'. $params['rptEncodedContent'] .'</rpt>
                                  </ws:nodoInviaRPT>
                               </soapenv:Body>
                            </soapenv:Envelope>';
            return $xml;
        }

}
