<?php
    require 'libs/Smarty.class.php';

    $smarty = new Smarty;

    $smarty->assign("page_title", "Mock server per pagoPA");
    $smarty->display('views/index.tpl');
?>