<?php
/* Smarty version 3.1.33, created on 2019-06-17 18:09:16
  from '/var/www/html/moc/cdi/views/logFileList_0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d07bb2cef0365_24231745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '071dc5b809cd458e706ae784246ad825c6eaf849' => 
    array (
      0 => '/var/www/html/moc/cdi/views/logFileList_0.tpl',
      1 => 1560787744,
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
function content_5d07bb2cef0365_24231745 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Elenco dei file di log sul server mock</h1>

                <p style="min-height: 250px;"><?php echo $_smarty_tpl->tpl_vars['logList']->value;?>
</p>
            </div>
        </div>
    </div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
