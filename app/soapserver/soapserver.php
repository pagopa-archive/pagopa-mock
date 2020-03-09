<?php
    #Server PaPerNodo

    require_once "PAServer.class.php";
    ini_set("soap.wsdl_cache_enabled", "0");


    $opts = array('soap_version' => SOAP_1_2);
    $wsdlPath="../cdi/uploads/wsdl/ec/PaPerNodo.wsdl";

    $server = new SoapServer($wsdlPath, $opts);
    $server->setClass('PAServer');
    $server->handle();
    $postdata = file_get_contents("php://input");
?>
