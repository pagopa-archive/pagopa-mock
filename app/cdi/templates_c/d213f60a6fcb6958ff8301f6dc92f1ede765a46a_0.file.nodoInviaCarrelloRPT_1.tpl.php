<?php
/* Smarty version 3.1.33, created on 2019-06-17 14:04:55
  from '/var/www/html/moc/cdi/views/nodoInviaCarrelloRPT_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0781e7c6fda3_14890213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd213f60a6fcb6958ff8301f6dc92f1ede765a46a' => 
    array (
      0 => '/var/www/html/moc/cdi/views/nodoInviaCarrelloRPT_1.tpl',
      1 => 1560700966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/masterPageHeader.tpl' => 1,
    'file:views/masterPrettyPrint.tpl' => 1,
    'file:views/masterPageFooter.tpl' => 1,
    'file:views/masterPageScript.tpl' => 1,
  ),
),false)) {
function content_5d0781e7c6fda3_14890213 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPrettyPrint.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header mb-4">
                    Esito della SOAP Action <i>nodoInviaCarrelloRPT</i>
                </h1>

                <div id="collapseDiv1" class="collapse-div" role="tablist">
                    <div class="collapse-header" id="heading1">
                        <button data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            <b>Riepilogo della risposta del NodoSPC</b>
                        </button>
                    </div>
                    <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1">
                        <div class="collapse-body">
                            <div class="w3-example col-12">
                                <h2>Sintesi della risposta del Nodo</h2>
                                <div w3-code htmlHigh class="text-justify text-primary"> <?php echo $_smarty_tpl->tpl_vars['xsdCheck']->value;?>
 </div><br/>
                                <div w3-code htmlHigh class="text-justify text-primary">

                                    <table class="table table-striped table-hover w-50">
                                        <thead>
                                        <tr>
                                            <th scope="col">Variabile</th>
                                            <th scope="col">Valore</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $_smarty_tpl->tpl_vars['tableContent']->value;?>

                                        </tbody>
                                    </table>

                                </div><br/>
                                <div w3-code htmlHigh class="text-justify text-danger"> <?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
 </div><br/>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-header" id="heading2">
                        <button data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            <b>Lista delle RPT</b>
                        </button>
                    </div>
                    <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2">
                        <?php
$_smarty_tpl->tpl_vars['iterRPT'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['iterRPT']->step = 1;$_smarty_tpl->tpl_vars['iterRPT']->total = (int) ceil(($_smarty_tpl->tpl_vars['iterRPT']->step > 0 ? $_smarty_tpl->tpl_vars['numRPTView']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['numRPTView']->value)+1)/abs($_smarty_tpl->tpl_vars['iterRPT']->step));
if ($_smarty_tpl->tpl_vars['iterRPT']->total > 0) {
for ($_smarty_tpl->tpl_vars['iterRPT']->value = 1, $_smarty_tpl->tpl_vars['iterRPT']->iteration = 1;$_smarty_tpl->tpl_vars['iterRPT']->iteration <= $_smarty_tpl->tpl_vars['iterRPT']->total;$_smarty_tpl->tpl_vars['iterRPT']->value += $_smarty_tpl->tpl_vars['iterRPT']->step, $_smarty_tpl->tpl_vars['iterRPT']->iteration++) {
$_smarty_tpl->tpl_vars['iterRPT']->first = $_smarty_tpl->tpl_vars['iterRPT']->iteration === 1;$_smarty_tpl->tpl_vars['iterRPT']->last = $_smarty_tpl->tpl_vars['iterRPT']->iteration === $_smarty_tpl->tpl_vars['iterRPT']->total;?>
                            <div class="collapse-body">
                                <div class="w3-example col-12">
                                    <h2>Contenuto RPT <?php echo $_smarty_tpl->tpl_vars['iterRPT']->value;?>
</h2>
                                    <div w3-code htmlHigh class="text-justify"><pre class="brush: xml"> <?php echo $_smarty_tpl->tpl_vars['rptXmlContent'.($_smarty_tpl->tpl_vars['iterRPT']->value)]->value;?>
 </pre></div><br/>
                                </div>
                            </div>
                        <?php }
}
?>                                              
                    </div>
                    <div class="collapse-header" id="heading3">
                        <button data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            <b>Request</b>
                        </button>
                    </div>
                    <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="collapse-body">
                            <div class="w3-example col-12">
                                <h2>Contenuto della richiesta</h2>
                                <div w3-code htmlHigh class="text-justify"><pre class="brush: xml"> <?php echo $_smarty_tpl->tpl_vars['xmlRequestContent']->value;?>
 </pre></div><br/>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-header" id="heading4">
                        <button data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            <b>Response</b>
                        </button>
                    </div>
                    <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4">
                        <div class="collapse-body">
                            <div class="w3-example col-12">
                                <h2>Contenuto della risposta</h2>
                                <div w3-code htmlHigh class="text-justify"><pre class="brush: xml"> <?php echo $_smarty_tpl->tpl_vars['xmlResponseContent']->value;?>
 </pre></div><br/>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-header" id="heading5">
                        <button data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            <b>Log</b>
                        </button>
                    </div>
                    <div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5">
                        <div class="collapse-body">
                            <div class="w3-example col-12">
                                <h2>File di Log</h2>
                                <div w3-code htmlHigh class="text-justify"><p class="text-justify"> <?php echo $_smarty_tpl->tpl_vars['xmlLogContent']->value;?>
 </p></div><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $_smarty_tpl->_subTemplateRender("file:views/masterPageFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPageScript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
