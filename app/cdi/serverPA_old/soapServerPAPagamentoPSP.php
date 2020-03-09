<?php
    #Server PaPerNodoPagamentoPSP

    require_once "PAServerPagamentoPSP.class.php";
    require_once "../logWriter.class.php";
    ini_set("soap.wsdl_cache_enabled", "0");

    try {
        $wsdlPath="../uploads/wsdl/ec/PaPerNodoPagamentoPsp.wsdl";
        $server = new SoapServer($wsdlPath);
        $server->setClass("PAServerPagamentoPSP");
        $server->handle();

    } catch (SoapFault $exc) {
        //Log error
        $time = date('d-M-Y');
        $logPath='../uploads/logs/log-PAServerPagamentoPSP-' . $time . '.txt';
        $log = new logWriter($logPath);
        $log->error('=============== SERVER PA PAGAMENTO PSP SOAP FAULT ===============');
        $log->error('Fault Code: PAA_SINTASSI_EXTRAXSD' );
        $log->error($exc->getTraceAsString());
    }

?>