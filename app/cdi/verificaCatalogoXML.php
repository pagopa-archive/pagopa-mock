<?php
    require_once "libs/Smarty.class.php";
    require_once "libs/Kendo/Autoload.php";
    require_once "DOMValidator.class.php";
    require_once "Helper.php";

    if (!isset($_GET["page"])) {
        $page = 0;
    } else {
        $page = $_GET["page"];
    }
    if (isset($_POST["page"])) {
        $page = $_POST["page"];
    }

    $smarty = new Smarty;

    session_start();

    switch ($page) {
        /* * * * * * * * * * * * * * * * *  PAGE 0  * * * * * * * * * * * * * * * * */
        case 0:
            $smarty->assign("page_title", "Mock pagoPA - Caricamento del CDI");
            $smarty->display('views/verificaCatalogoXML_0.tpl');
            $_SESSION["isFile"]=false;
            $_SESSION["ragioneSocialeCDI"]="";
            $_SESSION["logoPSP"]="";

            break;

        /* * * * * * * * * * * * * * * * *  PAGE 1  * * * * * * * * * * * * * * * * */
        case 1:

            $ds = DIRECTORY_SEPARATOR;
            $storeFolder = 'uploads';

            if (!empty($_FILES)) {

                $tempFile = $_FILES['file']['tmp_name'];
                $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
                $targetFile = $targetPath . $_FILES['file']['name'];
                move_uploaded_file($tempFile, $targetFile);

                $_SESSION["isFile"]=true;
                $_SESSION["targetFile"]=$_FILES['file']['name'];

                echo $targetFile;
            } else {
                    $smarty->assign("page_title", "Mock pagoPA - Verifica del CDI");
                    $smarty->assign("uploadResult", htmlentities("Non è stato selezionato il file da verificare. <button onclick=\"goBack()\">Torna indietro</button>"));
                    $smarty->display('views/verificaCatalogoXML_1.tpl');

                $_SESSION["isFile"]=false;
            }

            break;

        /* * * * * * * * * * * * * * * * *  PAGE 1  * * * * * * * * * * * * * * * * */
        case 2:
            if ( $_SESSION["isFile"] ) {
                $pathFileCDI = 'uploads/' . $_SESSION["targetFile"];
                $validator = new DomValidator("uploads/xsd/wisp_1_3.xsd");
                $validated = $validator->validateFeeds($pathFileCDI);
                if ($validated) { //Valido
                    $validationResult = htmlentities('<div class="callout success"> 
                        <div class="callout-title"><svg class="icon"><use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-check-circle"></use></svg>Valido</div> 
                        <p>Il Catalogo Dati Informativo è stato validato correttamente.</p> 
                        </div>');

                    //Check ragione sociale
                    if (verificaRagioneSociale($pathFileCDI)) {
                        $validationResult .= htmlentities('<div class="callout success"> 
                        <div class="callout-title"><svg class="icon"><use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-check-circle"></use></svg>Ragione Sociale</div> 
                        <p>La ragione sociale indicata nel Catalogo Dati <b>corrisponde</b> a quella presente sul NodoSPC.</p> 
                        </div>');
                    }
                    else {
                        $validationResult .= htmlentities('<div class="callout warning"> 
                        <div class="callout-title"><svg class="icon"><use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-help-circle"></use></svg>Ragione Sociale</div> 
                        <p>La ragione sociale indicata nel Catalogo Dati: <i>' . $_SESSION["ragioneSocialeCDI"] . '</i> <b>non corrisponde</b> a quella presente sul NodoSPC.</p> 
                        </div>');
                    }
                    //end ragione sociale

                    //Check logo
                    $helper = new Helper;
                    $logoFile = 'uploads/logo/' . uniqid() . '.png';
                    $helper->base64ToImage($_SESSION["logoPSP"], $logoFile);
                    $validationResult .= htmlentities('<div class="callout note"> 
                        <div class="callout-title"><svg class="icon icon-primary"><use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-info-circle"></use></svg>Logo PSP</div> 
                        <img src=' . $logoFile . ' />
                        </div>');
                    //end logo

                    //Response Valid
                    $smarty->assign("page_title", "Mock pagoPA - Verifica del CDI");
                    $smarty->assign("validationResult", $validationResult);
                    $smarty->assign("validationSummary", pspSummary($pathFileCDI));
                    $smarty->assign("serviceSummary", serviceSummary($pathFileCDI));
                    $smarty->display('views/verificaCatalogoXML_2.tpl');

                } else {
                    $validationResult = htmlentities('<div class="callout danger"> 
                    <div class="callout-title"><svg class="icon"><use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-close-circle"></use></svg>Non Valido</div> 
                    <p>Il Catalogo Dati Informativo non è sintatticamente valido.</p> 
                </div>');
                    $validationResult .= "<br/><div class=\"alert alert-danger\" role=\"alert\">";
                    $validationResult .= implode(" ", $validator->displayErrors());
                    $validationResult .= "</div><br/>";

                    //Response Invalid
                    $smarty->assign("page_title", "Mock pagoPA - Verifica del CDI");
                    $smarty->assign("validationResult", $validationResult);
                    $smarty->display('views/verificaCatalogoXML_3.tpl');
                }

            } else {
                //No file selected
                $smarty->assign("page_title", "Mock pagoPA - Verifica del CDI");
                $smarty->assign("uploadResult", htmlentities("Non è stato selezionato il file da verificare. <button onclick=\"goBack()\">Torna indietro</button>"));
                $smarty->display('views/verificaCatalogoXML_1.tpl');
            }

            break;
    }



    function verificaRagioneSociale($pathCDI){
        $pathInformativaPSP="uploads/xml/nodoChiediInformativaPSP.xml";
        $trovato=false;

        $xmlCDI=simplexml_load_file($pathCDI) or die("Errore: Impossibile verificare l'informativa del nodo: catalogo XML non caricato.");
        $ragioneSociale = (string) $xmlCDI->ragioneSociale;
        $logoPSP = (string) $xmlCDI->informativaMaster->logoPSP;
        $xmlNodoInformativaPSP=simplexml_load_file($pathInformativaPSP) or die("Errore: Impossibile verificare l'informativa del nodo: lista PSP non disponibile.");
        foreach($xmlNodoInformativaPSP->children() as $psp) {

             if ($psp->ragioneSociale == $ragioneSociale) {
                 $trovato=true;
                 break;
             }
        }

        $_SESSION["ragioneSocialeCDI"] = $ragioneSociale;
        $_SESSION["logoPSP"] = $logoPSP;
        return $trovato;
    }

    function pspSummary($pathCDI){

        $xmlCDI=simplexml_load_file($pathCDI) or die("Errore: Impossibile verificare l'informativa del nodo: catalogo XML non caricato.");

        $identificativoFlusso = (string) $xmlCDI->identificativoFlusso;
        $identificativoPSP = (string) $xmlCDI->identificativoPSP;
        $ragioneSociale = (string) $xmlCDI->ragioneSociale;
        $dataPubblicazione = (string) $xmlCDI->informativaMaster->dataPubblicazione;
        $urlInformazioniPSP = (string) $xmlCDI->informativaMaster->urlInformazioniPSP;
        $marcaBolloDigitale = (string) $xmlCDI->informativaMaster->marcaBolloDigitale;

        $elemList  = '<tr><td><b>identificativoFlusso</b></td><td>' . $identificativoFlusso . '</td></tr>';
        $elemList .= '<tr><td><b>identificativoPSP</b></td><td>' . $identificativoPSP . '</td></tr>';
        $elemList .= '<tr><td><b>ragioneSociale</b></td><td>' . $ragioneSociale . '</td></tr>';
        $elemList .= '<tr><td><b>dataPubblicazione</b></td><td>' . $dataPubblicazione . '</td></tr>';
        $elemList .= '<tr><td><b>urlInformazioniPSP</b></td><td>' . $urlInformazioniPSP . '</td></tr>';
        $elemList .= '<tr><td><b>marcaBolloDigitale</b></td><td>' . ($marcaBolloDigitale==1 ? "si" : "no") . '</td></tr>';

        return $elemList;
    }

    function serviceSummary($pathCDI){

        $xmlCDI=simplexml_load_file($pathCDI) or die("Errore: Impossibile verificare l'informativa del nodo: catalogo XML non caricato.");
        $helper = new Helper;

        $elemList  = '';
        foreach( $xmlCDI->listaInformativaDetail->informativaDetail as $servizio ) {
            $elemList .= '<tr>';
            $elemList .= '<td>' . $servizio->identificativoCanale . '</td>';
            $elemList .= '<td>' . $servizio->tipoVersamento . '</td>';
            $elemList .= '<td>' . $servizio->modelloPagamento . '</td>';
            $elemList .= '<td>' . $servizio->identificazioneServizio->nomeServizio . '</td>';
            $logoFile = 'uploads/logo/' . uniqid() . '.png';
            $helper->base64ToImage($servizio->identificazioneServizio->logoServizio, $logoFile);
            $elemList .= '<td><img class="resize" src="' . $logoFile . '" alt="logo servizio"/></td>';
            $elemList .= '</tr>';
        }

        return $elemList;
    }
?>
