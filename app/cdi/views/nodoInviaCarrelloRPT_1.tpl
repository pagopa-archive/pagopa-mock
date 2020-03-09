{include file="views/masterPageHeader.tpl"}
{include file="views/masterPrettyPrint.tpl"}


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
                                <div w3-code htmlHigh class="text-justify text-primary"> {$xsdCheck} </div><br/>
                                <div w3-code htmlHigh class="text-justify text-primary">

                                    <table class="table table-striped table-hover w-50">
                                        <thead>
                                        <tr>
                                            <th scope="col">Variabile</th>
                                            <th scope="col">Valore</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {$tableContent}
                                        </tbody>
                                    </table>

                                </div><br/>
                                <div w3-code htmlHigh class="text-justify text-danger"> {$errorMessage} </div><br/>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-header" id="heading2">
                        <button data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            <b>Lista delle RPT</b>
                        </button>
                    </div>
                    <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2">
                        {for $iterRPT=1 to $numRPTView}
                            <div class="collapse-body">
                                <div class="w3-example col-12">
                                    <h2>Contenuto RPT {$iterRPT}</h2>
                                    <div w3-code htmlHigh class="text-justify"><pre class="brush: xml"> {$rptXmlContent{$iterRPT}} </pre></div><br/>
                                </div>
                            </div>
                        {/for}                                              
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
                                <div w3-code htmlHigh class="text-justify"><pre class="brush: xml"> {$xmlRequestContent} </pre></div><br/>
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
                                <div w3-code htmlHigh class="text-justify"><pre class="brush: xml"> {$xmlResponseContent} </pre></div><br/>
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
                                <div w3-code htmlHigh class="text-justify"><p class="text-justify"> {$xmlLogContent} </p></div><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


{include file="views/masterPageFooter.tpl"}
{include file="views/masterPageScript.tpl"}