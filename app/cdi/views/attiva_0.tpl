{include file="views/masterPageHeader.tpl"}


<!-- Content
================================================== -->

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-md-9">

            <h1 class="page-header mb-4">
                Primitiva Attiva PSP
            </h1>

            <div>
                <form method="post" action="attiva.php" id="formInviaRPT" autocomplete="off">
                    <input type="hidden" name="page" value="1"/>

                    <div class="p-3 mb-2 bg-secondary text-white">Inserire i parametri della richiesta di <i>Attiva PSP</i>
                    </div>
                    <legend class="text-primary">Parametri</legend>
                    <br/>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="identificativoPSP" name="identificativoPSP"
                                   placeholder="identificativoPSP" value="">
                            <label for="identificativoPSP">identificativoPSP</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="identificativoIntermediarioPSP"name="identificativoIntermediarioPSP"
                                   placeholder="identificativoIntermediarioPSP" value="">
                            <label for="identificativoIntermediarioPSP">identificativoIntermediarioPSP</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="identificativoCanale"name="identificativoCanale"
                                   placeholder="identificativoCanale" value="">
                            <label for="identificativoCanale">identificativoCanale</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="password" name="password"
                                   placeholder="password" value="">
                            <label for="password">password</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="codiceContestoPagamento" name="codiceContestoPagamento"
                                   placeholder="codiceContestoPagamento" value="">
                            <label for="codiceContestoPagamento">codiceContestoPagamento</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="identificativoIntermediarioPSPPagamento" name="identificativoIntermediarioPSPPagamento"
                                   placeholder="identificativoIntermediarioPSPPagamento" value="">
                            <label for="identificativoIntermediarioPSPPagamento">identificativoIntermediarioPSPPagamento</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="identificativoCanalePagamento" name="identificativoCanalePagamento"
                                   placeholder="identificativoCanalePagamento" value="">
                            <label for="identificativoCanalePagamento">identificativoCanalePagamento</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="CodStazPA"name="CodStazPA"
                                   placeholder="CodStazPA" value="">
                            <label for="CodStazPA">CodStazPA</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="AuxDigit"name="AuxDigit"
                                   placeholder="AuxDigit" value="">
                            <label for="AuxDigit">AuxDigit</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="CodIUV"name="CodIUV"
                                   placeholder="CodIUV" value="">
                            <label for="CodIUV">CodIUV</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="importoSingoloVersamento"name="importoSingoloVersamento"
                                   placeholder="importoSingoloVersamento" value="">
                            <label for="importoSingoloVersamento">importoSingoloVersamento</label>
                        </div>
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
