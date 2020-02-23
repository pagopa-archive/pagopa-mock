<?php
/* Smarty version 3.1.33, created on 2019-06-04 14:49:35
  from '/var/www/html/moc/cdi/views/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf668df330099_16088816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fb27595b6918160f3dcd257a85cfe1bebd28a57' => 
    array (
      0 => '/var/www/html/moc/cdi/views/index.tpl',
      1 => 1558363512,
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
function content_5cf668df330099_16088816 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Dashboard <small>SISTEMA DI TEST</small></h1>
                <img src="views/images/TestIcon.png" alt="Sisteme di test del NodoSPC"/>
                <p style="min-height: 150px;">Il server Mock di pagoPA consente di simulare un Ente Creditore o un PSP nelle chiamate dei Web Services del NodoSPC.</p>
            </div>
        </div>
    </div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
