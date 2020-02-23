<?php
/* Smarty version 3.1.33, created on 2019-06-10 11:15:58
  from '/var/www/html/moc/cdi/views/verificaCatalogoXML_2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfe1fce66d041_23337742',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c771daace8a2452439dbe987025d5c623f000fa2' => 
    array (
      0 => '/var/www/html/moc/cdi/views/verificaCatalogoXML_2.tpl',
      1 => 1560157953,
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
function content_5cfe1fce66d041_23337742 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



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
                                    <p class="text-justify"><?php echo mb_convert_encoding($_smarty_tpl->tpl_vars['validationResult']->value, 'UTF-8', 'HTML-ENTITIES');?>
</p>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <!--start card-->
                        <div class="card-wrapper card-space">
                            <div class="card card-bg">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Riepilogo informazioni del catalogo</h5>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Campo</th>
                                            <th scope="col">Valore</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo mb_convert_encoding($_smarty_tpl->tpl_vars['validationSummary']->value, 'UTF-8', 'HTML-ENTITIES');?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <!--start card-->
                        <div class="card-wrapper card-space">
                            <div class="card card-bg">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Riepilogo informazioni dei servizi</h5>
                                    <style>
                                        img.resize {
                                            max-width:80%;
                                            max-height:80%;
                                        }
                                    </style>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">identificativoCanale</th>
                                            <th scope="col">tipoVersamento</th>
                                            <th scope="col">modello</th>
                                            <th scope="col">nomeServizio</th>
                                            <th scope="col">logoServizio</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php echo mb_convert_encoding($_smarty_tpl->tpl_vars['serviceSummary']->value, 'UTF-8', 'HTML-ENTITIES');?>

                                        </tbody>
                                    </table>
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


    <?php echo '<script'; ?>
>
        function goBack() {
            window.history.back();
        }
    <?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
