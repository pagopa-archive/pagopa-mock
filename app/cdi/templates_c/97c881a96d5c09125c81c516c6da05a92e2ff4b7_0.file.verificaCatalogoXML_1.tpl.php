<?php
/* Smarty version 3.1.33, created on 2019-06-05 08:11:54
  from '/var/www/html/moc/cdi/views/verificaCatalogoXML_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf75d2a8da293_59773993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97c881a96d5c09125c81c516c6da05a92e2ff4b7' => 
    array (
      0 => '/var/www/html/moc/cdi/views/verificaCatalogoXML_1.tpl',
      1 => 1558888870,
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
function content_5cf75d2a8da293_59773993 (Smarty_Internal_Template $_smarty_tpl) {
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

                <p class="text-justify" style="min-height: 200px;"><?php echo mb_convert_encoding($_smarty_tpl->tpl_vars['uploadResult']->value, 'UTF-8', 'HTML-ENTITIES');?>
</p>


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
