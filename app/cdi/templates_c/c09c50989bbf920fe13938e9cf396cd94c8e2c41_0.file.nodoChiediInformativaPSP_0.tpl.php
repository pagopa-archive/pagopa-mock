<?php
/* Smarty version 3.1.33, created on 2019-06-20 13:46:51
  from '/var/www/html/moc/cdi/views/nodoChiediInformativaPSP_0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0b722b2d79d2_38192360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c09c50989bbf920fe13938e9cf396cd94c8e2c41' => 
    array (
      0 => '/var/www/html/moc/cdi/views/nodoChiediInformativaPSP_0.tpl',
      1 => 1561020259,
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
function content_5d0b722b2d79d2_38192360 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Content
================================================== -->

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-md-9">

            <h1 class="page-header mb-4">
                Primitiva nodoChiediInformativaPSP
            </h1>

            <div>
                <form method="post" action="nodoChiediInformativaPSP.php" id="formChiediInf" autocomplete="off">
                    <input type="hidden" name="page" value="1"/>

                    <div class="p-3 mb-2 bg-secondary text-white">La primitiva <i>nodoChiediInformativaPSP</i> non ha parametri in ingresso. </div>

                    <div class="form-row">
                        <div class="form-group col text-center">
                            <button type="submit" class="btn btn-primary">Richiedi informativa</button>
                        </div>
                    </div>
                    <div><p class="min-vh-100"> </p></div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
