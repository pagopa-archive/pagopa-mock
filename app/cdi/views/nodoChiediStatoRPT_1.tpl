{include file="views/masterPageHeader.tpl"}
{include file="views/masterPrettyPrint.tpl"}


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header mb-4">
                    Esito della SOAP Action <i>nodoChiediStatoRPT</i>
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
                            <div class="w3-example col-12">
                                <h2>Timeline degli stati della RPT</h2>
                                <!-- List-->
                                <div class="it-timeline-wrapper">
                                    <div class="row">
                                        {foreach from=$itemStorico item=i}
                                                <div class="col-12">
                                                    <div class="timeline-element">
                                                        <div class="it-pin-wrapper">
                                                            <div class="pin-icon">
                                                                <svg class="icon">
                                                                    <use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-code-circle"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="pin-text"><span>{$i.data}</span></div>
                                                        </div>
                                                        <div class="card-wrapper">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{$i.stato}</h5>
                                                                    <p class="card-text">{$i.descrizione}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        {/foreach}
                                    </div>
                                </div>
                                <!-- -->
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