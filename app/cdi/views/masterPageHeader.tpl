<!DOCTYPE html>
<html lang="it">
<head>

  <title>{$page_title}</title>

  <!-- Required meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Mock del Nodo dei Pagamenti SPC">
  <meta name="author" content="pagoPA">

  <!-- CSS -->
  <link rel="stylesheet" href="views/bootstrap-italia/css/bootstrap-italia.min.css">

</head>

<body>

    <!-- Content
    ================================================== -->



        <!-- Header -->
        <div class="it-header-slim-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-slim-wrapper-content">
                            <a class="d-none d-lg-block navbar-brand" href="index.php">PagoPA S.p.A.</a>
                            <div class="nav-mobile">
                                <nav>
                                    <a class="it-opener d-lg-none" data-toggle="collapse" href="#menu1" role="button" aria-expanded="false" aria-controls="menu1">
                                        <span>Ente appartenenza/Owner</span>
                                        <svg class="icon">
                                            <use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-expand"></use>
                                        </svg>
                                    </a>
                                </nav>
                            </div>
                            <div class="header-slim-right-zone">
                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        <span>Ita</span>
                                        <svg class="icon d-none d-lg-block">
                                            <use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-expand"></use>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="link-list-wrapper">
                                                    <ul class="link-list">
                                                        <li><a class="list-item" href="#"><span>ITA</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="it-access-top-wrapper">
                                    <button class="btn btn-primary btn-sm" href="#" type="button">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <div class="it-header-center-wrapper" style="height: 100px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="it-header-center-content-wrapper">
                        <div class="it-brand-wrapper">
                            <a href="index.php" class="">
                                <div class="it-brand-text">
                                    <h2 class="no_toc">pagoPA</h2>
                                    <h3 class="no_toc d-none d-md-block">
                                        Mock Server
                                    </h3>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="it-header-navbar-wrapper">
        <nav class="navbar navbar-expand-lg has-megamenu">
            <button class="custom-navbar-toggler" type="button" aria-controls="navbarNavEi" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarNavEi">
                <svg class="icon icon-sm icon-light"><use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-list"></use></svg>
            </button>
            <div class="navbar-collapsable" id="navbarNavEi">
                <div class="overlay"></div>
                <div class="close-div sr-only">
                    <button class="btn close-menu" type="button">
                        <svg class="icon icon-sm icon-light"><use xlink:href="views/bootstrap-italia/svg/sprite.svg#it-close"></use></svg>close
                    </button>
                </div>
                <div class="menu-wrapper">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown megamenu">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><span>Primitive del NodoSPC</span></a>
                            <div class="dropdown-menu">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="link-list-wrapper">
                                            <ul class="link-list">
                                                <li>
                                                    <h3 class="no_toc">PA Virtuale</h3>
                                                </li>
                                                <li><a class="list-item" href="nodoInviaRPT.php" title="nodoInviaRPT - Singola RTP fino a 5 versamenti"><span>nodoInviaRPT - Singola RTP fino a 5 versamenti</span></a>
                                                </li>
                                                <li><a class="list-item" href="nodoInviaCarrelloRPTeBollo.php" title="nodoInviaCarrelloRPT - Multi RPT con beneficiari multipli e bollo"><span>nodoInviaCarrelloRPT - Multi RPT con beneficiari multipli e bollo</span></a>
                                                </li>
                                                <li><a class="list-item" href="nodoChiediInformativaPSP.php" title="nodoChiediInformativaPSP - Elenco dei cataloghi dati informativi"><span>nodoChiediInformativaPSP - Elenco dei cataloghi dati informativi</span></a>
                                                </li>
                                                <li><a class="list-item" href="nodoChiediStatoRPT.php" title="nodoChiediStatoRPT - Stato di una RPT"><span>nodoChiediStatoRPT - Stato di una RPT</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="link-list-wrapper">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown megamenu">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><span>Strumenti</span></a>
                            <div class="dropdown-menu">
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="link-list-wrapper">
                                            <ul class="link-list">
                                                <li>
                                                    <h3 class="no_toc">Catalogo Dati</h3>
                                                </li>
                                                <li><a class="list-item" href="verificaCatalogoXML.php"><span>Verifica del CDI di un PSP</span></a>
                                                </li>
												
												<li>
                                                    <h3 class="no_toc">Monitoraggio</h3>
                                                </li>
                                                <li><a class="list-item" href="logFileList.php"><span>File di Log del server</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

