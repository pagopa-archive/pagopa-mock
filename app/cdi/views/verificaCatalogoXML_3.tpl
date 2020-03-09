{include file="views/masterPageHeader.tpl"}



    <!-- Content
    ================================================== -->

    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-9">

                <h1 class="page-header mb-4">
                    Esito della verifica del Catalogo Dati Informativo
                </h1>

                <!-- Sections -->
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <!--start card-->
                        <div class="card-wrapper card-space">
                            <div class="card card-bg">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Riepilogo controlli sul file XML</h5>
                                    <p class="text-justify">{$validationResult|unescape:"htmlall"}</p>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                </div>
                <!-- Sections -->

            </div>
        </div>
    </div>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>

{include file="views/masterPageFooter.tpl"}
{include file="views/masterPageScript.tpl"}
