<?php
/* Smarty version 3.1.33, created on 2019-06-17 17:16:53
  from '/var/www/html/moc/cdi/views/nodoChiediStatoRPT_0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d07aee56e9167_17543768',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2949b0ac4eb77eee851651999734be13a56a3a6' => 
    array (
      0 => '/var/www/html/moc/cdi/views/nodoChiediStatoRPT_0.tpl',
      1 => 1560784360,
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
function content_5d07aee56e9167_17543768 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Content
================================================== -->

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-md-9">

            <h1 class="page-header mb-4">
                Primitiva nodoChiediStatoRPT
            </h1>

            <div>
                <form method="post" action="nodoChiediStatoRPT.php" id="formInviaRPT" autocomplete="off">
                    <input type="hidden" name="page" value="1"/>

                    <div class="p-3 mb-2 bg-secondary text-white">Inserire i parametri della richiesta <i>nodoChiediStatoRPT</i>
                    </div>
                    <legend class="text-primary">Individuazione della richiesta</legend>
                    <br/>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control"
                                   id="identificativoUnivocoVersamento" name="identificativoUnivocoVersamento"
                                   placeholder="Inserire l'Identificativo Univoco Versamento" value="">
                            <label for="identificativoUnivocoVersamento">identificativoUnivocoVersamento</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="codiceContestoPagamento" name="codiceContestoPagamento"
                                   placeholder="Inserire il Codice Contesto Pagamento" value="">
                            <label for="codiceContestoPagamento">codiceContestoPagamento</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col text-center">
                            <button type="button" class="btn btn-outline-primary">Annulla</button>
                            <button type="submit" class="btn btn-primary">Invia la richiesta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
