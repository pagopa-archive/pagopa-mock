<?php

require_once "Helper.php";

    class RPTCarrelloRequest {

        public function getXMLInviaNodo($params) {
            $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ppt="http://ws.pagamenti.telematici.gov/ppthead" xmlns:ws="http://ws.pagamenti.telematici.gov/">
                               <soapenv:Header>
                                  <ppt:intestazioneCarrelloPPT>
                                     <identificativoIntermediarioPA>'.$params['identificativoIntermediarioPA'].'</identificativoIntermediarioPA>
                                     <identificativoStazioneIntermediarioPA>'.$params['identificativoStazioneIntermediarioPA'].'</identificativoStazioneIntermediarioPA>
                                     <identificativoCarrello>'.$params['identificativoCarrello'].'</identificativoCarrello>
                            </ppt:intestazioneCarrelloPPT>
                               </soapenv:Header>
                               <soapenv:Body>
                                  <ws:nodoInviaCarrelloRPT>
                                     <password>'.$params['password'].'</password>
                                     <identificativoPSP>'.$params['identificativoPSP'].'</identificativoPSP>
                                     <identificativoIntermediarioPSP>'.$params['identificativoIntermediarioPSP'].'</identificativoIntermediarioPSP>
                                     <identificativoCanale>'.$params['identificativoCanale'].'</identificativoCanale>
                                     <listaRPT>';

                                    for ($i=1; $i<$params['numeroRPT']+1; $i++) {
                                      $xml .= '<elementoListaRPT>';
                                        $xml .= '<identificativoDominio>'. $params['identificativoDominio'][$i] .'</identificativoDominio>';
                                        $xml .= '<identificativoUnivocoVersamento>'. $params['identificativoUnivocoVersamento'][$i] .'</identificativoUnivocoVersamento>';
                                        $xml .= '<codiceContestoPagamento>'. $params['codiceContestoPagamento'][$i] .'</codiceContestoPagamento>';
                                        $xml .= '<tipoFirma>'. $params['tipoFirma'][$i] .'</tipoFirma>';
                                        $xml .= '<rpt>'. $params['rptEncodedContent'][$i] .'</rpt>';
                                      $xml .= '</elementoListaRPT>';
                                    }                                    
                                           
                             
                           $xml .= '
                                  </listaRPT>
                               </ws:nodoInviaCarrelloRPT>
                             </soapenv:Body>
                          </soapenv:Envelope>';
            return $xml;
        }

}