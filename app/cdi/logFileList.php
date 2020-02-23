<?php
    require 'libs/Smarty.class.php';

    $smarty = new Smarty;

    $smarty->assign("page_title", "Mock server per pagoPA");

    //directory to look in
    $directory = 'uploads/logs';

    //read all files from directory
    $files = scandir($directory, 1);

    //set ignore items
    $ignore = array(".", "..");

    //loop through the items stored in $files
    $list="";
    foreach ($files as $doc) {

    	//if item is not in the ignore array carry create an a link.
    	if (!in_array($doc, $ignore)) {
    		$list .= "<a href='$directory/$doc'>$doc</a><br/>";
    	}
    }

    $smarty->assign("logList", $list);
    $smarty->display('views/logFileList_0.tpl');
?>
