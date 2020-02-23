<?php
/**
 * Created by PhpStorm.
 * User: Gianni
 * Date: 14/10/2018
 * Time: 19:26
 */




//echo htmlspecialchars($REQUEST);


/*function libxml_display_error($error)
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
}*/


//COMPONGO LA REQUEST
$REQUEST='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.pagamenti.telematici.gov/">
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







$URL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/RPT6T";
$prkey='/opt/moc-other/pagopatest.agid.gov.it.key';
$pubkey='/opt/moc-other/pagopatest.agid.gov.it.crt';
$headers = array(
    'Content-type: text/xml',
    'SOAPAction: nodoChiediInformativaPSP',
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

//echo $output;
//$risposta = htmlspecialchars(print_r($output, true));
//echo $risposta;
$xml = $output;
$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", '$1$2$3', $xml);
$xml = simplexml_load_string($xml);
$json = json_encode($xml);
$responseArray = json_decode($json, true); // true to have an array, false for an object
//print_r($responseArray);
$esito = $responseArray['soapenvBody']['pptnodoChiediInformativaPSPRisposta']['xmlInformativa'];
$catalogo = base64_decode($esito);
//echo $esito;
//echo htmlspecialchars($catalogo);

$file=fopen("catalogoDatiInformativi.xml", "w") or die("Unable to open file!");
fwrite($file,$catalogo);
fclose($file);

echo '<a href=catalogoDatiInformativi.xml download=catalogoDatiInformativi.xml>Scarica Catalogo</a>';


//CONVERTO IN JSON PER VISUALIZZAZIONE
$catalogoappo= preg_replace("/(<\/?)(\w+):([^>]*>)/", '$1$2$3', $catalogo);
$catalogo = simplexml_load_string($catalogo);
$catalogojson=json_encode($catalogo);
//echo $catalogojson;
$inf = fopen("informativa.json", "w") or die("Unable to open file!");
fwrite($inf,$catalogojson);
fclose($inf);



//$wisp = $responseArray['soapBody']['ns4nodoInviaCarrelloRPTRisposta']['url'];
//$redirect = $responseArray['soapenvBody']['wsnodoInviaRPTRisposta']['redirect'];
//$dummy="https://www.google.com";

//echo htmlspecialchars($RPT);

//echo $responseArray['soapBody']['ns4nodoInviaCarrelloRPTRisposta']['url'];


/*if ( $esito === 'OK' ) {
   // $this->flash->success('yes!, everything went very smoothly');
    usleep(2000000);
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.$wisp);
}
else {
    echo "RPT KO - Nessuna Redirect";
}

 */

