<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="P2P Recycler">
    <meta name="keywords" content="P2P Recycler P2PRecycler Investment Ghana Peer-to-Peer">
    <link rel="shortcut icon" href="<?=IMAGE_PATH?>favicon.ico"/>

    <!-- Title Page-->
    <title><?=$this->title?></title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=PUBLIC_URL?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=PUBLIC_URL?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?=PUBLIC_URL?>vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=CSS_URL?>/theme.css" rel="stylesheet" media="all">
    <link href="<?=CSS_URL?>/main.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
         <!-- PAGE CONTAINER-->


            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo">
                                <a href="">
                                    <h3 class="text-default"><?=ORG_NAME?></h3>
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item has-noti" data-toggle="modal" data-target="#scrollmodal">
                                    <i class="zmdi zmdi-notifications"></i>
                                </div>
                                <a href="<?=APP_URL?>logout" class="header-button-item mr-0 text-default">
                                    <i class="zmdi zmdi-power"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        
<!-- modal scroll -->
            <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scrollmodalLabel">
                                <p>You have <?=($this->notifs['rowCount'] ?? 0) ?> Notification(s)</p>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding: 0;">

                            <div class="spinner-border text-light"></div>
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="upgrademodal" tabindex="-1" role="dialog" aria-labelledby="upgrademodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scrollmodalLabel">
                                <p>You have <?=($this->notifs['rowCount'] ?? 0) ?> Upgade Request</p>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding: 0;">
                            <div class="sufee-alert alert alert-info">
                                <span class="badge badge-pill badge-info">NOTE</span>
                                &nbsp;Upgrade user only when you have received payments from them. Click on&nbsp;<strong>Decline</strong>&nbsp;if user delays payment.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal scroll -->

            <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        <div class="page-container2">