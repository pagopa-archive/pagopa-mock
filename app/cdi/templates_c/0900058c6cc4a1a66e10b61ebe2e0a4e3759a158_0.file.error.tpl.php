<?php
/* Smarty version 3.1.33, created on 2019-07-29 15:43:42
  from '/var/www/html/moc/cdi/views/error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3ef80f015f78_21501265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0900058c6cc4a1a66e10b61ebe2e0a4e3759a158' => 
    array (
      0 => '/var/www/html/moc/cdi/views/error.tpl',
      1 => 1560179072,
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
function content_5d3ef80f015f78_21501265 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Runtime error</h1>

                <p style="min-height: 150px;"><pre><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</pre></p>
            </div>
        </div>
    </div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
