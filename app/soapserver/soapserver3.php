<?php
ini_set("soap.wsdl_cache_enabled","0");
   


/*class NodoInviaRPTAsync extends Thread
{
	public function __construct($arg) {
        	$this->arg = $arg;
    	}

	public function run() {
                 $log = fopen("../logs/asyncInviaRPT.log", "a") or die("Unable to open file!");
                 fwrite($log,"inizio thread\n");
		 sleep(1000);
	         fwrite($log,"fine thread");	 
			 
	        fclose($log);	 
    }	
}
 */

class Response
{

	private $_identificativoUnivocoVersamento;
	private $_identificativoIntermediarioPSP;
	private $_identificativoPSP;
	private $_importoSingoloVersamento;
    private $_codiceContestoPagamento;
	private $_RPTENCODED;
	private $_importo;
	private $_identificativoCanalePSP;

private function safefilerewrite($fileName, $dataToSave)
{    if ($fp = fopen($fileName, 'w'))
    {
        $startTime = microtime(TRUE);
        do
        {            $canWrite = flock($fp, LOCK_EX);
           // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
           if(!$canWrite) usleep(round(rand(0, 100)*1000));
        } while ((!$canWrite)and((microtime(TRUE)-$startTime) < 5));

        //file was locked so now we can store information
        if ($canWrite)
        {            fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }

}

private function write_php_ini($array, $file)
{
    $res = array();
    foreach($array as $key => $val)
    {
        if(is_array($val))
        {
            $res[] = "[$key]";
            foreach($val as $skey => $sval) $res[] = "$skey=".(is_numeric($sval) ? $sval : '"'.$sval.'"');
        }
        else $res[] = "$key=".(is_numeric($val) ? $val : '"'.$val.'"');
    }
    $this->safefilerewrite($file, implode("\n", $res));
}
	


	function intestazionePPT($header) 
{
	$this->_identificativoUnivocoVersamento= $header->identificativoUnivocoVersamento;
	$this->_codiceContestoPagamento= $header->codiceContestoPagamento;
	
	
} 



function paaAttivaRPT($params)
     {  $log = fopen("../logs/paaAttivaRPT.log", "a") or die("Unable to open file!");
            fwrite($log,"\n");
            fwrite($log,"############## paaAttivaRPT ###############\n");


        $idPsp = $params->identificativoPSP;
        $string = file_get_contents('../data/fakeAvviso.json');
        $fakeAvviso = json_decode($string,true);
       
        $this->_identificativoPSP = $params->identificativoPSP;
	$this->_importo=number_format((float)$fakeAvviso['importo'],2,'.','');
       $this->_identificativoCanalePSP = $params->identificativoCanalePSP;
       $this->_identificativoIntermediarioPSP = $params->identificativoIntermediarioPSP;

	    fwrite($log,"identificativoPSP:".$idPsp."\n");
	    fwrite($log,"IUV: ".$this->_identificativoUnivocoVersamento."\n");
	    fwrite($log,"CCP: ".$this->_codiceContestoPagamento."\n");
	     fwrite($log,"IdentificativoCanalePSP: ".$this->_identificativoCanalePSP."\n");
fwrite($log,"IdentificativoIntermediarioPSP: ".$this->_identificativoIntermediarioPSP."\n");

fwrite($log,"importo: ".$this->_importo."\n");
fwrite($log, "###########################################\n\n");

               //$identificativoUnivocoVersamento = $params->identificativoUnivocoVersamento;


	    
	    $oResponse = new StdClass();
	    $oResponse->paaAttivaRPTRisposta->esito = 'OK';
	    $oDatiPagamentoPA=new stdClass();

         $oResponse->paaAttivaRPTRisposta->datiPagamentoPA->importoSingoloVersamento=$this->_importo;;
#         $oResponse->datiPagamentoPA->enteBeneficiario="77777777777";
	    
	    $oResponse->paaAttivaRPTRisposta->datiPagamentoPA->ibanAccredito="IT30N0103076271000001823603";
 
	    $oResponse->paaAttivaRPTRisposta->datiPagamentoPA->causaleVersamento="Pagamento dimostrativo PA AgID 2";



	 //CREO la RPT da inviare successivamente
	 //
	 //
    $RPT=simplexml_load_file("../data/defaultRPT.xml") or die("Error: Cannot create object");
    
	 $RPT->identificativoMessaggioRichiesta="AGID".rand(10,100)."IDM";
	 $RPT->dataOraMessaggioRichiesta=date('c');
        
    $RPT->datiVersamento->importoTotaleDaVersare=$this->_importo; 
    $RPT->datiVersamento->dataEsecuzionePagamento=date('Y-m-d');
    $RPT->datiVersamento->identificativoUnivocoVersamento=$this->_identificativoUnivocoVersamento;
    $RPT->datiVersamento->datiSingoloVersamento->importoSingoloVersamento=$this->_importo;
     $RPT->datiVersamento->datiSingoloVersamento->causaleVersamento="RFB/".$this->_identificativoUnivocoVersamento."/".$this->_importo."/TXT/pagamento di test"; 
     $RPT->datiVersamento->codiceContestoPagamento=$this->_codiceContestoPagamento;
    $this->_RPTENCODED= base64_encode($RPT->asXML());

   #a partire dal file di properties di dafault creo il file properties da utilizzare per l'invioa della RPT
    $sourceFile=parse_ini_file('../data/nodosim.properties');
    $sourceFile["CCP"]=$this->_codiceContestoPagamento;
	$sourceFile["IUV"]=$this->_identificativoUnivocoVersamento;
	$sourceFile["IDENTIFICATIVOPSP"]=$this->_identificativoPSP;
	$sourceFile["IDENTIFICATIVOINTERMEDIARIOPSP"]=$this->_identificativoIntermediarioPSP;
	$sourceFile["RPTENCODED"]=$this->_RPTENCODED;
	$sourceFile["IDENTIFICATIVOCANALE"]=$this->_identificativoCanalePSP;
	$sourceFile["RPT"]=$RPT->asXML(); 
		
    	
	$iuvPath='../data/'.$this->_identificativoUnivocoVersamento;  
	if(!file_exists($iuvPath)) mkdir($iuvPath);
	$this->write_php_ini($sourceFile,$iuvPath.'/'.'nodosim.properties');
	
	fwrite($log,"start exec at ".date('c'));
#	$cmd = "../script/nodoInviaRPT.sh ../data/".$this->_identificativoUnivocoVersamento."/nodosim.properties ";
	$cmd = "../script/nodoInviaRPT.sh";
	$realCmd = realpath($cmd);
	$properties = realpath("../data/".$this->_identificativoUnivocoVersamento."/nodosim.properties");

        $soapMessage = "../data/".$this->_identificativoUnivocoVersamento."/nodoInviaRPTRequest.xml";

if(!is_file($soapMessage)){
    //Save our content to the file.
    file_put_contents($soapMessage, "");
}	

$soapMessage = "../data/".$this->_identificativoUnivocoVersamento."/nodoInviaRPTRequest.xml";
$realSoapMessage=realpath($soapMessage);

	$realCmd = $realCmd." ".$properties." ".$realSoapMessage." >/dev/null 2>/dev/null &";
        	
fwrite($log,"exec: ".$realCmd."\n");
fwrite($log,"RPT : ".$RPT->asXML()."\n");

	shell_exec($realCmd);
#	fwrite($log, exec($cmd));
	#exec($cmd);
	
	
   fwrite($log,"returned exec at ".date('c'));
        $oEncoded = new SoapVar(
            $oResponse,
            SOAP_ENC_OBJECT,
            null,
            null,
            'response',
            'urn:query:type:v2.0'
        );



     fclose($log);

        return $oEncoded;
        

    }

	

    function paaVerificaRPT($params)
    {
	    $string = file_get_contents('../data/fakeAvviso.json');
	    $fakeAvviso = json_decode($string,true);
            $this->_importo=number_format((float)$fakeAvviso['importo'],2,'.','');
	    $idPsp = $params->identificativoPSP;
	    $log = fopen("../logs/paaVerificaRPT.log", "a") or die("Unable to open file!");
	    fwrite($log,"\n");
	    fwrite($log,"############## paaVerificaRPT ###############\n");
		fwrite($log,"Ricevuto il: ".date('c'));
	    fwrite($log,"identificativoPSP:".$idPsp."\n");
        fwrite($log, "---------------------------------------------\n");
	    
	
	$oResponse = new StdClass();
	$oResponse->paaVerificaRPTRisposta->esito = 'OK';
	
	$oResponse->paaVerificaRPTRisposta->datiPagamentoPA->importoSingoloVersamento=$this->_importo;
#    $oResponse->datiPagamentoPA->enteBeneficiario="77777777777";
	 $oResponse->paaVerificaRPTRisposta->datiPagamentoPA->ibanAccredito="IT30N0103076271000001823603";

	$oResponse->paaVerificaRPTRisposta->datiPagamentoPA->causaleVersamento="Pagamento dimostrativo PA AgID 2";
       # fwrite($log,"Response:".$oResponse);
        fwrite($log, "#############################################\n\n");
	    
    fclose($log);
    

        $oEncoded = new SoapVar(
            $oResponse,
            SOAP_ENC_OBJECT,
            null,
            null,
            'response',
            'urn:query:type:v2.0'
        );

	return $oEncoded;




    }
}

$oServer = new SoapServer(
    '../wsdl/PaPerNodoPagamentoPsp_new.wsdl',
    [
        'encoding' => 'UTF-8',
        'send_errors' => true,
        'soap_version' => SOAP_1_2,
    ]
);





$oResponse = new Response();
$oServer->setObject($oResponse);
$oServer->handle();


?>
