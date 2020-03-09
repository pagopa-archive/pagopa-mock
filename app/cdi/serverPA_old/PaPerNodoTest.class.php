<?php 
    class PaPerNodoTest {
      private $_db;

      function __construct($conf_file){

       print("Test Module Initialization .. [$conf_file]\n");
       $strJsonFileContents = file_get_contents($conf_file);
       $this->_db = json_decode($strJsonFileContents);
       
      }


/**
 * returns the RT soap response body based on the incoming request body
 */
  function paaInviaRTResponse($paaInviaRTRequestBody){
    print("Test Module Build Response .. [paaVerificaRPTResponse]\n");
     try {
          $rt_encoded = $paaInviaRTRequestBody->rt;
          $rt=json_decode(base64_decode($rt_encoded));
          $iuv=$rt->datiPagamento->identificativoUnivocoVersamento;
          $apaId = $this->_db->$iuv;

          if (is_null($apaId) ) {
            print("Test Module Build Response .. failed\n");            
            return false;
          }else {
                     
            $templateResponse = $apaId->inviaRT->paaInviaRTRisposta;
            $response= new StdClass();
            $response->paaInviaRTRisposta=$templateResponse;
           
            return  $response;
          }
        }
        catch(Exception $e){
           echo 'Caught exception: ',  $e->getMessage(), "\n";
           return false;

        }
  }
    }
?>