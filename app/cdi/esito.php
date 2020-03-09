<?php
    require 'libs/Smarty.class.php';

    $smarty = new Smarty;

    $smarty->assign("page_title", "Mock server per pagoPA");
	$status=$_GET["esito"];

	
	switch ($status) {
		case "OK":
			$message .= "Esito: <b>OK</b> <br />";
			$message .= "La transazione è avvenuta correttamente.";
			break;
		case "KO":
			$message .= "Esito: <b>KO</b> <br />";
			$message .= "La transazione ha avuto un esito negativo.";
			break;
		case "ERROR":
			$message .= "Esito: <b>ERROR</b> <br />";
			$message .= "La transazione ha avuto un esito negativo.";
			break;
		case "DIFFERITO":
			$message .= "Esito: <b>DIFFERITO</b> <br />";
			$message .= "La transazione è stata differita.";
			break;		
	}
    $smarty->assign("message", $message);
    $smarty->display('views/esito.tpl');
?>