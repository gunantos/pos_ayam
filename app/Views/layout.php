<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title><?= isset($title) ? $title : APP_NAME ?></title>
    <link rel="apple-touch-icon" href="<?= base_url('assets/images/ico/apple-icon-120.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/ico/favicon.ico') ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/ui/prism.min.css') ?>">
    <?= $this->renderSection('head_vendor') ?>
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css') ?>">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/core/menu/menu-types/vertical-menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/core/colors/palette-gradient.css') ?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <!-- END Custom CSS-->
    <?= $this->renderSection('head') ?>
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="<?= base_url() ?>"><img class="brand-logo" alt="robust admin logo" src="<?= base_url('assets/images/logo/logo-light-sm.png') ?>">
                <h3 class="brand-text"><?= APP_NAME ?></h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
               <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i class="ft-menu">         </i></a></li>
            </ul>
            <ul class="nav navbar-nav float-right"> 
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="<?= base_url('assets/images/portrait/small/avatar-s-1.png') ?>" alt="avatar"><i></i></span><span class="user-name"><?= user() ? user()->username : 'Admin' ?></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <?= $this->render('sidebar') ?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"><?= isset($title) ? $title : APP_NAME ?></h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <?php
                    $bread = ['dashboard'];
                    $bread_home = ['dashboard', '/', 'home'];

                    if (isset($breadcumb)) {
                      if (is_array($breadcumb)) 
                      {
                        for($i = 0; $i < sizeof($breadcumb); $i++) {
                          if (!in_array($breadcumb, $bread_home) && !in_array($breadcumb, $bread)) {
                            array_push($bread, $breadcumb);
                          }
                        }
                      } else {
                        if (!in_array($breadcumb, $bread_home) && !in_array($breadcumb, $bread)) {
                          array_push($bread, $breadcumb);
                        }
                      }
                    }
                    if (sizeof($bread) < 2) {
                      $currentUrl = str_replace(base_url(), '', current_url());
                      $currentUrl = str_replace('index.php', '', $currentUrl);
                      $currentUrl = ltrim($currentUrl, '/');
                      $currentUrl = rtrim($currentUrl, '/');
                      array_push($bread, str_replace('-', ' ', $currentUrl));
                    }
                        for($i = 0; $i < sizeof($bread); $i++) {
                            if (in_array($bread[$i], $bread_home)) {
                              $uribread = base_url();
                            } else {
                              $uribread =  base_url(strtolower($bread[$i]));
                            }
                            if ($i == (sizeof($bread) - 1)) {
                              echo '<li class="breadcrumb-item active"><a href="#">'. ucwords($bread[$i]) .'</a></li>';
                            } else {
                               echo '<li class="breadcrumb-item"><a href="'. $uribread .'">'. ucwords($bread[$i]) .'</a></li>';
                            }
                        }
                      
                  ?>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-4 col-12">
            <?= $this->renderSection('headerRight') ?>
            
          </div>
        </div>
        <div class="content-body">
            <?= $this->renderSection('content') ?>
<!--/ HTML Markup -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/vendors/js/vendors.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/js/ui/prism.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?= $this->renderSection('script_vendor') ?>
    <script src="<?= base_url('assets/js/core/app-menu.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/app.js') ?>"></script>
    <?= $this->renderSection('script') ?>
  </body>
</html>