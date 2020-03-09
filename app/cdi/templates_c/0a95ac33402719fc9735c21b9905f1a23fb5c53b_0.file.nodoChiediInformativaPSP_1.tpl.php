<?php
/* Smarty version 3.1.33, created on 2019-06-20 15:02:19
  from '/var/www/html/moc/cdi/views/nodoChiediInformativaPSP_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0b83dbf2c409_32837056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a95ac33402719fc9735c21b9905f1a23fb5c53b' => 
    array (
      0 => '/var/www/html/moc/cdi/views/nodoChiediInformativaPSP_1.tpl',
      1 => 1561035727,
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
function content_5d0b83dbf2c409_32837056 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:views/masterPageHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:views/masterPrettyPrint.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header mb-4">
                    Esito della SOAP Action <i>nodoChiediInformativaPSP</i>
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
                                <div w3-code htmlHigh class="text-justify text-primary">

                                    <p class="text-justify"><?php echo $_smarty_tpl->tpl_vars['urlFile']->value;?>
</p>

                                </div><br/>
                                <div w3-code htmlHigh class="text-justify text-danger"> <?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
 </div><br/>
                            </div>

                        </div>
                    </div>

                    <div class="collapse-header" id="heading2">
                        <button data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            <b>Informativa PSP</b>
                        </button>
                    </div>
                    <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="collapse-body">
                            <div class="w3-example col-12">
                                <h2>Elenco dei PSP</h2>
                                <div w3-code htmlHigh class="text-justify"><pre class="brush: xml"> <?php echo $_smarty_tpl->tpl_vars['xmlInformativa']->value;?>
 </pre></div><br/>
                            </div>
                        </div>
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
