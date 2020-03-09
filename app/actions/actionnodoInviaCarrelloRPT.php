<?php
/**
 * Created by PhpStorm.
 * User: Gianni
 * Date: 14/10/2018
 * Time: 19:26
 */

//COMPONGO LA RPT
$RPT='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<RPT xmlns="http://www.digitpa.gov.it/schemas/2011/Pagamenti/">
    <versioneOggetto>'.$_POST['versioneOggetto'].'</versioneOggetto>
    <dominio>
        <identificativoDominio>'.$_POST['identificativoDominio'].'</identificativoDominio>
    </dominio>
    <identificativoMessaggioRichiesta>'.$_POST['identificativoMessaggioRichiesta'].'</identificativoMessaggioRichiesta>
    <dataOraMessaggioRichiesta>'.$_POST['dataOraMessaggioRichiesta'].'</dataOraMessaggioRichiesta>
    <autenticazioneSoggetto>'.$_POST['autenticazioneSoggetto'].'</autenticazioneSoggetto>
    <soggettoPagatore>
        <identificativoUnivocoPagatore>
            <tipoIdentificativoUnivoco>'.$_POST['tipoIdentificativoUnivocoP'].'</tipoIdentificativoUnivoco>
            <codiceIdentificativoUnivoco>'.$_POST['codiceIdentificativoUnivocoP'].'</codiceIdentificativoUnivoco>
        </identificativoUnivocoPagatore>
        <anagraficaPagatore>'.$_POST['anagraficaPagatore'].'</anagraficaPagatore>
        <indirizzoPagatore>'.$_POST['indirizzoPagatore'].'</indirizzoPagatore>
        <civicoPagatore>'.$_POST['civicoPagatore'].'</civicoPagatore>
        <capPagatore>'.$_POST['capPagatore'].'</capPagatore>
        <localitaPagatore>'.$_POST['localitaPagatore'].'</localitaPagatore>
        <provinciaPagatore>'.$_POST['provinciaPagatore'].'</provinciaPagatore>
        <nazionePagatore>'.$_POST['nazionePagatore'].'</nazionePagatore>
        <e-mailPagatore>'.$_POST['e-mailPagatore'].'</e-mailPagatore>
    </soggettoPagatore>
    <enteBeneficiario>
        <identificativoUnivocoBeneficiario>
            <tipoIdentificativoUnivoco>'.$_POST['tipoIdentificativoUnivocoB'].'</tipoIdentificativoUnivoco>
            <codiceIdentificativoUnivoco>'.$_POST['codiceIdentificativoUnivocoB'].'</codiceIdentificativoUnivoco>
        </identificativoUnivocoBeneficiario>
        <denominazioneBeneficiario>'.$_POST['denominazioneBeneficiario'].'</denominazioneBeneficiario>
        <indirizzoBeneficiario>'.$_POST['indirizzoBeneficiario'].'</indirizzoBeneficiario>
        <civicoBeneficiario>'.$_POST['civicoBeneficiario'].'</civicoBeneficiario>
        <capBeneficiario>'.$_POST['capBeneficiario'].'</capBeneficiario>
        <localitaBeneficiario>'.$_POST['localitaBeneficiario'].'</localitaBeneficiario>
        <provinciaBeneficiario>'.$_POST['provinciaBeneficiario'].'</provinciaBeneficiario>
        <nazioneBeneficiario>'.$_POST['nazioneBeneficiario'].'</nazioneBeneficiario>
    </enteBeneficiario>
    <datiVersamento>
        <dataEsecuzionePagamento>'.$_POST['dataEsecuzionePagamento'].'</dataEsecuzionePagamento>
        <importoTotaleDaVersare>'.$_POST['importoTotaleDaVersare'].'</importoTotaleDaVersare>
        <tipoVersamento>'.$_POST['tipoVersamento'].'</tipoVersamento>
        <identificativoUnivocoVersamento>'.$_POST['identificativoUnivocoVersamento'].'</identificativoUnivocoVersamento>
        <codiceContestoPagamento>'.$_POST['codiceContestoPagamento'].'</codiceContestoPagamento>
	<ibanAddebito>'.$_POST['ibanAddebito'].'</ibanAddebito>
        <firmaRicevuta>'.$_POST['firmaRicevuta'].'</firmaRicevuta>
        <datiSingoloVersamento>
            <importoSingoloVersamento>'.$_POST['importoSingoloVersamento'].'</importoSingoloVersamento>
            <ibanAccredito>'.$_POST['ibanAccredito'].'</ibanAccredito>
            <ibanAppoggio>'.$_POST['ibanAppoggio'].'</ibanAppoggio>
            <credenzialiPagatore>'.$_POST['credenzialiPagatore'].'</credenzialiPagatore>
            <causaleVersamento>'.$_POST['causaleVersamento'].'</causaleVersamento>
            <datiSpecificiRiscossione>'.$_POST['datiSpecificiRiscossione'].'</datiSpecificiRiscossione>
        </datiSingoloVersamento>
    </datiVersamento>
</RPT>';
//echo htmlspecialchars($RPT);
$RPTENC = base64_encode($RPT);

//COMPONGO LA REQUEST
$REQUEST='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ppt="http://ws.pagamenti.telematici.gov/ppthead" xmlns:ws="http://ws.pagamenti.telematici.gov/">
   <soapenv:Header>
      <ppt:intestazioneCarrelloPPT soapenv:actor="0" soapenv:mustUnderstand="0">
         <identificativoIntermediarioPA>'.$_POST['identificativoIntermediarioPA'].'</identificativoIntermediarioPA>
         <identificativoStazioneIntermediarioPA>'.$_POST['identificativoStazioneIntermediarioPA'].'</identificativoStazioneIntermediarioPA>
         <identificativoCarrello>'.$_POST['identificativoCarrello'].'</identificativoCarrello>
      </ppt:intestazioneCarrelloPPT>
   </soapenv:Header>
   <soapenv:Body>
      <ws:nodoInviaCarrelloRPT>
         <password>'.$_POST['password'].'</password>
         <identificativoPSP>'.$_POST['identificativoPSP'].'</identificativoPSP>
         <!--Optional:-->
         <identificativoIntermediarioPSP>'.$_POST['identificativoIntermediarioPSP'].'</identificativoIntermediarioPSP>
         <!--Optional:-->
         <identificativoCanale>'.$_POST['identificativoCanale'].'</identificativoCanale>
         <listaRPT>
            <!--1 or more repetitions:-->
            <elementoListaRPT>
               <identificativoDominio>'.$_POST['identificativoDominio'].'</identificativoDominio>
               <identificativoUnivocoVersamento>'.$_POST['identificativoUnivocoVersamento'].'</identificativoUnivocoVersamento>
               <codiceContestoPagamento>'.$_POST['codiceContestoPagamento'].'</codiceContestoPagamento>
               <!--Optional:-->
               <!-- <tipoFirma>'.$_POST['tipoFirma'].'</tipoFirma>:-->
               <rpt>'.$RPTENC.'</rpt>
            </elementoListaRPT>
         </listaRPT>
      </ws:nodoInviaCarrelloRPT>
   </soapenv:Body>
</soapenv:Envelope>';


//echo htmlspecialchars($REQUEST);


function libxml_display_error($error)
{
    $return = "<br/>\n";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "<b>Warning $error->code</b>: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "<b>Error $error->code</b>: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "<b>Fatal Error $error->code</b>: ";
            break;
    }
    $return .= trim($error->message);
    if ($error->file) {
        $return .=    " in <b>$error->file</b>";
    }
    $return .= " on line <b>$error->line</b>\n";

    return $return;
}

function libxml_display_errors() {
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        print libxml_display_error($error);
    }
    libxml_clear_errors();
}

// Enable user error handling
libxml_use_internal_errors(true);

$doc = new DOMDocument();
$doc->loadXML($RPT);

if (!$doc->schemaValidate('/opt/moc-other/PagInf_RPT_RT_6_2_0.xsd')) {
    print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
    libxml_display_errors();
    exit;
}













$URL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/RPT6T";
$prkey='/opt/moc-other/pagopatest.agid.gov.it.key';
$pubkey='/opt/moc-other/pagopatest.agid.gov.it.crt';
$headers = array(
    'Content-type: text/xml',
    'SOAPAction: nodoInviaCarrelloRPT',
);


$ch = curl_init($URL);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "$REQUEST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_PORT , 443);
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_SSLKEY, "pagopatest.agid.gov.it.key");
curl_setopt($ch, CURLOPT_SSLKEY, $prkey);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//curl_setopt($ch, CURLOPT_SSLCERTPASSWD, "ag1dd_t3ST");
//curl_setopt($ch, CURLOPT_SSLCERT, "/var/www/html/moc/pagopatest.agid.gov.it.crt");
curl_setopt($ch, CURLOPT_SSLCERT, $pubkey);
//curl_setopt($ch, CURLOPT_CAINFO, "/etc/ssl/certs/ca-certificates.crt");
$output = curl_exec($ch);
curl_close($ch);

print_r($output);
//$risposta = htmlspecialchars(print_r($output, true));
echo $risposta;
$xml = $output;
$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", '$1$2$3', $xml);
$xml = simplexml_load_string($xml);
$json = json_encode($xml);
$responseArray = json_decode($json, true); // true to have an array, false for an object
print_r($responseArray);
$esito = $responseArray['soapenvBody']['pptnodoInviaCarrelloRPTRisposta']['esitoComplessivoOperazione'];
$wisp = $responseArray['soapenvBody']['pptnodoInviaCarrelloRPTRisposta']['url'];
//$redirect = $responseArray['soapenvBody']['wsnodoInviaRPTRisposta']['redirect'];
//$dummy="https://www.google.com";

//echo htmlspecialchars($RPT);

//echo $responseArray['soapBody']['ns4nodoInviaCarrelloRPTRisposta']['url'];

echo $wisp;

if ( $esito === 'OK' ) {
   // $this->flash->success('yes!, everything went very smoothly');
   $log = fopen("../logs/nodoInviaCarrelloRPT.log", "a") or die("Unable to open file!");
   fwrite($log,"\n\n\n=========REQUEST NODO INVIA CARRELLO RPT ===============\n");
   fwrite($log,$REQUEST);
   fwrite($log, "\n\n");
   fwrite($log, $RPT);
   fwrite($log, "\n======= FINE REQUEST NODO INVIA CARRELLO RPT ==========");
   fclose($log);
	
    usleep(2000000);
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.$wisp);
}
else {
    echo "RPT KO - Nessuna Redirect";
}


