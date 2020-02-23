<?php
$richiesta=htmlspecialchars($_GET["idRichiesta"]);
$wfesp='https://wfesp.test.pagopa.gov.it/redirect/wpl05';
$esitok="OK"; 
sleep(5);
header("Location: $wfesp/esito?idRichiesta=$richiesta&codiceRitorno=$esitok");

?>



