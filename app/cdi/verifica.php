<?php
require_once "libs/Smarty.class.php";
require_once "Helper.php";
require_once "RPT.class.php";
require_once "RPTRequest.class.php";
require_once "logWriter.class.php";
require_once "DOMValidator.class.php";
require_once "dbms.class.php";


if (!isset($_GET["page"])) {
    $page = 0;
} else {
    $page = $_GET["page"];
}
if (isset($_POST["page"])) {
    $page = $_POST["page"];
}

$smarty = new Smarty;

session_start();

switch ($page) {
    /* * * * * * * * * * * * * * * * *  PAGE 0  * * * * * * * * * * * * * * * * */
    case 0:

        $smarty->assign("page_title", "Mock pagoPA - Verifica PSP");
        $smarty->display('views/verifica_0.tpl');

        break;

    /* * * * * * * * * * * * * * * * *  PAGE 1  * * * * * * * * * * * * * * * * */
    case 1:

        //Action
        $endpointURL = "https://gad.test.pagopa.gov.it/openspcoop2/proxy/PA/PROXYPagamentiTelematiciPspNodo";
        $privKey='/opt/moc-other/pagopatest.agid.gov.it.key';
        $pubKey='/opt/moc-other/pagopatest.agid.gov.it.crt';
        $headers = array(
            'Content-type: text/xml',
            'SOAPAction: nodoVerificaRPT',
        );
        $RTrequest = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.pagamenti.telematici.gov/">
               <soapenv:Header/>
               <soapenv:Body>
                  <ws:nodoVerificaRPT>
                     <identificativoPSP>'.$_POST['identificativoPSP'].'</identificativoPSP>
                     <identificativoIntermediarioPSP>'.$_POST['identificativoIntermediarioPSP'].'</identificativoIntermediarioPSP>
                     <identificativoCanale>'.$_POST['identificativoCanale'].'</identificativoCanale>
                     <password>'.$_POST['password'].'</password>
                     <codiceContestoPagamento>'.$_POST['codiceContestoPagamento'].'</codiceContestoPagamento>
                     <codificaInfrastrutturaPSP>'.$_POST['codificaInfrastrutturaPSP'].'</codificaInfrastrutturaPSP>
                     <codiceIdRPT>
                               <QrCode:QrCode xmlns:QrCode="http://PuntoAccessoPSP.spcoop.gov.it/QrCode" xmlns="http://PuntoAccessoPSP.spcoop.gov.it/QrCode">
                                               <CF>'.$_POST['CF'].'</CF>
                                               <CodStazPA>'.$_POST['CodStazPA'].'</CodStazPA>
                                               <AuxDigit>' .$_POST['AuxDigit'].' </AuxDigit>
                                               <CodIUV>'.$_POST['CodIUV'].'</CodIUV>
                               </QrCode:QrCode>
                     </codiceIdRPT>
                  </ws:nodoVerificaRPT>
               </soapenv:Body>
            </soapenv:Envelope>
            ';
        $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';


        $soapRequest=$request->getXMLInviaNodo($RTrequest);

        $ch = curl_init($endpointURL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_PORT , 443);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSLKEY, $privKey);
        curl_setopt($ch, CURLOPT_SSLCERT, $pubKey);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

        $RTResponseBody  = curl_exec($ch);
        curl_close($ch);


        // SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
        $ResponseBody = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $RTResponseBody);
        $responseBodyXML = simplexml_load_string($ResponseBody);
        $status=$responseBodyXML->soapenvBody->nodoVerificaRPTRisposta->esito;


        $smarty->assign("message", $status);
        $smarty->display('views/verifica_1.tpl');

        break;
}

?>
