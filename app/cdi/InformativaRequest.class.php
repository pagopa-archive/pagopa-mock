<?php

require_once "Helper.php";

    class InformativaRequest {

        public function getXMLInviaNodo() {
            $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ppt="http://ws.pagamenti.telematici.gov/ppthead" xmlns:ws="http://ws.pagamenti.telematici.gov/">
                               <soapenv:Header/>
                               <soapenv:Body>
                                  <ws:nodoChiediInformativaPSP>
                                     <identificativoIntermediarioPA>97735020584</identificativoIntermediarioPA>
                                     <identificativoStazioneIntermediarioPA>97735020584_01</identificativoStazioneIntermediarioPA>
                                     <password>TestECTE01</password>
                                     <identificativoDominio>77777777777</identificativoDominio>
                                  </ws:nodoChiediInformativaPSP>
                               </soapenv:Body>
                            </soapenv:Envelope>';
            return $xml;
        }

}
