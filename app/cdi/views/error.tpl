{include file="views/masterPageHeader.tpl"}


    <!-- Content
    ================================================== -->
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Runtime error</h1>

                <p style="min-height: 150px;"><pre>{$errorMessage}</pre></p>
            </div>
        </div>
    </div>


{include file="views/masterPageFooter.tpl"}
{include file="views/masterPageScript.tpl"}