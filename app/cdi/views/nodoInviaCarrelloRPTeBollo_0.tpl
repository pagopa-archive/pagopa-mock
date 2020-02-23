{include file="views/masterPageHeader.tpl"}


<!-- Content
================================================== -->

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-md-9">

            <h1 class="page-header mb-4">
                Primitiva nodoInviaCarrelloRPT
            </h1>

            <div>
                <form method="post" action="nodoInviaCarrelloRPTeBollo.php" id="formInviaCarrelloRPT" autocomplete="off">
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
                                   placeholder="identificativoCarrello" value="{$IDCarrello}">
                            <label for="identificativoCarrello">identificativoCarrello</label>
                        </div>
                     </div>
                     <div class="form-row">

                         <!-- Script to insert div elements -->
                         <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
                         <script type="text/javascript">
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

                                 /* eBollo */
                                 for (h=1; h<=5; h++) {
                                     for (k=1; k<=5; k++) {
                                         $("#cardBollo" + h + "_" + k).hide();
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
                         </script>


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
                        {for $iterRPT=1 to 5}
                            <li class="nav-item"><a class="nav-link" id="tab{$iterRPT+1}-tab" data-toggle="tab" href="#tab{$iterRPT+1}" role="tab" aria-controls="tab{$iterRPT+1}" aria-selected="false">RPT {$iterRPT}</a></li>
                        {/for}
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
                        {for $iterRPT=1 to 5}
                            <div class="tab-pane p-4 fade" id="tab{$iterRPT+1}" role="tabpanel" aria-labelledby="tab{$iterRPT+1}-tab">
                                <!--  RPT TAB -->
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Informazioni lista RPT{$iterRPT}</h5><br/>
                                            <!--  Tab Info -->
                                            <div class="form-row">
                                                <!-- Lista RPT -->
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="identificativoDominio{$iterRPT}" name="identificativoDominio{$iterRPT}"
                                                           placeholder="identificativoDominio{$iterRPT}" value="77777777777">
                                                    <label for="identificativoDominio{$iterRPT}">identificativoDominio</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="identificativoUnivocoVersamento{$iterRPT}" name="identificativoUnivocoVersamento{$iterRPT}"
                                                           placeholder="identificativoUnivocoVersamento{$iterRPT}" value="{$IUV_{$iterRPT}} ">
                                                    <label for="identificativoUnivocoVersamento{$iterRPT}">identificativoUnivocoVersamento</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="codiceContestoPagamento{$iterRPT}" name="codiceContestoPagamento{$iterRPT}"
                                                           placeholder="codiceContestoPagamento{$iterRPT}" value="{$CCP_{$iterRPT}}">
                                                    <label for="codiceContestoPagamento{$iterRPT}">codiceContestoPagamento</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="tipoFirma{$iterRPT}" name="tipoFirma{$iterRPT}"
                                                           placeholder="tipoFirma{$iterRPT}" value="0">
                                                    <label for="tipoFirma{$iterRPT}">tipoFirma</label>
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
                                            <h5 class="card-title">Informazioni generali RPT{$iterRPT}</h5><br/>
                                            <!--  Tab 1 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="versioneOggetto{$iterRPT}" name="versioneOggetto{$iterRPT}"
                                                           placeholder="versioneOggetto{$iterRPT}" value="6.2.0">
                                                    <label for="versioneOggetto{$iterRPT}">versioneOggetto</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="identificativoDominioRPT{$iterRPT}" name="identificativoDominioRPT{$iterRPT}"
                                                           placeholder="identificativoDominioRPT{$iterRPT}" value="77777777777">
                                                    <label for="identificativoDominioRPT{$iterRPT}">identificativoDominio (RPT{$iterRPT})</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="identificativoMessaggioRichiesta{$iterRPT}" name="identificativoMessaggioRichiesta{$iterRPT}"
                                                           placeholder="identificativoMessaggioRichiesta{$iterRPT}" value="{$IDM}">
                                                    <label for="identificativoMessaggioRichiesta{$iterRPT}">identificativoMessaggioRichiesta</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="dataOraMessaggioRichiesta{$iterRPT}" name="dataOraMessaggioRichiesta{$iterRPT}"
                                                           placeholder="dataOraMessaggioRichiesta{$iterRPT}" value="{$DATARICHIESTA}">
                                                    <label for="dataOraMessaggioRichiesta{$iterRPT}">dataOraMessaggioRichiesta</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="autenticazioneSoggetto{$iterRPT}" name="autenticazioneSoggetto{$iterRPT}"
                                                           placeholder="autenticazioneSoggetto{$iterRPT}" value="N/A">
                                                    <label for="autenticazioneSoggetto{$iterRPT}">autenticazioneSoggetto</label>
                                                </div>
                                            </div>
                                            <!--  End Tab 1 -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Dati Soggetto Versante RPT{$iterRPT}</h5><br/>
                                            <!--  Tab 2 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="tipoIdentificativoUnivocoVersante{$iterRPT}" name="tipoIdentificativoUnivocoVersante{$iterRPT}"
                                                           placeholder="tipoIdentificativoUnivocoVersante{$iterRPT}" value="F">
                                                    <label for="tipoIdentificativoUnivocoVersante{$iterRPT}">tipoIdentificativoUnivocoVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="codiceIdentificativoUnivocoVersante{$iterRPT}" name="codiceIdentificativoUnivocoVersante{$iterRPT}"
                                                           placeholder="codiceIdentificativoUnivocoVersante{$iterRPT}"
                                                           value="KSMKSH80A01H501D">
                                                    <label for="codiceIdentificativoUnivocoVersante{$iterRPT}">codiceIdentificativoUnivocoVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="anagraficaVersante{$iterRPT}" name="anagraficaVersante{$iterRPT}"
                                                           placeholder="anagraficaVersante{$iterRPT}" value="Kenshiro Kasumi">
                                                    <label for="anagraficaVersante{$iterRPT}">anagraficaVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="indirizzoVersante{$iterRPT}"  name="indirizzoVersante{$iterRPT}"
                                                           placeholder="indirizzoVersante{$iterRPT}" value="Divina Scuola di Hokuto">
                                                    <label for="indirizzoVersante{$iterRPT}">indirizzoVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="civicoVersante{$iterRPT}" name="civicoVersante{$iterRPT}"
                                                           placeholder="civicoVersante{$iterRPT}" value="100">
                                                    <label for="civicoVersante{$iterRPT}">civicoVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="capVersante{$iterRPT}" name="capVersante{$iterRPT}"
                                                           placeholder="capVersante{$iterRPT}" value="00100">
                                                    <label for="capVersante{$iterRPT}">capVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="localitaVersante{$iterRPT}" name="localitaVersante{$iterRPT}"
                                                           placeholder="localitaVersante{$iterRPT}" value="Croce del Sud">
                                                    <label for="localitaVersante{$iterRPT}">localitaVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="provinciaVersante{$iterRPT}" name="provinciaVersante{$iterRPT}"
                                                           placeholder="provinciaVersante{$iterRPT}" value="RM">
                                                    <label for="provinciaVersante{$iterRPT}">provinciaVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nazioneVersante{$iterRPT}" name="nazioneVersante{$iterRPT}"
                                                           placeholder="nazioneVersante{$iterRPT}" value="IT">
                                                    <label for="nazioneVersante{$iterRPT}">nazioneVersante</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="e-mailVersante{$iterRPT}" name="e-mailVersante{$iterRPT}"
                                                           placeholder="e-mailVersante{$iterRPT}"
                                                           value="kenshiro.kasumi@divinascuolahokuto.it">
                                                    <label for="e-mailVersante{$iterRPT}">e-mailVersante</label>
                                                </div>
                                            </div>
                                            <!--  End Tab 2 -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Dati Soggetto Pagatore RPT{$iterRPT}</h5><br/>
                                            <!--  Tab 3 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="tipoIdentificativoUnivocoPagatore{$iterRPT}" name="tipoIdentificativoUnivocoPagatore{$iterRPT}"
                                                           placeholder="tipoIdentificativoUnivocoPagatore{$iterRPT}" value="F">
                                                    <label for="tipoIdentificativoUnivocoPagatore{$iterRPT}">tipoIdentificativoUnivocoPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="codiceIdentificativoUnivocoPagatore{$iterRPT}" name="codiceIdentificativoUnivocoPagatore{$iterRPT}"
                                                           placeholder="codiceIdentificativoUnivocoPagatore{$iterRPT}"
                                                           value="KSMKSH80A01H501D">
                                                    <label for="codiceIdentificativoUnivocoPagatore{$iterRPT}">codiceIdentificativoUnivocoPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="anagraficaPagatore{$iterRPT}" name="anagraficaPagatore{$iterRPT}"
                                                           placeholder="anagraficaPagatore{$iterRPT}" value="Kenshiro Kasumi">
                                                    <label for="anagraficaPagatore{$iterRPT}">anagraficaPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="indirizzoPagatore{$iterRPT}" name="indirizzoPagatore{$iterRPT}"
                                                           placeholder="indirizzoPagatore{$iterRPT}" value="Divina Scuola di Hokuto">
                                                    <label for="indirizzoPagatore{$iterRPT}">indirizzoPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="civicoPagatore{$iterRPT}" name="civicoPagatore{$iterRPT}"
                                                           placeholder="civicoPagatore{$iterRPT}" value="100">
                                                    <label for="civicoPagatore{$iterRPT}">civicoPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="capPagatore{$iterRPT}" name="capPagatore{$iterRPT}"
                                                           placeholder="capPagatore{$iterRPT}" value="00100">
                                                    <label for="capPagatore{$iterRPT}">capPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="localitaPagatore{$iterRPT}" name="localitaPagatore{$iterRPT}"
                                                           placeholder="localitaPagatore{$iterRPT}" value="Croce del Sud">
                                                    <label for="localitaPagatore{$iterRPT}">localitaPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="provinciaPagatore{$iterRPT}" name="provinciaPagatore{$iterRPT}"
                                                           placeholder="provinciaPagatore{$iterRPT}" value="RM">
                                                    <label for="provinciaPagatore{$iterRPT}">provinciaPagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nazionePagatore{$iterRPT}" name="nazionePagatore{$iterRPT}"
                                                           placeholder="nazionePagatore{$iterRPT}" value="IT">
                                                    <label for="nazionePagatore{$iterRPT}">nazionePagatore</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="e-mailPagatore{$iterRPT}" name="e-mailPagatore{$iterRPT}"
                                                           placeholder="e-mailPagatore{$iterRPT}"
                                                           value="kenshiro.kasumi@divinascuolahokuto.it">
                                                    <label for="e-mailPagatore{$iterRPT}">e-mailPagatore</label>
                                                </div>
                                            </div>
                                            <!--  End Tab 3 -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Dati Ente Beneficiario RPT{$iterRPT}</h5><br/>
                                            <!--  Tab 4 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="tipoIdentificativoUnivocoBeneficiario{$iterRPT}" name="tipoIdentificativoUnivocoBeneficiario{$iterRPT}"
                                                           placeholder="tipoIdentificativoUnivocoBeneficiario{$iterRPT}" value="G">
                                                    <label for="tipoIdentificativoUnivocoBeneficiario{$iterRPT}">tipoIdentificativoUnivocoBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="codiceIdentificativoUnivocoBeneficiario{$iterRPT}" name="codiceIdentificativoUnivocoBeneficiario{$iterRPT}"
                                                           placeholder="codiceIdentificativoUnivocoBeneficiario{$iterRPT}" value="77777777777">
                                                    <label for="codiceIdentificativoUnivocoBeneficiario{$iterRPT}">codiceIdentificativoUnivocoBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="denominazioneBeneficiario{$iterRPT}" name="denominazioneBeneficiario{$iterRPT}"
                                                           placeholder="denominazioneBeneficiario{$iterRPT}"
                                                           value="Ente Intermediato di Test da AgID TEST">
                                                    <label for="denominazioneBeneficiario{$iterRPT}">denominazioneBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="indirizzoBeneficiario{$iterRPT}" name="indirizzoBeneficiario{$iterRPT}"
                                                           placeholder="indirizzoBeneficiario{$iterRPT}" value="Viale Liszt">
                                                    <label for="indirizzoBeneficiario{$iterRPT}">indirizzoBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="civicoBeneficiario{$iterRPT}" name="civicoBeneficiario{$iterRPT}"
                                                           placeholder="civicoBeneficiario{$iterRPT}" value="21">
                                                    <label for="civicoBeneficiario{$iterRPT}">civicoBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="capBeneficiario{$iterRPT}" name="capBeneficiario{$iterRPT}"
                                                           placeholder="capBeneficiario{$iterRPT}" value="00100">
                                                    <label for="capBeneficiario{$iterRPT}">capBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="localitaBeneficiario{$iterRPT}" name="localitaBeneficiario{$iterRPT}"
                                                           placeholder="localitaBeneficiario{$iterRPT}" value="Roma">
                                                    <label for="localitaBeneficiario{$iterRPT}">localitaBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="provinciaBeneficiario{$iterRPT}" name="provinciaBeneficiario{$iterRPT}"
                                                           placeholder="provinciaBeneficiario{$iterRPT}" value="RM">
                                                    <label for="provinciaBeneficiario{$iterRPT}">provinciaBeneficiario</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nazioneBeneficiario{$iterRPT}" name="nazioneBeneficiario{$iterRPT}"
                                                           placeholder="nazioneBeneficiario{$iterRPT}" value="IT">
                                                    <label for="nazioneBeneficiario{$iterRPT}">nazioneBeneficiario</label>
                                                </div>
                                            </div>
                                            <!--  End Tab 4 -->
                                        </div>
                                    </div>
                                </div>


                                <div class="card-wrapper card-space">
                                    <div class="card card-bg">
                                        <div class="card-body">
                                            <h5 class="card-title">Dati Versamento RPT{$iterRPT}</h5><br/>
                                            <!--  Tab 4 -->
                                            <div class="form-row" id="carrello">
                                                <!--start dati versamento-->
                                                <div class="form-group col-md-12">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Informazioni sul pagamento</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="dataEsecuzionePagamento{$iterRPT}" name="dataEsecuzionePagamento{$iterRPT}"
                                                                           placeholder="dataEsecuzionePagamento{$iterRPT}" value="{$DATAPAGAMENTO}">
                                                                    <label for="dataEsecuzionePagamento{$iterRPT}">dataEsecuzionePagamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="importoTotaleDaVersare{$iterRPT}">importoTotaleDaVersare</label>
                                                                    <input type="text" class="form-control" id="importoTotaleDaVersare{$iterRPT}" name="importoTotaleDaVersare{$iterRPT}" placeholder="Il totale viene calcolato automaticamente se il campo viene lasciato vuoto" value="">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="tipoVersamento{$iterRPT}" name="tipoVersamento{$iterRPT}"
                                                                           placeholder="tipoVersamento{$iterRPT}" value="BBT">
                                                                    <label for="tipoVersamento{$iterRPT}">tipoVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control"
                                                                           id="identificativoUnivocoVersamento{$iterRPT}" name="identificativoUnivocoVersamento{$iterRPT}"
                                                                           placeholder="identificativoUnivocoVersamento{$iterRPT}" value="{$IUV_{$iterRPT}}">
                                                                    <label for="identificativoUnivocoVersamento{$iterRPT}">identificativoUnivocoVersamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="codiceContestoPagamento{$iterRPT}" name="codiceContestoPagamento{$iterRPT}"
                                                                           placeholder="codiceContestoPagamento{$iterRPT}" value="{$CCP_{$iterRPT}}">
                                                                    <label for="codiceContestoPagamento{$iterRPT}">codiceContestoPagamento</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="ibanAddebito{$iterRPT}" name="ibanAddebito{$iterRPT}"
                                                                           placeholder="ibanAddebito{$iterRPT}" value="IT06T1063911700000000010535">
                                                                    <label for="ibanAddebito{$iterRPT}">ibanAddebito</label>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="text" class="form-control" id="firmaRicevuta{$iterRPT}" name="firmaRicevuta{$iterRPT}"
                                                                           placeholder="firmaRicevuta{$iterRPT}" value="0">
                                                                    <label for="firmaRicevuta{$iterRPT}">firmaRicevuta</label>
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
                                                                <h5 class="card-title">Numero di versamenti RPT{$iterRPT}</h5><br/>
                                                                <div class="form-group col-md-12">
                                                                    <div class="bootstrap-select-wrapper">
                                                                        <label>Specificare il numero di versamenti da inviare</label>
                                                                        <select title="Scegli una opzione" id="dropdownNumVersamenti{$iterRPT}" name="dropdownNumVersamenti{$iterRPT}">
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

                                                <!--script eBollo-->
                                                <script>
                                                    $(function() {
                                                        $('#toggleXSD1_{$iterRPT}').change(function() {
                                                            if (!($(this).prop('checked'))) {
                                                                $('#cardVersamento1_{$iterRPT}').show();
                                                                $('#cardBollo1_{$iterRPT}').hide();
                                                            }
                                                            else {
                                                                $('#cardVersamento1_{$iterRPT}').hide();
                                                                $('#cardBollo1_{$iterRPT}').show();
                                                            }
                                                        })
                                                        $('#toggleXSD2_{$iterRPT}').change(function() {
                                                            if (!($(this).prop('checked'))) {
                                                                $('#cardVersamento2_{$iterRPT}').show();
                                                                $('#cardBollo2_{$iterRPT}').hide();
                                                            }
                                                            else {
                                                                $('#cardVersamento2_{$iterRPT}').hide();
                                                                $('#cardBollo2_{$iterRPT}').show();
                                                            }
                                                        })
                                                        $('#toggleXSD3_{$iterRPT}').change(function() {
                                                            if (!($(this).prop('checked'))) {
                                                                $('#cardVersamento3_{$iterRPT}').show();
                                                                $('#cardBollo3_{$iterRPT}').hide();
                                                            }
                                                            else {
                                                                $('#cardVersamento3_{$iterRPT}').hide();
                                                                $('#cardBollo3_{$iterRPT}').show();
                                                            }
                                                        })
                                                        $('#toggleXSD4_{$iterRPT}').change(function() {
                                                            if (!($(this).prop('checked'))) {
                                                                $('#cardVersamento4_{$iterRPT}').show();
                                                                $('#cardBollo4_{$iterRPT}').hide();
                                                            }
                                                            else {
                                                                $('#cardVersamento4_{$iterRPT}').hide();
                                                                $('#cardBollo4_{$iterRPT}').show();
                                                            }
                                                        })
                                                        $('#toggleXSD5_{$iterRPT}').change(function() {
                                                            if (!($(this).prop('checked'))) {
                                                                $('#cardVersamento5_{$iterRPT}').show();
                                                                $('#cardBollo5_{$iterRPT}').hide();
                                                            }
                                                            else {
                                                                $('#cardVersamento5_{$iterRPT}').hide();
                                                                $('#cardBollo5_{$iterRPT}').show();
                                                            }
                                                        })
                                                    })
                                                </script>

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento1_{$iterRPT}">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 1 (RPT{$iterRPT})</h5><br/>
                                                                <div class="form-group col-md-6">
                                                                    <div class="toggles">
                                                                        <label for="toggleXSD1_{$iterRPT}">
                                                                            Attiva eBollo
                                                                            <input type="checkbox" id="toggleXSD1_{$iterRPT}" name="toggleXSD1_{$iterRPT}">
                                                                            <span class="lever"></span>
                                                                        </label>
                                                                    </div>
                                                                    <br />
                                                                </div>

                                                                <div id="cardVersamento1_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamento1_{$iterRPT}">importoSingoloVersamento</label>
                                                                        <input type="text"  class="form-control" id="importoSingoloVersamento1_{$iterRPT}" name="importoSingoloVersamento1_{$iterRPT}" value="{$IMPORTOPGAMENTO1_{$iterRPT}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="ibanAccredito1_{$iterRPT}" name="ibanAccredito1_{$iterRPT}"
                                                                               placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                        <label for="ibanAccredito1_{$iterRPT}">ibanAccredito</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control"
                                                                               id="ibanAppoggio1_{$iterRPT}" name="ibanAppoggio1_{$iterRPT}"
                                                                               placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                        <label for="ibanAppoggio1_{$iterRPT}">ibanAppoggio</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="credenzialiPagatore1_{$iterRPT}" name="credenzialiPagatore1_{$iterRPT}"
                                                                               placeholder="credenzialiPagatore" value="n/a">
                                                                        <label for="credenzialiPagatore1_{$iterRPT}">credenzialiPagatore</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamento1_{$iterRPT}" name="causaleVersamento1_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALE1_{$iterRPT}}">
                                                                        <label for="causaleVersamento1_{$iterRPT}">causaleVersamento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossione1_{$iterRPT}" name="datiSpecificiRiscossione1_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossione1_{$iterRPT}">datiSpecificiRiscossione</label>
                                                                    </div>
                                                                </div>
                                                                <div id="cardBollo1_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamentoBollo1_{$iterRPT}">importoSingoloVersamento (Bollo)</label>
                                                                        <input type="text"  class="form-control" id="importoSingoloVersamentoBollo1_{$iterRPT}" name="importoSingoloVersamentoBollo1_{$iterRPT}" value="16.00">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamentoBollo1_{$iterRPT}" name="causaleVersamentoBollo1_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALEBOLLO1_{$iterRPT}}">
                                                                        <label for="causaleVersamentoBollo1_{$iterRPT}">causaleVersamento (Bollo)</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossioneBollo1_{$iterRPT}" name="datiSpecificiRiscossioneBollo1_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossioneBollo1_{$iterRPT}">datiSpecificiRiscossione (Bollo)</label>
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="tipoBollo1_{$iterRPT}" name="tipoBollo1_{$iterRPT}"
                                                                               placeholder="tipoBollo" value="01">
                                                                        <label for="tipoBollo1_{$iterRPT}">tipoBollo</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="hashDocumento1_{$iterRPT}" name="hashDocumento1_{$iterRPT}"
                                                                               placeholder="hashDocumento" value="bdh3vCzgL/vutKuoE3SUlgQyWQou71GBFu5DcNXceOA=">
                                                                        <label for="hashDocumento1_{$iterRPT}">hashDocumento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="provinciaResidenza1_{$iterRPT}" name="provinciaResidenza1_{$iterRPT}"
                                                                               placeholder="provinciaResidenza" value="RM">
                                                                        <label for="provinciaResidenza1_{$iterRPT}">provinciaResidenza</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento2_{$iterRPT}">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 2 (RPT{$iterRPT})</h5><br/>
                                                                <div class="form-group col-md-6">
                                                                    <div class="toggles">
                                                                        <label for="toggleXSD2_{$iterRPT}">
                                                                            Attiva eBollo
                                                                            <input type="checkbox" id="toggleXSD2_{$iterRPT}" name="toggleXSD2_{$iterRPT}">
                                                                            <span class="lever"></span>
                                                                        </label>
                                                                    </div>
                                                                    <br />
                                                                </div>

                                                                <div id="cardVersamento2_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamento2_{$iterRPT}">importoSingoloVersamento</label>
                                                                        <input type="text" class="form-control" id="importoSingoloVersamento2_{$iterRPT}" name="importoSingoloVersamento2_{$iterRPT}" value="{$IMPORTOPGAMENTO2_{$iterRPT}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="ibanAccredito2_{$iterRPT}" name="ibanAccredito2_{$iterRPT}"
                                                                               placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                        <label for="ibanAccredito2_{$iterRPT}">ibanAccredito</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control"
                                                                               id="ibanAppoggio2_{$iterRPT}" name="ibanAppoggio2_{$iterRPT}"
                                                                               placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                        <label for="ibanAppoggio2_{$iterRPT}">ibanAppoggio</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="credenzialiPagatore2_{$iterRPT}" name="credenzialiPagatore2_{$iterRPT}"
                                                                               placeholder="credenzialiPagatore" value="n/a">
                                                                        <label for="credenzialiPagatore2_{$iterRPT}">credenzialiPagatore</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamento2_{$iterRPT}" name="causaleVersamento2_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALE2_{$iterRPT}}">
                                                                        <label for="causaleVersamento2_{$iterRPT}">causaleVersamento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossione2_{$iterRPT}" name="datiSpecificiRiscossione2_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossione2_{$iterRPT}">datiSpecificiRiscossione</label>
                                                                    </div>
                                                                </div>
                                                                <div id="cardBollo2_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamentoBollo2_{$iterRPT}">importoSingoloVersamento (Bollo)</label>
                                                                        <input type="text"  class="form-control" id="importoSingoloVersamentoBollo2_{$iterRPT}" name="importoSingoloVersamentoBollo2_{$iterRPT}" value="16.00">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamentoBollo2_{$iterRPT}" name="causaleVersamentoBollo2_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALEBOLLO2_{$iterRPT}}">
                                                                        <label for="causaleVersamentoBollo2_{$iterRPT}">causaleVersamento (Bollo)</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossioneBollo2_{$iterRPT}" name="datiSpecificiRiscossioneBollo2_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossioneBollo2_{$iterRPT}">datiSpecificiRiscossione (Bollo)</label>
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="tipoBollo2_{$iterRPT}" name="tipoBollo2_{$iterRPT}"
                                                                               placeholder="tipoBollo" value="01">
                                                                        <label for="tipoBollo2_{$iterRPT}">tipoBollo</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="hashDocumento2_{$iterRPT}" name="hashDocumento2_{$iterRPT}"
                                                                               placeholder="hashDocumento" value="bdh3vCzgL/vutKuoE3SUlgQyWQou71GBFu5DcNXceOA=">
                                                                        <label for="hashDocumento2_{$iterRPT}">hashDocumento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="provinciaResidenza2_{$iterRPT}" name="provinciaResidenza2_{$iterRPT}"
                                                                               placeholder="provinciaResidenza" value="RM">
                                                                        <label for="provinciaResidenza2_{$iterRPT}">provinciaResidenza</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento3_{$iterRPT}">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 3 (RPT{$iterRPT})</h5><br/>
                                                                <div class="form-group col-md-6">
                                                                    <div class="toggles">
                                                                        <label for="toggleXSD3_{$iterRPT}">
                                                                            Attiva eBollo
                                                                            <input type="checkbox" id="toggleXSD3_{$iterRPT}" name="toggleXSD3_{$iterRPT}">
                                                                            <span class="lever"></span>
                                                                        </label>
                                                                    </div>
                                                                    <br />
                                                                </div>

                                                                <div id="cardVersamento3_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamento3_{$iterRPT}">importoSingoloVersamento</label>
                                                                        <input type="text" class="form-control" id="importoSingoloVersamento3_{$iterRPT}" name="importoSingoloVersamento3_{$iterRPT}" value="{$IMPORTOPGAMENTO3_{$iterRPT}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="ibanAccredito3_{$iterRPT}" name="ibanAccredito3_{$iterRPT}"
                                                                               placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                        <label for="ibanAccredito3_{$iterRPT}">ibanAccredito</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control"
                                                                               id="ibanAppoggio3_{$iterRPT}" name="ibanAppoggio3_{$iterRPT}"
                                                                               placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                        <label for="ibanAppoggio3_{$iterRPT}">ibanAppoggio</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="credenzialiPagatore3_{$iterRPT}" name="credenzialiPagatore3_{$iterRPT}"
                                                                               placeholder="credenzialiPagatore" value="n/a">
                                                                        <label for="credenzialiPagatore3_{$iterRPT}">credenzialiPagatore</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamento3_{$iterRPT}" name="causaleVersamento3_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALE3_{$iterRPT}}">
                                                                        <label for="causaleVersamento3_{$iterRPT}">causaleVersamento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossione3_{$iterRPT}" name="datiSpecificiRiscossione3_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossione3_{$iterRPT}">datiSpecificiRiscossione</label>
                                                                    </div>
                                                                </div>

                                                                <div id="cardBollo3_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamentoBollo3_{$iterRPT}">importoSingoloVersamento (Bollo)</label>
                                                                        <input type="text"  class="form-control" id="importoSingoloVersamentoBollo3_{$iterRPT}" name="importoSingoloVersamentoBollo3_{$iterRPT}" value="16.00">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamentoBollo3_{$iterRPT}" name="causaleVersamentoBollo3_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALEBOLLO3_{$iterRPT}}">
                                                                        <label for="causaleVersamentoBollo3_{$iterRPT}">causaleVersamento (Bollo)</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossioneBollo3_{$iterRPT}" name="datiSpecificiRiscossioneBollo3_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossioneBollo3_{$iterRPT}">datiSpecificiRiscossione (Bollo)</label>
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="tipoBollo3_{$iterRPT}" name="tipoBollo3_{$iterRPT}"
                                                                               placeholder="tipoBollo" value="01">
                                                                        <label for="tipoBollo3_{$iterRPT}">tipoBollo</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="hashDocumento3_{$iterRPT}" name="hashDocumento3_{$iterRPT}"
                                                                               placeholder="hashDocumento" value="bdh3vCzgL/vutKuoE3SUlgQyWQou71GBFu5DcNXceOA=">
                                                                        <label for="hashDocumento3_{$iterRPT}">hashDocumento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="provinciaResidenza3_{$iterRPT}" name="provinciaResidenza3_{$iterRPT}"
                                                                               placeholder="provinciaResidenza" value="RM">
                                                                        <label for="provinciaResidenza3_{$iterRPT}">provinciaResidenza</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento4_{$iterRPT}">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 4 (RPT{$iterRPT})</h5><br/>
                                                                <div class="form-group col-md-6">
                                                                    <div class="toggles">
                                                                        <label for="toggleXSD4_{$iterRPT}">
                                                                            Attiva eBollo
                                                                            <input type="checkbox" id="toggleXSD4_{$iterRPT}" name="toggleXSD4_{$iterRPT}">
                                                                            <span class="lever"></span>
                                                                        </label>
                                                                    </div>
                                                                    <br />
                                                                </div>

                                                                <div id="cardVersamento4_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamento4_{$iterRPT}">importoSingoloVersamento</label>
                                                                        <input type="text" class="form-control" id="importoSingoloVersamento4_{$iterRPT}" name="importoSingoloVersamento4_{$iterRPT}" value="{$IMPORTOPGAMENTO4_{$iterRPT}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="ibanAccredito4_{$iterRPT}" name="ibanAccredito4_{$iterRPT}"
                                                                               placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                        <label for="ibanAccredito4_{$iterRPT}">ibanAccredito</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control"
                                                                               id="ibanAppoggio4_{$iterRPT}" name="ibanAppoggio4_{$iterRPT}"
                                                                               placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                        <label for="ibanAppoggio4_{$iterRPT}">ibanAppoggio</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="credenzialiPagatore4_{$iterRPT}" name="credenzialiPagatore4_{$iterRPT}"
                                                                               placeholder="credenzialiPagatore" value="n/a">
                                                                        <label for="credenzialiPagatore4_{$iterRPT}">credenzialiPagatore</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamento4_{$iterRPT}" name="causaleVersamento4_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALE4_{$iterRPT}}">
                                                                        <label for="causaleVersamento4_{$iterRPT}">causaleVersamento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossione4_{$iterRPT}" name="datiSpecificiRiscossione4_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossione4_{$iterRPT}">datiSpecificiRiscossione</label>
                                                                    </div>
                                                                </div>
                                                                <div id="cardBollo4_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamentoBollo4_{$iterRPT}">importoSingoloVersamento (Bollo)</label>
                                                                        <input type="text"  class="form-control" id="importoSingoloVersamentoBollo4_{$iterRPT}" name="importoSingoloVersamentoBollo4_{$iterRPT}" value="16.00">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamentoBollo4_{$iterRPT}" name="causaleVersamentoBollo4_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALEBOLLO4_{$iterRPT}}">
                                                                        <label for="causaleVersamentoBollo4_{$iterRPT}">causaleVersamento (Bollo)</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossioneBollo4_{$iterRPT}" name="datiSpecificiRiscossioneBollo4_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossioneBollo4_{$iterRPT}">datiSpecificiRiscossione (Bollo)</label>
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="tipoBollo4_{$iterRPT}" name="tipoBollo4_{$iterRPT}"
                                                                               placeholder="tipoBollo" value="01">
                                                                        <label for="tipoBollo4_{$iterRPT}">tipoBollo</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="hashDocumento4_{$iterRPT}" name="hashDocumento4_{$iterRPT}"
                                                                               placeholder="hashDocumento" value="bdh3vCzgL/vutKuoE3SUlgQyWQou71GBFu5DcNXceOA=">
                                                                        <label for="hashDocumento4_{$iterRPT}">hashDocumento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="provinciaResidenza4_{$iterRPT}" name="provinciaResidenza4_{$iterRPT}"
                                                                               placeholder="provinciaResidenza" value="RM">
                                                                        <label for="provinciaResidenza4_{$iterRPT}">provinciaResidenza</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end singolo versamento-->

                                                <!--start singolo versamento-->
                                                <div class="form-group col-md-6" id="bloccoVersamento5_{$iterRPT}">
                                                    <div class="card-wrapper card-space">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Dati singolo versamento 5 (RPT{$iterRPT})</h5><br/>
                                                                <div class="form-group col-md-6">
                                                                    <div class="toggles">
                                                                        <label for="toggleXSD5_{$iterRPT}">
                                                                            Attiva eBollo
                                                                            <input type="checkbox" id="toggleXSD5_{$iterRPT}" name="toggleXSD5_{$iterRPT}">
                                                                            <span class="lever"></span>
                                                                        </label>
                                                                    </div>
                                                                    <br />
                                                                </div>

                                                                <div id="cardVersamento5_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamento5_{$iterRPT}">importoSingoloVersamento</label>
                                                                        <input type="text" class="form-control" id="importoSingoloVersamento5_{$iterRPT}" name="importoSingoloVersamento5_{$iterRPT}" value="{$IMPORTOPGAMENTO5_{$iterRPT}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="ibanAccredito5_{$iterRPT}" name="ibanAccredito5_{$iterRPT}"
                                                                               placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                        <label for="ibanAccredito5_{$iterRPT}">ibanAccredito</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control"
                                                                               id="ibanAppoggio5_{$iterRPT}" name="ibanAppoggio5_{$iterRPT}"
                                                                               placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                        <label for="ibanAppoggio5_{$iterRPT}">ibanAppoggio</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="credenzialiPagatore5_{$iterRPT}" name="credenzialiPagatore5_{$iterRPT}"
                                                                               placeholder="credenzialiPagatore" value="n/a">
                                                                        <label for="credenzialiPagatore5_{$iterRPT}">credenzialiPagatore</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamento5_{$iterRPT}" name="causaleVersamento5_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALE5_{$iterRPT}}">
                                                                        <label for="causaleVersamento5_{$iterRPT}">causaleVersamento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossione5_{$iterRPT}" name="datiSpecificiRiscossione5_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossione5_{$iterRPT}">datiSpecificiRiscossione</label>
                                                                    </div>
                                                                </div>
                                                                <div id="cardBollo5_{$iterRPT}">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="importoSingoloVersamentoBollo5_{$iterRPT}">importoSingoloVersamento (Bollo)</label>
                                                                        <input type="text"  class="form-control" id="importoSingoloVersamentoBollo5_{$iterRPT}" name="importoSingoloVersamentoBollo5_{$iterRPT}" value="16.00">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="causaleVersamentoBollo5_{$iterRPT}" name="causaleVersamentoBollo5_{$iterRPT}"
                                                                               placeholder="causaleVersamento" value="{$CAUSALEBOLLO5_{$iterRPT}}">
                                                                        <label for="causaleVersamentoBollo5_{$iterRPT}">causaleVersamento (Bollo)</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="datiSpecificiRiscossioneBollo5_{$iterRPT}" name="datiSpecificiRiscossioneBollo5_{$iterRPT}"
                                                                               placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                        <label for="datiSpecificiRiscossioneBollo5_{$iterRPT}">datiSpecificiRiscossione (Bollo)</label>
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="tipoBollo5_{$iterRPT}" name="tipoBollo5_{$iterRPT}"
                                                                               placeholder="tipoBollo" value="01">
                                                                        <label for="tipoBollo5_{$iterRPT}">tipoBollo</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="hashDocumento5_{$iterRPT}" name="hashDocumento5_{$iterRPT}"
                                                                               placeholder="hashDocumento" value="bdh3vCzgL/vutKuoE3SUlgQyWQou71GBFu5DcNXceOA=">
                                                                        <label for="hashDocumento5_{$iterRPT}">hashDocumento</label>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="provinciaResidenza5_{$iterRPT}" name="provinciaResidenza5_{$iterRPT}"
                                                                               placeholder="provinciaResidenza" value="RM">
                                                                        <label for="provinciaResidenza5_{$iterRPT}">provinciaResidenza</label>
                                                                    </div>
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
                        {/for}
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


{include file="views/masterPageFooter.tpl"}
{include file="views/masterPageScript.tpl"}
