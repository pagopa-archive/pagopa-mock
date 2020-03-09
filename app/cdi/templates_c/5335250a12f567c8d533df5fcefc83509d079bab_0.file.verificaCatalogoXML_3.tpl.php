<?php
/* Smarty version 3.1.33, created on 2019-06-10 11:19:57
  from '/var/www/html/moc/cdi/views/verificaCatalogoXML_3.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfe20bd9518b4_59804323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5335250a12f567c8d533df5fcefc83509d079bab' => 
    array (
      0 => '/var/www/html/moc/cdi/views/verificaCatalogoXML_3.tpl',
      1 => 1560152961,
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
function content_5cfe20bd9518b4_59804323 (Smarty_Internal_Template $_smarty_tpl) {
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
