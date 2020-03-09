{include file="views/masterPageHeader.tpl"}



    <!-- Content
    ================================================== -->

    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-9">

                <h1 class="page-header mb-4">
                    Esito della verifica del Catalogo Dati Informativo
                </h1>

                <p class="text-justify" style="min-height: 200px;">{$uploadResult|unescape:"htmlall"}</p>


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
