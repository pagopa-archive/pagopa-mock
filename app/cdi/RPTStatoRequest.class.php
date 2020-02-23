<?php

require_once "Helper.php";

    class RPTStatoRequest {

        public function getXMLInviaNodo($params) {
            $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ppt="http://ws.pagamenti.telematici.gov/ppthead" xmlns:ws="http://ws.pagamenti.telematici.gov/">
                               <soapenv:Header/>
                               <soapenv:Body>
                                  <ws:nodoChiediStatoRPT>
                                     <identificativoIntermediarioPA>97735020584</identificativoIntermediarioPA>
                                     <identificativoStazioneIntermediarioPA>97735020584_01</identificativoStazioneIntermediarioPA>
                                     <password>TestECTE01</password>
                                     <identificativoDominio>77777777777</identificativoDominio>
                                     <identificativoUnivocoVersamento>' . $params['identificativoUnivocoVersamento'] . '</identificativoUnivocoVersamento>
                                     <codiceContestoPagamento>' . $params['codiceContestoPagamento'] . '</codiceContestoPagamento>
                                  </ws:nodoChiediStatoRPT>
                               </soapenv:Body>
                            </soapenv:Envelope>';
            return $xml;
        }

}