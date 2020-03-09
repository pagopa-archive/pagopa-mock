<?php
    #Server PaPerNodo

    require_once "PAServer.class.php";
    require_once "../logWriter.class.php";
    ini_set("soap.wsdl_cache_enabled", "0");

    try {
        $wsdlPath="../uploads/wsdl/ec/PaPerNodo.wsdl";
        $server = new SoapServer($wsdlPath);
        $server->setClass("PAServer");
        $server->handle();

    } catch (SoapFault $exc) {
        //Log error
        $time = date('d-M-Y');
        $logPath='../uploads/logs/log-PAserver-' . $time . '.txt';
        $log = new logWriter($logPath);
        $log->error('=============== SERVER PA SOAP FAULT ===============');
        $log->error('Fault Code: PAA_SINTASSI_EXTRAXSD' );
        $log->error($exc->getTraceAsString());
    }

?>