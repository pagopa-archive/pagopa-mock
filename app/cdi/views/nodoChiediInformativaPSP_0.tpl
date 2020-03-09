{include file="views/masterPageHeader.tpl"}


<!-- Content
================================================== -->

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-md-9">

            <h1 class="page-header mb-4">
                Primitiva nodoChiediInformativaPSP
            </h1>

            <div>
                <form method="post" action="nodoChiediInformativaPSP.php" id="formChiediInf" autocomplete="off">
                    <input type="hidden" name="page" value="1"/>

                    <div class="p-3 mb-2 bg-secondary text-white">La primitiva <i>nodoChiediInformativaPSP</i> non ha parametri in ingresso. </div>

                    <div class="form-row">
                        <div class="form-group col text-center">
                            <button type="submit" class="btn btn-primary">Richiedi informativa</button>
                        </div>
                    </div>
                    <div><p class="min-vh-100"> </p></div>
                </form>
            </div>
        </div>
    </div>
</div>


{include file="views/masterPageFooter.tpl"}
{include file="views/masterPageScript.tpl"}
