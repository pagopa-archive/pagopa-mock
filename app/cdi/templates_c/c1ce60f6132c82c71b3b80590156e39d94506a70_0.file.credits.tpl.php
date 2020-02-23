<?php
/* Smarty version 3.1.33, created on 2019-10-16 11:34:17
  from '/var/www/html/moc/cdi/views/credits.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da6e41948b3c4_58018202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1ce60f6132c82c71b3b80590156e39d94506a70' => 
    array (
      0 => '/var/www/html/moc/cdi/views/credits.tpl',
      1 => 1565171084,
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
function content_5da6e41948b3c4_58018202 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Server Mock di pagoPA</h1>
                <div style="min-height: 300px;">

                    <p>Il server Mock di pagoPA è stato realizzato dal team di pagoPA composto da: </p>
                    <ul>
                        <li>Giulia Montanelli</li>
                        <li>Daniele Landro</li>
                        <li>Gianni Papetti</li>
                        <li>Mauro Bracalari</li>
                        <li>Mario Gammaldi</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
