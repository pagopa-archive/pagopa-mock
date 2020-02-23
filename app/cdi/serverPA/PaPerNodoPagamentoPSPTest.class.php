<?php 
    class PaPerNodoPagamentoPSPTest {
      private $_db;

      function __construct($conf_file){

       print("PaPerNodoPagamentoPSPTest .. [$conf_file]\n");
       $strJsonFileContents = file_get_contents($conf_file);
       $this->_db = json_decode($strJsonFileContents);
       
      }

/**
 * returns the activation soap response body based on the incoming request body
 */

      function paaAttivaRPTResponse($paaAttivaRPTRequestBody){
         print("Test Module Build Response .. [paaAttivaRPTResponse]\n");
         try{
          $iuv=$paaAttivaRPTRequestBody->codiceIdRPT->CodIUV;
          $apaId = $this->_db->$iuv;
          
          if (is_null($apaId)){
            print("Test Module Build Response .. failed\n");            
            return false;
          }
          else{                 
            $templateResponse = $apaId->attivaRPT->paaAttivaRPTRisposta;
            $response= new StdClass();
            $response->paaAttivaRPTRisposta=$templateResponse;
           return $response;
          }

         }
         catch ( Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return false;
         }
      }

/**
 * check if upon an activation request the PA must send the RPT 
 *
 */
      function scheduleRPT($paaAttivaRPTRequestBody){
        print("Test Module Build Response .. [scheduleRPT]\n");
        $iuv=$paaAttivaRPTRequestBody->codiceIdRPT->CodIUV;
        $apaId = $this->_db->$iuv;
        return boolval( $apaId->attivaRPT->RPT);        // bool(false)
      }

/**
 * returns the verification soap response body based on the incoming request body
 */
      function paaVerificaRPTResponse($paaVerificaRPTRequestBody){
        print("Test Module Build Response .. [paaVerificaRPTResponse]\n");
        try {
          $iuv=$paaVerificaRPTRequestBody->codiceIdRPT->CodIUV;
          $apaId = $this->_db->$iuv;

          if (is_null($apaId) ) {
            print("Test Module Build Response .. failed\n");            
            return false;
          }else {
                     
            $templateResponse = $apaId->verificaRPT->paaVerificaRPTRisposta;
            $response= new StdClass();
            $response->paaVerificaRPTRisposta=$templateResponse;
           
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