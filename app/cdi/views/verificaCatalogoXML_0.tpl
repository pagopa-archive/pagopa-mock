{include file="views/masterPageHeader.tpl"}



    <!-- Content
    ================================================== -->
    <!-- Dropzone -->
    <link rel="stylesheet" href="views/dropzone/dropzone.css">
    <script src="views/dropzone/dropzone.js"></script>

    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-9">

                <h1 class="page-header mb-4">
                    Verifica del catalogo informativo di un PSP
                </h1>

                <p class="text-justify">Selezionare il file XML relativo al catalogo dati informativo da verificare.</p>


                <form method="post" action="verificaCatalogoXML.php" class="dropzone" enctype="multipart/form-data" id="my-awesome-dropzone">
                    <input type="hidden" name="page" value="1"/>
                    <div class="dz-message needsclick" data-dz-message>
                        <span>Trascinare il file da caricare oppure fare clic per selezionarlo</span>
                    </div>
                </form>

                <form method="post" action="verificaCatalogoXML.php" >
                    <input type="hidden" name="page" value="2"/>

                    <div class="row justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Verifica il catalogo" />
                    </div>

                </form>


            </div>
        </div>
    </div>



{include file="views/masterPageFooter.tpl"}
{include file="views/masterPageScript.tpl"}
