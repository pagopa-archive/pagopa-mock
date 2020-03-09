<?php
require_once('tstMo3.class.php');

$paaVerificaRPTRequestBody= new StdClass();

$paaVerificaRPTRequestBody->codiceIdRPT= new StdClass(); 
$paaVerificaRPTRequestBody->codiceIdRPT->CodIUV="99999999999999";

$test = new tstMod3('./testCase1.json');
$res=$test->paaVerificaRPTResponse($paaVerificaRPTRequestBody);

$resRPT = $test->scheduleRPT($paaVerificaRPTRequestBody);

echo "risposta\n";
echo $resRPT;

if ( $res == false ){
  echo "Not Found";
}  
else {
  $json_output = json_encode($res);  
  echo $json_output;
}