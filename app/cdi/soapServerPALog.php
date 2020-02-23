<?php
    require 'libs/Smarty.class.php';

    $smarty = new Smarty;

    $smarty->assign("page_title", "Mock PAServer");
    $smarty->display('../views/soapServerPALog.tpl');

?>