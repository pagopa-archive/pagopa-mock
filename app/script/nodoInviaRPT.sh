#!/bin/bash
sleep 2 
echo $(date) >> ../logs/mod3nodoInviaRPT.txt
source $1
echo '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ppt="http://ws.pagamenti.telematici.gov/ppthead" xmlns:ws="http://ws.pagamenti.telematici.gov/">
   <soapenv:Header>
      <ppt:intestazionePPT  soapenv:actor="0" soapenv:mustUnderstand="0">
         <identificativoIntermediarioPA>'$IDENTIFICATIVOINTERMEDIARIOPA'</identificativoIntermediarioPA>
         <identificativoStazioneIntermediarioPA>'$IDENTIFICATIVOSTAZIONEINTERMEDIARIOPA'</identificativoStazioneIntermediarioPA>
         <identificativoDominio>'$IDENTIFICATIVODOMINIO'</identificativoDominio>
         <identificativoUnivocoVersamento>'$IUV'</identificativoUnivocoVersamento>
         <codiceContestoPagamento>'$CCP'</codiceContestoPagamento>
      </ppt:intestazionePPT>
   </soapenv:Header>
   <soapenv:Body>
      <ws:nodoInviaRPT>
         <password>'$PASSWORD'</password>
         <identificativoPSP>'$IDENTIFICATIVOPSP'</identificativoPSP>
         <!--Optional:-->
         <identificativoIntermediarioPSP>'$IDENTIFICATIVOINTERMEDIARIOPSP'</identificativoIntermediarioPSP>
         <!--Optional:-->
         <identificativoCanale>'$IDENTIFICATIVOCANALE'</identificativoCanale>
         <tipoFirma></tipoFirma>' >$2 
echo '	 <rpt>'$RPTENCODED'</rpt>' >> $2
echo '</ws:nodoInviaRPT>
   </soapenv:Body>
</soapenv:Envelope>' >> $2

echo "Invio RPT al Nodo di Test Esterno" >> ../logs/mod3nodoInviaRPT.txt
#echo $RPT >> $2
#status=$(curl -v -X POST --header "Content-Type: text/xml;charset=UTF-8" --header "SOAPAction:nodoInviaRPT" --data @$2 $URL)
status=$(curl -v -X POST --cert /var/www/html/moc/script/pagopatest.agid.gov.it.crt --key /var/www/html/moc/script/pagopatest.agid.gov.it.key  --header "Content-Type: text/xml;charset=UTF-8" --header "SOAPAction:nodoInviaRPT" --data @$2 $URL)


echo $status >> ../logs/mod3nodoInviaRPT.txt
exit 0
