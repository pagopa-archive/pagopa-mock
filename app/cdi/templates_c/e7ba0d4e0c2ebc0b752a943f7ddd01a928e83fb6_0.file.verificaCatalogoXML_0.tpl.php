<?php
/* Smarty version 3.1.33, created on 2019-06-10 09:18:45
  from '/var/www/html/moc/cdi/views/verificaCatalogoXML_0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfe04554b4686_89724141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7ba0d4e0c2ebc0b752a943f7ddd01a928e83fb6' => 
    array (
      0 => '/var/www/html/moc/cdi/views/verificaCatalogoXML_0.tpl',
      1 => 1560113545,
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
function content_5cfe04554b4686_89724141 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



    <!-- Content
    ================================================== -->
    <!-- Dropzone -->
    <link rel="stylesheet" href="views/dropzone/dropzone.css">
    <?php echo '<script'; ?>
 src="views/dropzone/dropzone.js"><?php echo '</script'; ?>
>

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



<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
