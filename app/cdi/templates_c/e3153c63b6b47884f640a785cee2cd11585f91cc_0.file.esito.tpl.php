<?php
/* Smarty version 3.1.33, created on 2019-06-19 14:20:53
  from '/var/www/html/moc/cdi/views/esito.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0a28a54e0922_90181033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3153c63b6b47884f640a785cee2cd11585f91cc' => 
    array (
      0 => '/var/www/html/moc/cdi/views/esito.tpl',
      1 => 1560779768,
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
function content_5d0a28a54e0922_90181033 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Esito della transazione</h1>

                <p style="min-height: 150px;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>

                <p style="min-height: 150px;"><a href="index.php">Torna indietro alla home</a></p>
            </div>
        </div>
    </div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
