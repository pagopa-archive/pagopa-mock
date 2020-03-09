{include file="views/masterPageHeader.tpl"}


<!-- Content
================================================== -->

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-md-9">

            <h1 class="page-header mb-4">
                Primitiva nodoChiediStatoRPT
            </h1>

            <div>
                <form method="post" action="nodoChiediStatoRPT.php" id="formInviaRPT" autocomplete="off">
                    <input type="hidden" name="page" value="1"/>

                    <div class="p-3 mb-2 bg-secondary text-white">Inserire i parametri della richiesta <i>nodoChiediStatoRPT</i>
                    </div>
                    <legend class="text-primary">Individuazione della richiesta</legend>
                    <br/>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control"
                                   id="identificativoUnivocoVersamento" name="identificativoUnivocoVersamento"
                                   placeholder="Inserire l'Identificativo Univoco Versamento" value="">
                            <label for="identificativoUnivocoVersamento">identificativoUnivocoVersamento</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="codiceContestoPagamento" name="codiceContestoPagamento"
                                   placeholder="Inserire il Codice Contesto Pagamento" value="">
                            <label for="codiceContestoPagamento">codiceContestoPagamento</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col text-center">
                            <button type="button" class="btn btn-outline-primary">Annulla</button>
                            <button type="submit" class="btn btn-primary">Invia la richiesta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{include file="views/masterPageFooter.tpl"}
{include file="views/masterPageScript.tpl"}
