<?php
/* Smarty version 3.1.33, created on 2019-06-17 14:04:09
  from '/var/www/html/moc/cdi/views/nodoInviaCarrelloRPT_0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0781b939b683_77389585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e59dc95d7e70e7e08b1c68c7fe3d935f1a618f8c' => 
    array (
      0 => '/var/www/html/moc/cdi/views/nodoInviaCarrelloRPT_0.tpl',
      1 => 1560697825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/masterPageHeader.tpl' => 1,
    'file:views/masterPageFooter.tpl' => 1,
    'file:views/masterPageScript.tpl' => 1,
  ),
),false)) {
function content_5d0781b939b683_77389585 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Content
================================================== -->

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-md-9">

            <h1 class="page-header mb-4">
                Primitiva nodoInviaCarrelloRPT
            </h1>

            <div>
                <form method="post" action="nodoInviaCarrelloRPT.php" id="formInviaCarrelloRPT" autocomplete="off">
                    <input type="hidden" name="page" value="1"/>

                    <div class="p-3 mb-2 bg-secondary text-white">Inserire i parametri della richiesta <i>nodoInviaCarrelloRPT</i>
                    </div>
                    <legend class="text-primary">SOAP Header</legend>
                    <br/>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="identificativoIntermediarioPA" name="identificativoIntermediarioPA"
                                   placeholder="identificativoIntermediarioPA" value="97735020584">
                            <label for="identificativoIntermediarioPA">identificativoIntermediarioPA</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="identificativoStazioneIntermediarioPA"name="identificativoStazioneIntermediarioPA"
                                   placeholder="identificativoStazioneIntermediarioPA" value="97735020584_01">
                            <label for="identificativoStazioneIntermediarioPA">identificativoStazioneIntermediarioPA</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="identificativoCarrello"name="identificativoCarrello"
                                   placeholder="identificativoCarrello" value="<?php echo $_smarty_tpl->tpl_vars['IDCarrello']->value;?>
">
                            <label for="identificativoCarrello">identificativoCarrello</label>
                        </div>
                     </div>
                     <div class="form-row">

                         <!-- Script to insert div elements -->
                         <?php echo '<script'; ?>
 src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"><?php echo '</script'; ?>
>
                         <?php echo '<script'; ?>
 type="text/javascript">
                             $(document).ready(function(){
                                 /* onLoad event */

                                 /* RPT */
                                 var j;
                                 for (j=3; j<=6; j++) {
                                     $("#tab" + j + "-tab").hide();
                                 }

                                 /* onChange RPT */
                                 $("#dropdownNumRPT").change(function(){

                                     var numRPT=$("#dropdownNumRPT").val();
                                     var countShowRPT, countHideRPT, index;

                                     for (countShowRPT=1; countShowRPT<=numRPT; countShowRPT++) {
                                         index=countShowRPT+1; //il primo tab è il payload
                                         $("#tab" + index + "-tab").show();
                                     }
                                     for (countHideRPT=countShowRPT; countHideRPT<=5; countHideRPT++) {
                                         index=countHideRPT+1;
                                         $("#tab" + index + "-tab").hide();
                                     }
                                 });

                                 /* Versamenti */
                                 var h, k;
                                 for (h=2; h<=5; h++) {
                                    for (k=1; k<=5; k++) {
                                        $("#bloccoVersamento" + h + "_" + k).hide();
                                    }  
                                }


                                 /* onChange Versamenti */
                                 $("#dropdownNumVersamenti1").change(function(){

                                     var numVersamenti=$("#dropdownNumVersamenti1").val();
                                     var countShow, countHide;

                                     for (countShow=1; countShow<=numVersamenti; countShow++) {
                                         $("#bloccoVersamento" + countShow + "_1").show();
                                     }
                                     for (countHide=countShow; countHide<=5; countHide++) {
                                         $("#bloccoVersamento" + countHide + "_1").hide();
                                     }
                                 });
                                 $("#dropdownNumVersamenti2").change(function(){

                                     var numVersamenti=$("#dropdownNumVersamenti2").val();
                                     var countShow, countHide;

                                     for (countShow=1; countShow<=numVersamenti; countShow++) {
                                         $("#bloccoVersamento" + countShow + "_2").show();
                                     }
                                     for (countHide=countShow; countHide<=5; countHide++) {
                                         $("#bloccoVersamento" + countHide + "_2").hide();
                                     }
                                 });
                                 $("#dropdownNumVersamenti3").change(function(){

                                     var numVersamenti=$("#dropdownNumVersamenti3").val();
                                     var countShow, countHide;

                                     for (countShow=1; countShow<=numVersamenti; countShow++) {
                                         $("#bloccoVersamento" + countShow + "_3").show();
                                     }
                                     for (countHide=countShow; countHide<=5; countHide++) {
                                         $("#bloccoVersamento" + countHide + "_3").hide();
                                     }
                                 });
                                 $("#dropdownNumVersamenti4").change(function(){

                                     var numVersamenti=$("#dropdownNumVersamenti4").val();
                                     var countShow, countHide;

                                     for (countShow=1; countShow<=numVersamenti; countShow++) {
                                         $("#bloccoVersamento" + countShow + "_4").show();
                                     }
                                     for (countHide=countShow; countHide<=5; countHide++) {
                                         $("#bloccoVersamento" + countHide + "_4").hide();
                                     }
                                 });
                                 $("#dropdownNumVersamenti5").change(function(){

                                     var numVersamenti=$("#dropdownNumVersamenti5").val();
                                     var countShow, countHide;

                                     for (countShow=1; countShow<=numVersamenti; countShow++) {
                                         $("#bloccoVersamento" + countShow + "_5").show();
                                     }
                                     for (countHide=countShow; countHide<=5; countHide++) {
                                         $("#bloccoVersamento" + countHide + "_5").hide();
                                     }
                                 });
                             });
                         <?php echo '</script'; ?>
>


                        <!--start numero RPT-->
                        <div class="form-group col-md-12">
                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <h5 class="card-title">Numero di RPT del carrello</h5><br/>
                                        <div class="form-group col-md-12">
                                            <div class="bootstrap-select-wrapper">
                                                <label>Specificare il numero di RPT da inserire nel carrello</label>
                                                <select title="Scegli una opzione" id="dropdownNumRPT" name="dropdownNumRPT">
                                                    <option value="" title="Scegli una opzione"
                                                            data-content="Annulla <span class='reset-label'></span>"></option>
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end numero RPT-->
                     </div>




                    <legend class="text-primary">SOAP Body</legend>
                    <br/>
                    <ul class="nav nav-tabs" id="tabSoapBody" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1"
                                                role="tab" aria-controls="tab1" aria-selected="true">Payload</a></li>

                        <!-- lista tab RPT -->
                        <?php
$_smarty_tpl->tpl_vars['iterRPT'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['iterRPT']->step = 1;$_smarty_tpl->tpl_vars['iterRPT']->total = (int) ceil(($_smarty_tpl->tpl_vars['iterRPT']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['iterRPT']->step));
if ($_smarty_tpl->tpl_vars['iterRPT']->total > 0) {
for ($_smarty_tpl->tpl_vars['iterRPT']->value = 1, $_smarty_tpl->tpl_vars['iterRPT']->iteration = 1;$_smarty_tpl->tpl_vars['iterRPT']->iteration <= $_smarty_tpl->tpl_vars['iterRPT']->total;$_smarty_tpl->tpl_vars['iterRPT']->value += $_smarty_tpl->tpl_vars['iterRPT']->step, $_smarty_tpl->tpl_vars['iterRPT']->iteration++) {
$_smarty_tpl->tpl_vars['iterRPT']->first = $_smarty_tpl->tpl_vars['iterRPT']->iteration === 1;$_smarty_tpl->tpl_vars['iterRPT']->last = $_smarty_tpl->tpl_vars['iterRPT']->iteration === $_smarty_tpl->tpl_vars['iterRPT']->total;?>
                            <li class="nav-item"><a class="nav-link" id="tab<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value+1;?>
-tab" data-toggle="tab" href="#tab<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value+1;?>
" role="tab" aria-controls="tab<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value+1;?>
" aria-selected="false">RPT <?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</a></li>
                        <?php }
}
?>
                        <!-- lista tab RPT -->
                    </ul>
                    <div class="tab-content" id="tabSoapBodyContent">
                        <div class="tab-pane p-4 fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="password" name="password"
                                                       placeholder="password" value="TestECTE01">
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="identificativoPSP" name="identificativoPSP"
                                                       placeholder="identificativoPSP" value="AGID_01">
                                                <label for="identificativoPSP">identificativoPSP</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       id="identificativoIntermediarioPSP" name="identificativoIntermediarioPSP"
                                                       placeholder="identificativoIntermediarioPSP" value="97735020584">
                                                <label for="identificativoIntermediarioPSP">identificativoIntermediarioPSP</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="identificativoCanale" name="identificativoCanale"
                                                       placeholder="identificativoCanale" value="97735020584_02">
                                                <label for="identificativoCanale">identificativoCanale</label>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div class="toggles">
                                                    <label for="toggleXSD">
                                                        Attiva la verifica XSD
                                                        <input type="checkbox" id="toggleXSD" name="toggleXSD" checked>
                                                        <span class="lever"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- lista RPT -->
                        <?php
$_smarty_tpl->tpl_vars['iterRPT'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['iterRPT']->step = 1;$_smarty_tpl->tpl_vars['iterRPT']->total = (int) ceil(($_smarty_tpl->tpl_vars['iterRPT']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['iterRPT']->step));
if ($_smarty_tpl->tpl_vars['iterRPT']->total > 0) {
for ($_smarty_tpl->tpl_vars['iterRPT']->value = 1, $_smarty_tpl->tpl_vars['iterRPT']->iteration = 1;$_smarty_tpl->tpl_vars['iterRPT']->iteration <= $_smarty_tpl->tpl_vars['iterRPT']->total;$_smarty_tpl->tpl_vars['iterRPT']->value += $_smarty_tpl->tpl_vars['iterRPT']->step, $_smarty_tpl->tpl_vars['iterRPT']->iteration++) {
$_smarty_tpl->tpl_vars['iterRPT']->first = $_smarty_tpl->tpl_vars['iterRPT']->iteration === 1;$_smarty_tpl->tpl_vars['iterRPT']->last = $_smarty_tpl->tpl_vars['iterRPT']->iteration === $_smarty_tpl->tpl_vars['iterRPT']->total;?>
                            <div class="tab-pane p-4 fade" id="tab<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value+1;?>
" role="tabpanel" aria-labelledby="tab<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value+1;?>
-tab">
                                <!--  RPT TAB -->
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Informazioni lista RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</h5><br/>
                                            <!--  Tab Info -->
                                            <div class="form-row">
                                                <!-- Lista RPT -->
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="identificativoDominio<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="identificativoDominio<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="identificativoDominio<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="77777777777">
                                                    <label for="identificativoDominio<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">identificativoDominio</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="identificativoUnivocoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="identificativoUnivocoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="identificativoUnivocoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['IUV_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
 ">
                                                    <label for="identificativoUnivocoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">identificativoUnivocoVersamento</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="codiceContestoPagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="codiceContestoPagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="codiceContestoPagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['CCP_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                    <label for="codiceContestoPagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">codiceContestoPagamento</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="tipoFirma<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="tipoFirma<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="tipoFirma<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="0">
                                                    <label for="tipoFirma<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">tipoFirma</label>
                                                </div>
                                                <!-- Lista RPT -->
                                            </div>
                                            <!--  End Tab Info -->
                                        </div>
                                    </div>
                                </div>                                
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Informazioni generali RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</h5><br/>
                                            <!--  Tab 1 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="versioneOggetto<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="versioneOggetto<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="versioneOggetto<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="6.2.0">
                                                    <label for="versioneOggetto<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">versioneOggetto</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="identificativoDominioRPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="identificativoDominioRPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="identificativoDominioRPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="77777777777">
                                                    <label for="identificativoDominioRPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">identificativoDominio (RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
)</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="identificativoMessaggioRichiesta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="identificativoMessaggioRichiesta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="identificativoMessaggioRichiesta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['IDM']->value;?>
">
                                                    <label for="identificativoMessaggioRichiesta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">identificativoMessaggioRichiesta</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="dataOraMessaggioRichiesta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="dataOraMessaggioRichiesta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="dataOraMessaggioRichiesta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['DATARICHIESTA']->value;?>
">
                                                    <label for="dataOraMessaggioRichiesta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">dataOraMessaggioRichiesta</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="autenticazioneSoggetto<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="autenticazioneSoggetto<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="autenticazioneSoggetto<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="N/A">
                                                    <label for="autenticazioneSoggetto<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">autenticazioneSoggetto</label>
                                                </div>
                                            </div>
                                            <!--  End Tab 1 -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Dati Soggetto Versante RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</h5><br/>
                                            <!--  Tab 2 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="tipoIdentificativoUnivocoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="tipoIdentificativoUnivocoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="tipoIdentificativoUnivocoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="F">
                                                    <label for="tipoIdentificativoUnivocoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">tipoIdentificativoUnivocoVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="codiceIdentificativoUnivocoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="codiceIdentificativoUnivocoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="codiceIdentificativoUnivocoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           value="KSMKSH80A01H501D">
                                                    <label for="codiceIdentificativoUnivocoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">codiceIdentificativoUnivocoVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="anagraficaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="anagraficaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="anagraficaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="Kenshiro Kasumi">
                                                    <label for="anagraficaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">anagraficaVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="indirizzoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"  name="indirizzoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="indirizzoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="Divina Scuola di Hokuto">
                                                    <label for="indirizzoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">indirizzoVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="civicoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="civicoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="civicoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="100">
                                                    <label for="civicoVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">civicoVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="capVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="capVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="capVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="00100">
                                                    <label for="capVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">capVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="localitaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="localitaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="localitaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="Croce del Sud">
                                                    <label for="localitaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">localitaVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="provinciaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="provinciaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="provinciaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="RM">
                                                    <label for="provinciaVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">provinciaVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nazioneVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="nazioneVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="nazioneVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="IT">
                                                    <label for="nazioneVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">nazioneVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="e-mailVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="e-mailVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="e-mailVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           value="kenshiro.kasumi@divinascuolahokuto.it">
                                                    <label for="e-mailVersante<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">e-mailVersante</label>
                                                </div>
                                            </div>
                                            <!--  End Tab 2 -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Dati Soggetto Pagatore RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</h5><br/>
                                            <!--  Tab 3 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="tipoIdentificativoUnivocoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="tipoIdentificativoUnivocoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="tipoIdentificativoUnivocoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="F">
                                                    <label for="tipoIdentificativoUnivocoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">tipoIdentificativoUnivocoPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="codiceIdentificativoUnivocoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="codiceIdentificativoUnivocoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="codiceIdentificativoUnivocoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           value="KSMKSH80A01H501D">
                                                    <label for="codiceIdentificativoUnivocoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">codiceIdentificativoUnivocoPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="anagraficaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="anagraficaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="anagraficaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="Kenshiro Kasumi">
                                                    <label for="anagraficaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">anagraficaPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="indirizzoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="indirizzoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="indirizzoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="Divina Scuola di Hokuto">
                                                    <label for="indirizzoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">indirizzoPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="civicoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="civicoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="civicoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="100">
                                                    <label for="civicoPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">civicoPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="capPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="capPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="capPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="00100">
                                                    <label for="capPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">capPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="localitaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="localitaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="localitaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="Croce del Sud">
                                                    <label for="localitaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">localitaPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="provinciaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="provinciaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="provinciaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="RM">
                                                    <label for="provinciaPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">provinciaPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nazionePagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="nazionePagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="nazionePagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="IT">
                                                    <label for="nazionePagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">nazionePagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="e-mailPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="e-mailPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="e-mailPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           value="kenshiro.kasumi@divinascuolahokuto.it">
                                                    <label for="e-mailPagatore<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">e-mailPagatore</label>
                                                </div>
                                            </div>
                                            <!--  End Tab 3 -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Dati Ente Beneficiario RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</h5><br/>
                                            <!--  Tab 4 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="tipoIdentificativoUnivocoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="tipoIdentificativoUnivocoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="tipoIdentificativoUnivocoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="G">
                                                    <label for="tipoIdentificativoUnivocoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">tipoIdentificativoUnivocoBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="codiceIdentificativoUnivocoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="codiceIdentificativoUnivocoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="codiceIdentificativoUnivocoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="77777777777">
                                                    <label for="codiceIdentificativoUnivocoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">codiceIdentificativoUnivocoBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="denominazioneBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="denominazioneBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="denominazioneBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           value="Ente Intermediato di Test da AgID TEST">
                                                    <label for="denominazioneBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">denominazioneBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="indirizzoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="indirizzoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="indirizzoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="Viale Liszt">
                                                    <label for="indirizzoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">indirizzoBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="civicoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="civicoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="civicoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="21">
                                                    <label for="civicoBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">civicoBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="capBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="capBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="capBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="00100">
                                                    <label for="capBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">capBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="localitaBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="localitaBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="localitaBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="Roma">
                                                    <label for="localitaBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">localitaBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="provinciaBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="provinciaBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="provinciaBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="RM">
                                                    <label for="provinciaBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">provinciaBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nazioneBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="nazioneBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                           placeholder="nazioneBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="IT">
                                                    <label for="nazioneBeneficiario<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">nazioneBeneficiario</label>
                                                </div>
                                            </div>
                                            <!--  End Tab 4 -->
                                        </div>
                                    </div>
                                </div>


                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Dati Versamento RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</h5><br/>
                                            <!--  Tab 4 -->
                                            <div class="form-row" id="carrello">
                                                <!--start dati versamento-->
                                                <div class="form-group col-md-12">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Informazioni sul pagamento</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="dataEsecuzionePagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="dataEsecuzionePagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="dataEsecuzionePagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['DATAPAGAMENTO']->value;?>
">
                                                                    <label for="dataEsecuzionePagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">dataEsecuzionePagamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="importoTotaleDaVersare<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">importoTotaleDaVersare</label>
                                                                    <input type="text" class="form-control" id="importoTotaleDaVersare<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="importoTotaleDaVersare<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" placeholder="Il totale viene calcolato automaticamente se il campo viene lasciato vuoto" value="">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="tipoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="tipoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="tipoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="BBT">
                                                                    <label for="tipoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">tipoVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control"
                                                                           id="identificativoUnivocoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="identificativoUnivocoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="identificativoUnivocoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['IUV_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                    <label for="identificativoUnivocoVersamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">identificativoUnivocoVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="codiceContestoPagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="codiceContestoPagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="codiceContestoPagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['CCP_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                    <label for="codiceContestoPagamento<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">codiceContestoPagamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="ibanAddebito<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAddebito<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAddebito<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="IT06T1063911700000000010535">
                                                                    <label for="ibanAddebito<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAddebito</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="firmaRicevuta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="firmaRicevuta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="firmaRicevuta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="0">
                                                                    <label for="firmaRicevuta<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">firmaRicevuta</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end dati versamento-->

                                                <!--start numero versamenti-->
                                                <div class="form-group col-md-12">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Numero di versamenti RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <div class="bootstrap-select-wrapper">
                                                                        <label>Specificare il numero di versamenti da inviare</label>
                                                                        <select title="Scegli una opzione" id="dropdownNumVersamenti<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="dropdownNumVersamenti<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">
                                                                            <option value="" title="Scegli una opzione"
                                                                                    data-content="Annulla <span class='reset-label'></span>"></option>
                                                                            <option value="1" selected>1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end numero versamenti-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 1 (RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
)</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <label for="importoSingoloVersamento1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">importoSingoloVersamento</label>
                                                                    <input type="text"  class="form-control" id="importoSingoloVersamento1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="importoSingoloVersamento1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['IMPORTOPGAMENTO1_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="ibanAccredito1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAccredito1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                    <label for="ibanAccredito1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAccredito</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control"
                                                                           id="ibanAppoggio1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAppoggio1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                    <label for="ibanAppoggio1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAppoggio</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="credenzialiPagatore1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="credenzialiPagatore1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="credenzialiPagatore" value="n/a">
                                                                    <label for="credenzialiPagatore1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">credenzialiPagatore</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="causaleVersamento1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="causaleVersamento1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="causaleVersamento" value="<?php echo $_smarty_tpl->tpl_vars['CAUSALE1_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                    <label for="causaleVersamento1">causaleVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="datiSpecificiRiscossione1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="datiSpecificiRiscossione1_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                    <label for="datiSpecificiRiscossione1">datiSpecificiRiscossione</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 2 (RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
)</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <label for="importoSingoloVersamento2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">importoSingoloVersamento</label>
                                                                    <input type="text" class="form-control" id="importoSingoloVersamento2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="importoSingoloVersamento2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['IMPORTOPGAMENTO2_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="ibanAccredito2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAccredito2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                    <label for="ibanAccredito2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAccredito</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control"
                                                                           id="ibanAppoggio2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAppoggio2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                    <label for="ibanAppoggio2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAppoggio</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="credenzialiPagatore2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="credenzialiPagatore2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="credenzialiPagatore" value="n/a">
                                                                    <label for="credenzialiPagatore2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">credenzialiPagatore</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="causaleVersamento2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="causaleVersamento2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="causaleVersamento" value="<?php echo $_smarty_tpl->tpl_vars['CAUSALE2_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                    <label for="causaleVersamento2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">causaleVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="datiSpecificiRiscossione2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="datiSpecificiRiscossione2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                    <label for="datiSpecificiRiscossione2_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">datiSpecificiRiscossione</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 3 (RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
)</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <label for="importoSingoloVersamento3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">importoSingoloVersamento</label>
                                                                    <input type="text" class="form-control" id="importoSingoloVersamento3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="importoSingoloVersamento3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['IMPORTOPGAMENTO3_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="ibanAccredito3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAccredito3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                    <label for="ibanAccredito3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAccredito</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control"
                                                                           id="ibanAppoggio3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAppoggio3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                    <label for="ibanAppoggio3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAppoggio</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="credenzialiPagatore3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="credenzialiPagatore3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="credenzialiPagatore" value="n/a">
                                                                    <label for="credenzialiPagatore3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">credenzialiPagatore</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="causaleVersamento3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="causaleVersamento3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="causaleVersamento" value="<?php echo $_smarty_tpl->tpl_vars['CAUSALE3_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                    <label for="causaleVersamento3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">causaleVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="datiSpecificiRiscossione3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="datiSpecificiRiscossione3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                    <label for="datiSpecificiRiscossione3_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">datiSpecificiRiscossione</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 4 (RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
)</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <label for="importoSingoloVersamento4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">importoSingoloVersamento</label>
                                                                    <input type="text" class="form-control" id="importoSingoloVersamento4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="importoSingoloVersamento4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['IMPORTOPGAMENTO4_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="ibanAccredito4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAccredito4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                    <label for="ibanAccredito4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAccredito</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control"
                                                                           id="ibanAppoggio4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAppoggio4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                    <label for="ibanAppoggio4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAppoggio</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="credenzialiPagatore4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="credenzialiPagatore4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="credenzialiPagatore" value="n/a">
                                                                    <label for="credenzialiPagatore4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">credenzialiPagatore</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="causaleVersamento4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="causaleVersamento4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="causaleVersamento" value="<?php echo $_smarty_tpl->tpl_vars['CAUSALE4_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                    <label for="causaleVersamento4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">causaleVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="datiSpecificiRiscossione4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="datiSpecificiRiscossione4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                    <label for="datiSpecificiRiscossione4_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">datiSpecificiRiscossione</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 5 (RPT<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
)</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <label for="importoSingoloVersamento5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">importoSingoloVersamento</label>
                                                                    <input type="text" class="form-control" id="importoSingoloVersamento5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="importoSingoloVersamento5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['IMPORTOPGAMENTO5_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="ibanAccredito5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAccredito5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                    <label for="ibanAccredito5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAccredito</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control"
                                                                           id="ibanAppoggio5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="ibanAppoggio5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                    <label for="ibanAppoggio5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">ibanAppoggio</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="credenzialiPagatore5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="credenzialiPagatore5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="credenzialiPagatore" value="n/a">
                                                                    <label for="credenzialiPagatore5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">credenzialiPagatore</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="causaleVersamento5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="causaleVersamento5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="causaleVersamento" value="<?php echo $_smarty_tpl->tpl_vars['CAUSALE5_'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
">
                                                                    <label for="causaleVersamento5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">causaleVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="datiSpecificiRiscossione5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
" name="datiSpecificiRiscossione5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
"
                                                                           placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                    <label for="datiSpecificiRiscossione5_<?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
">datiSpecificiRiscossione</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                            </div>
                                            <!--  End Tab 4 -->
                                        </div>
                                    </div>
                                </div>
                                <!--  End RPT TAB -->
                            </div>
                        <?php }
}
?>
                        <!-- lista RPT -->

                        <div class="form-row">
                            <div class="form-group col text-center">
                                <button type="button" class="btn btn-outline-primary">Annulla</button>
                                <button type="submit" class="btn btn-primary">Invia la richiesta</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
