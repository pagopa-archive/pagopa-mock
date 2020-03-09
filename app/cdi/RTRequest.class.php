<?php

require_once "Helper.php";

    class RTRequest {

        public function getXMLInviaNodo($params) {
            $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.pagamenti.telematici.gov/">
                               <soapenv:Header/>
                               <soapenv:Body>
                                  <ws:nodoInviaRT>
                                     <identificativoIntermediarioPSP>'.$params['identificativoIntermediarioPSP'].'</identificativoIntermediarioPSP>
                                     <identificativoCanale>'.$params['identificativoCanale'].'</identificativoCanale>
                                     <password>'.$params['password'].'</password>
                                     <identificativoPSP>'.$params['identificativoPSP'].'</identificativoPSP>
                                     <identificativoDominio>'.$params['identificativoDominio'].'</identificativoDominio>
                                     <identificativoUnivocoVersamento>'.$params['identificativoUnivocoVersamento'].'</identificativoUnivocoVersamento>
                                     <codiceContestoPagamento>'.$params['codiceContestoPagamento'].'</codiceContestoPagamento>

                                     <rt>'. $params['rtEncodedContent'] .'</rt>
                                  </ws:nodoInviaRT>
                               </soapenv:Body>
                            </soapenv:Envelope>';
            return $xml;
        }

}