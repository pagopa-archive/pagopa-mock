<?php

require_once "Helper.php";

    class RRRequest {

        public function getXMLInviaNodo($params) {
            $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.pagamenti.telematici.gov/">
                               <soapenv:Header/>
                               <soapenv:Body>
                                  <ws:nodoInviaRichiestaRevoca>
                                     <identificativoPSP>'.$params['identificativoPSP'].'</identificativoPSP>
                                     <identificativoIntermediarioPSP>'.$params['identificativoIntermediarioPSP'].'</identificativoIntermediarioPSP>
                                     <identificativoCanale>'.$params['identificativoCanale'].'</identificativoCanale>
                                     <password>'.$params['password'].'</password>                                     
                                     <identificativoDominio>'.$params['identificativoDominio'].'</identificativoDominio>
                                     <identificativoUnivocoVersamento>'.$params['identificativoUnivocoVersamento'].'</identificativoUnivocoVersamento>
                                     <codiceContestoPagamento>'.$params['codiceContestoPagamento'].'</codiceContestoPagamento>

                                     <rr>'. $params['rrEncodedContent'] .'</rr>
                                  </ws:nodoInviaRichiestaRevoca>
                               </soapenv:Body>
                            </soapenv:Envelope>';
            return $xml;
        }

}