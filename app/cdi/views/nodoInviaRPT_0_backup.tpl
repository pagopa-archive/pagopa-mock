{include file="views/masterPageHeader.tpl"}


<!-- Content
================================================== -->

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-md-9">

            <h1 class="page-header mb-4">
                Primitiva nodoInviaRPT
            </h1>

            <div>
                <form method="post" action="nodoInviaRPT.php" id="formInviaRPT" autocomplete="off">
                    <input type="hidden" name="page" value="1"/>

                    <div class="p-3 mb-2 bg-secondary text-white">Inserire i parametri della richiesta <i>nodoInviaRPT</i>
                    </div>
                    <legend class="text-primary">SOAP Header</legend>
                    <br/>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="identificativoIntermediarioPA" name="identificativoIntermediarioPA"
                                   placeholder="identificativoIntermediarioPA" value="97735020584">
                            <label for="identificativoIntermediarioPA">identificativoIntermediarioPA</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="identificativoStazioneIntermediarioPA"name="identificativoStazioneIntermediarioPA"
                                   placeholder="identificativoStazioneIntermediarioPA" value="97735020584_01">
                            <label for="identificativoStazioneIntermediarioPA">identificativoStazioneIntermediarioPA</label>
                        </div>
                    </div>


                    <legend class="text-primary">SOAP Body</legend>
                    <br/>
                    <ul class="nav nav-tabs" id="tabSoapBody" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1"
                                                role="tab" aria-controls="tab1" aria-selected="true">Payload</a></li>
                        <li class="nav-item"><a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab"
                                                aria-controls="tab2" aria-selected="false">RPT</a></li>
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
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="identificativoDominio" name="identificativoDominio"
                                                       placeholder="identificativoDominio" value="77777777777">
                                                <label for="identificativoDominio">identificativoDominio</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       id="identificativoUnivocoVersamento" name="identificativoUnivocoVersamento"
                                                       placeholder="identificativoUnivocoVersamento" value="{$IUV}">
                                                <label for="identificativoUnivocoVersamento">identificativoUnivocoVersamento</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="codiceContestoPagamento" name="codiceContestoPagamento"
                                                       placeholder="codiceContestoPagamento" value="{$CCP}">
                                                <label for="codiceContestoPagamento">codiceContestoPagamento</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="tipoFirma" name="tipoFirma"
                                                       placeholder="tipoFirma" value="0">
                                                <label for="tipoFirma">tipoFirma</label>
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
                        <div class="tab-pane p-4 fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                            <!--  RPT TAB -->
                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <h5 class="card-title">Informazioni generali</h5><br/>
                                        <!--  Tab 1 -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="versioneOggetto" name="versioneOggetto"
                                                       placeholder="versioneOggetto" value="6.2.0">
                                                <label for="versioneOggetto">versioneOggetto</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="identificativoDominio" name="identificativoDominio"
                                                       placeholder="identificativoDominio" value="77777777777">
                                                <label for="identificativoDominio">identificativoDominio</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       id="identificativoMessaggioRichiesta" name="identificativoMessaggioRichiesta"
                                                       placeholder="identificativoMessaggioRichiesta" value="{$IDM}">
                                                <label for="identificativoMessaggioRichiesta">identificativoMessaggioRichiesta</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="dataOraMessaggioRichiesta" name="dataOraMessaggioRichiesta"
                                                       placeholder="dataOraMessaggioRichiesta" value="{$DATARICHIESTA}">
                                                <label for="dataOraMessaggioRichiesta">dataOraMessaggioRichiesta</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="autenticazioneSoggetto" name="autenticazioneSoggetto"
                                                       placeholder="autenticazioneSoggetto" value="N/A">
                                                <label for="autenticazioneSoggetto">autenticazioneSoggetto</label>
                                            </div>
                                        </div>
                                        <!--  End Tab 1 -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <h5 class="card-title">Dati Soggetto Versante</h5><br/>
                                        <!--  Tab 2 -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="tipoIdentificativoUnivocoVersante" name="tipoIdentificativoUnivocoVersante"
                                                       placeholder="tipoIdentificativoUnivocoVersante" value="F">
                                                <label for="tipoIdentificativoUnivocoVersante">tipoIdentificativoUnivocoVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       id="codiceIdentificativoUnivocoVersante" name="codiceIdentificativoUnivocoVersante"
                                                       placeholder="codiceIdentificativoUnivocoVersante"
                                                       value="KSMKSH80A01H501D">
                                                <label for="codiceIdentificativoUnivocoVersante">codiceIdentificativoUnivocoVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="anagraficaVersante" name="anagraficaVersante"
                                                       placeholder="anagraficaVersante" value="Kenshiro Kasumi">
                                                <label for="anagraficaVersante">anagraficaVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="indirizzoVersante"  name="indirizzoVersante"
                                                       placeholder="indirizzoVersante" value="Divina Scuola di Hokuto">
                                                <label for="indirizzoVersante">indirizzoVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="civicoVersante" name="civicoVersante"
                                                       placeholder="civicoVersante" value="100">
                                                <label for="civicoVersante">civicoVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="capVersante" name="capVersante"
                                                       placeholder="capVersante" value="00100">
                                                <label for="capVersante">capVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="localitaVersante" name="localitaVersante"
                                                       placeholder="localitaVersante" value="Croce del Sud">
                                                <label for="localitaVersante">localitaVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="provinciaVersante" name="provinciaVersante"
                                                       placeholder="provinciaVersante" value="RM">
                                                <label for="provinciaVersante">provinciaVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="nazioneVersante" name="nazioneVersante"
                                                       placeholder="nazioneVersante" value="IT">
                                                <label for="nazioneVersante">nazioneVersante</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="e-mailVersante" name="e-mailVersante"
                                                       placeholder="e-mailVersante"
                                                       value="kenshiro.kasumi@divinascuolahokuto.it">
                                                <label for="e-mailVersante">e-mailVersante</label>
                                            </div>
                                        </div>
                                        <!--  End Tab 2 -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <h5 class="card-title">Dati Soggetto Pagatore</h5><br/>
                                        <!--  Tab 3 -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="tipoIdentificativoUnivocoPagatore" name="tipoIdentificativoUnivocoPagatore"
                                                       placeholder="tipoIdentificativoUnivocoPagatore" value="F">
                                                <label for="tipoIdentificativoUnivocoPagatore">tipoIdentificativoUnivocoPagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       id="codiceIdentificativoUnivocoPagatore" name="codiceIdentificativoUnivocoPagatore"
                                                       placeholder="codiceIdentificativoUnivocoPagatore"
                                                       value="KSMKSH80A01H501D">
                                                <label for="codiceIdentificativoUnivocoPagatore">codiceIdentificativoUnivocoPagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="anagraficaPagatore" name="anagraficaPagatore"
                                                       placeholder="anagraficaPagatore" value="Kenshiro Kasumi">
                                                <label for="anagraficaPagatore">anagraficaPagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="indirizzoPagatore" name="indirizzoPagatore"
                                                       placeholder="indirizzoPagatore" value="Divina Scuola di Hokuto">
                                                <label for="indirizzoPagatore">indirizzoPagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="civicoPagatore" name="civicoPagatore"
                                                       placeholder="civicoPagatore" value="100">
                                                <label for="civicoPagatore">civicoPagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="capPagatore" name="capPagatore"
                                                       placeholder="capPagatore" value="00100">
                                                <label for="capPagatore">capPagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="localitaPagatore" name="localitaPagatore"
                                                       placeholder="localitaPagatore" value="Croce del Sud">
                                                <label for="localitaPagatore">localitaPagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="provinciaPagatore" name="provinciaPagatore"
                                                       placeholder="provinciaPagatore" value="RM">
                                                <label for="provinciaPagatore">provinciaPagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="nazionePagatore" name="nazionePagatore"
                                                       placeholder="nazionePagatore" value="IT">
                                                <label for="nazionePagatore">nazionePagatore</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="e-mailPagatore" name="e-mailPagatore"
                                                       placeholder="e-mailPagatore"
                                                       value="kenshiro.kasumi@divinascuolahokuto.it">
                                                <label for="e-mailPagatore">e-mailPagatore</label>
                                            </div>
                                        </div>
                                        <!--  End Tab 3 -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <h5 class="card-title">Dati Ente Beneficiario</h5><br/>
                                        <!--  Tab 4 -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="tipoIdentificativoUnivocoBeneficiario" name="tipoIdentificativoUnivocoBeneficiario"
                                                       placeholder="tipoIdentificativoUnivocoBeneficiario" value="G">
                                                <label for="tipoIdentificativoUnivocoBeneficiario">tipoIdentificativoUnivocoBeneficiario</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="codiceIdentificativoUnivocoBeneficiario" name="codiceIdentificativoUnivocoBeneficiario"
                                                       placeholder="codiceIdentificativoUnivocoBeneficiario" value="77777777777">
                                                <label for="codiceIdentificativoUnivocoBeneficiario">codiceIdentificativoUnivocoBeneficiario</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="denominazioneBeneficiario" name="denominazioneBeneficiario"
                                                       placeholder="denominazioneBeneficiario"
                                                       value="Ente Intermediato di Test da AgID TEST">
                                                <label for="denominazioneBeneficiario">denominazioneBeneficiario</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="indirizzoBeneficiario" name="indirizzoBeneficiario"
                                                       placeholder="indirizzoBeneficiario" value="Viale Liszt">
                                                <label for="indirizzoBeneficiario">indirizzoBeneficiario</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="civicoBeneficiario" name="civicoBeneficiario"
                                                       placeholder="civicoBeneficiario" value="21">
                                                <label for="civicoBeneficiario">civicoBeneficiario</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="capBeneficiario" name="capBeneficiario"
                                                       placeholder="capBeneficiario" value="00100">
                                                <label for="capBeneficiario">capBeneficiario</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="localitaBeneficiario" name="localitaBeneficiario"
                                                       placeholder="localitaBeneficiario" value="Roma">
                                                <label for="localitaBeneficiario">localitaBeneficiario</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="provinciaBeneficiario" name="provinciaBeneficiario"
                                                       placeholder="provinciaBeneficiario" value="RM">
                                                <label for="provinciaBeneficiario">provinciaBeneficiario</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="nazioneBeneficiario" name="nazioneBeneficiario"
                                                       placeholder="nazioneBeneficiario" value="IT">
                                                <label for="nazioneBeneficiario">nazioneBeneficiario</label>
                                            </div>
                                        </div>
                                        <!--  End Tab 4 -->
                                    </div>
                                </div>
                            </div>

                            <!-- Script to insert div element -->
                            <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
                            <script type="text/javascript">
                                 $(document).ready(function(){
                                     /* onLoad */
                                     var i=1;
                                     for (i=2; i<=5; i++) {
                                         $("#bloccoVersamento" + i).hide();
                                     }

                                     /* onChange */
                                     $("#dropdownNumVersamenti").change(function(){

                                        var numVersamenti=$("#dropdownNumVersamenti").val();
                                        var countShow, countHide;

                                        for (countShow=1; countShow<=numVersamenti; countShow++) {
                                             $("#bloccoVersamento" + countShow).show();
                                         }
                                         for (countHide=countShow; countHide<=5; countHide++) {
                                             $("#bloccoVersamento" + countHide).hide();
                                         }
                                     });
                                 });
                            </script>

                            <div class="card-wrapper card-space">
                                <div class="card card-bg">
                                    <div class="card-body">
                                        <h5 class="card-title">Dati Versamento</h5><br/>
                                        <!--  Tab 4 -->
                                        <div class="form-row" id="carrello">
                                            <!--start dati versamento-->
                                            <div class="form-group col-md-12">
                                                <div class="card-wrapper card-space">
                                                    <div class="card card-bg">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Informazioni sul pagamento</h5><br/>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="dataEsecuzionePagamento" name="dataEsecuzionePagamento"
                                                                       placeholder="dataEsecuzionePagamento" value="{$DATAPAGAMENTO}">
                                                                <label for="dataEsecuzionePagamento">dataEsecuzionePagamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="importoTotaleDaVersare" class="input-number-label">importoTotaleDaVersare</label>
                                                                <span class="input-number input-number-currency">
                                                            <input type="number" id="importoTotaleDaVersare" name="importoTotaleDaVersare" placeholder="Il totale viene calcolato automaticamente se il campo viene lasciato vuoto" value="" min="0" step="0.01">
                                                            <button class="input-number-add">
                                                                <span class="sr-only">Aumenta valore Euro</span>
                                                            </button>
                                                            <button class="input-number-sub">
                                                                <span class="sr-only">Diminuisci valore Euro</span>
                                                            </button>
                                                        </span>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="tipoVersamento" name="tipoVersamento"
                                                                       placeholder="tipoVersamento" value="BBT">
                                                                <label for="tipoVersamento">tipoVersamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control"
                                                                       id="identificativoUnivocoVersamento" name="identificativoUnivocoVersamento"
                                                                       placeholder="identificativoUnivocoVersamento" value="{$IUV}">
                                                                <label for="identificativoUnivocoVersamento">identificativoUnivocoVersamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="codiceContestoPagamento" name="codiceContestoPagamento"
                                                                       placeholder="codiceContestoPagamento" value="{$CCP}">
                                                                <label for="codiceContestoPagamento">codiceContestoPagamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="ibanAddebito" name="ibanAddebito"
                                                                       placeholder="ibanAddebito" value="IT06T1063911700000000010535">
                                                                <label for="ibanAddebito">ibanAddebito</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="firmaRicevuta" name="firmaRicevuta"
                                                                       placeholder="firmaRicevuta" value="0">
                                                                <label for="firmaRicevuta">firmaRicevuta</label>
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
                                                            <h5 class="card-title">Numero di versamenti</h5><br/>
                                                            <div class="form-group col-md-12">
                                                                <div class="bootstrap-select-wrapper">
                                                                    <label>Specificare il numero di versamenti da inviare</label>
                                                                    <select title="Scegli una opzione" id="dropdownNumVersamenti" name="dropdownNumVersamenti">
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
                                            <div class="form-group col-md-6" id="bloccoVersamento1">
                                                <div class="card-wrapper card-space">
                                                    <div class="card card-bg">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Dati singolo versamento 1</h5><br/>
                                                            <div class="form-group col-md-12">
                                                                <label for="importoSingoloVersamento1" class="input-number-label">importoSingoloVersamento</label>
                                                                <span class="input-number input-number-currency">
                                                                    <input type="number" id="importoSingoloVersamento1" name="importoSingoloVersamento1" value="{$IMPORTOPGAMENTO1}" min="0" step="0.01">
                                                                    <button class="input-number-add">
                                                                        <span class="sr-only">Aumenta valore Euro</span>
                                                                    </button>
                                                                    <button class="input-number-sub">
                                                                        <span class="sr-only">Diminuisci valore Euro</span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="ibanAccredito1" name="ibanAccredito1"
                                                                       placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                <label for="ibanAccredito1">ibanAccredito</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control"
                                                                       id="ibanAppoggio1" name="ibanAppoggio1"
                                                                       placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                <label for="ibanAppoggio1">ibanAppoggio</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="credenzialiPagatore1" name="credenzialiPagatore1"
                                                                       placeholder="credenzialiPagatore" value="n/a">
                                                                <label for="credenzialiPagatore1">credenzialiPagatore</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="causaleVersamento1" name="causaleVersamento1"
                                                                       placeholder="causaleVersamento" value="{$CAUSALE1}">
                                                                <label for="causaleVersamento1">causaleVersamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="datiSpecificiRiscossione1" name="datiSpecificiRiscossione1"
                                                                       placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                <label for="datiSpecificiRiscossione1">datiSpecificiRiscossione</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end singolo versamento-->

                                            <!--start singolo versamento-->
                                            <div class="form-group col-md-6" id="bloccoVersamento2">
                                                <div class="card-wrapper card-space">
                                                    <div class="card card-bg">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Dati singolo versamento 2</h5><br/>
                                                            <div class="form-group col-md-12">
                                                                <label for="importoSingoloVersamento2" class="input-number-label">importoSingoloVersamento</label>
                                                                <span class="input-number input-number-currency">
                                                                    <input type="number" id="importoSingoloVersamento2" name="importoSingoloVersamento2" value="{$IMPORTOPGAMENTO2}" min="0" step="0.01">
                                                                    <button class="input-number-add">
                                                                        <span class="sr-only">Aumenta valore Euro</span>
                                                                    </button>
                                                                    <button class="input-number-sub">
                                                                        <span class="sr-only">Diminuisci valore Euro</span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="ibanAccredito2" name="ibanAccredito2"
                                                                       placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                <label for="ibanAccredito2">ibanAccredito</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control"
                                                                       id="ibanAppoggio2" name="ibanAppoggio2"
                                                                       placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                <label for="ibanAppoggio2">ibanAppoggio</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="credenzialiPagatore2" name="credenzialiPagatore2"
                                                                       placeholder="credenzialiPagatore" value="n/a">
                                                                <label for="credenzialiPagatore2">credenzialiPagatore</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="causaleVersamento2" name="causaleVersamento2"
                                                                       placeholder="causaleVersamento" value="{$CAUSALE2}">
                                                                <label for="causaleVersamento2">causaleVersamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="datiSpecificiRiscossione2" name="datiSpecificiRiscossione2"
                                                                       placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                <label for="datiSpecificiRiscossione2">datiSpecificiRiscossione</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end singolo versamento-->

                                            <!--start singolo versamento-->
                                            <div class="form-group col-md-6" id="bloccoVersamento3">
                                                <div class="card-wrapper card-space">
                                                    <div class="card card-bg">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Dati singolo versamento 3</h5><br/>
                                                            <div class="form-group col-md-12">
                                                                <label for="importoSingoloVersamento3" class="input-number-label">importoSingoloVersamento</label>
                                                                <span class="input-number input-number-currency">
                                                                    <input type="number" id="importoSingoloVersamento3" name="importoSingoloVersamento3" value="{$IMPORTOPGAMENTO3}" min="0" step="0.01">
                                                                    <button class="input-number-add">
                                                                        <span class="sr-only">Aumenta valore Euro</span>
                                                                    </button>
                                                                    <button class="input-number-sub">
                                                                        <span class="sr-only">Diminuisci valore Euro</span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="ibanAccredito3" name="ibanAccredito3"
                                                                       placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                <label for="ibanAccredito3">ibanAccredito</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control"
                                                                       id="ibanAppoggio3" name="ibanAppoggio3"
                                                                       placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                <label for="ibanAppoggio3">ibanAppoggio</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="credenzialiPagatore3" name="credenzialiPagatore3"
                                                                       placeholder="credenzialiPagatore" value="n/a">
                                                                <label for="credenzialiPagatore3">credenzialiPagatore</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="causaleVersamento3" name="causaleVersamento3"
                                                                       placeholder="causaleVersamento" value="{$CAUSALE3}">
                                                                <label for="causaleVersamento3">causaleVersamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="datiSpecificiRiscossione3" name="datiSpecificiRiscossione3"
                                                                       placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                <label for="datiSpecificiRiscossione3">datiSpecificiRiscossione</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end singolo versamento-->

                                            <!--start singolo versamento-->
                                            <div class="form-group col-md-6" id="bloccoVersamento4">
                                                <div class="card-wrapper card-space">
                                                    <div class="card card-bg">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Dati singolo versamento 4</h5><br/>
                                                            <div class="form-group col-md-12">
                                                                <label for="importoSingoloVersamento4" class="input-number-label">importoSingoloVersamento</label>
                                                                <span class="input-number input-number-currency">
                                                                    <input type="number" id="importoSingoloVersamento4" name="importoSingoloVersamento4" value="{$IMPORTOPGAMENTO4}" min="0" step="0.01">
                                                                    <button class="input-number-add">
                                                                        <span class="sr-only">Aumenta valore Euro</span>
                                                                    </button>
                                                                    <button class="input-number-sub">
                                                                        <span class="sr-only">Diminuisci valore Euro</span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="ibanAccredito4" name="ibanAccredito4"
                                                                       placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                <label for="ibanAccredito4">ibanAccredito</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control"
                                                                       id="ibanAppoggio4" name="ibanAppoggio4"
                                                                       placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                <label for="ibanAppoggio4">ibanAppoggio</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="credenzialiPagatore4" name="credenzialiPagatore4"
                                                                       placeholder="credenzialiPagatore" value="n/a">
                                                                <label for="credenzialiPagatore4">credenzialiPagatore</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="causaleVersamento4" name="causaleVersamento4"
                                                                       placeholder="causaleVersamento" value="{$CAUSALE4}">
                                                                <label for="causaleVersamento4">causaleVersamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="datiSpecificiRiscossione4" name="datiSpecificiRiscossione4"
                                                                       placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                <label for="datiSpecificiRiscossione4">datiSpecificiRiscossione</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end singolo versamento-->

                                            <!--start singolo versamento-->
                                            <div class="form-group col-md-6" id="bloccoVersamento5">
                                                <div class="card-wrapper card-space">
                                                    <div class="card card-bg">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Dati singolo versamento 5</h5><br/>
                                                            <div class="form-group col-md-12">
                                                                <label for="importoSingoloVersamento5" class="input-number-label">importoSingoloVersamento</label>
                                                                <span class="input-number input-number-currency">
                                                                    <input type="number" id="importoSingoloVersamento5" name="importoSingoloVersamento5" value="{$IMPORTOPGAMENTO5}" min="0" step="0.01">
                                                                    <button class="input-number-add">
                                                                        <span class="sr-only">Aumenta valore Euro</span>
                                                                    </button>
                                                                    <button class="input-number-sub">
                                                                        <span class="sr-only">Diminuisci valore Euro</span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="ibanAccredito5" name="ibanAccredito5"
                                                                       placeholder="ibanAccredito" value="IT30N0103076271000001823603">
                                                                <label for="ibanAccredito5">ibanAccredito</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control"
                                                                       id="ibanAppoggio5" name="ibanAppoggio5"
                                                                       placeholder="ibanAppoggio" value="IT57N0760114800000011050036">
                                                                <label for="ibanAppoggio5">ibanAppoggio</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="credenzialiPagatore5" name="credenzialiPagatore5"
                                                                       placeholder="credenzialiPagatore" value="n/a">
                                                                <label for="credenzialiPagatore5">credenzialiPagatore</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="causaleVersamento5" name="causaleVersamento5"
                                                                       placeholder="causaleVersamento" value="{$CAUSALE5}">
                                                                <label for="causaleVersamento5">causaleVersamento</label>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <input type="text" class="form-control" id="datiSpecificiRiscossione5" name="datiSpecificiRiscossione5"
                                                                       placeholder="datiSpecificiRiscossione" value="9/abcdefg">
                                                                <label for="datiSpecificiRiscossione5">datiSpecificiRiscossione</label>
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
