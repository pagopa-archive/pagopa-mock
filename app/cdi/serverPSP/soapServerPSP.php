<?php
    #Server PaPerNodo

    require_once "PSPServer.class.php";
    require_once "../logWriter.class.php";
    ini_set("soap.wsdl_cache_enabled", "0");

    try {
        $wsdlPath="../uploads/wsdl/psp/PspPerNodo.wsdl";
        $server = new SoapServer($wsdlPath);
        $server->setClass("PSPServer");
        $server->handle();

    } catch (SoapFault $exc) {
        //Log error
        $time = date('d-M-Y');
        $logPath='../uploads/logs/log-PSPserver-' . $time . '.txt';
        $log = new logWriter($logPath);
        $log->error('=============== SERVER PSP SOAP FAULT ===============');
        $log->error('Fault Code: PAA_SINTASSI_EXTRAXSD' );
        $log->error($exc->getTraceAsString());
    }

?>