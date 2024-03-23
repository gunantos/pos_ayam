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
    <?= $this->renderSection('header') ?>
  </head>
  <body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-body">
            <section class="flexbox-container">
            <?= $this->renderSection('main') ?>
</section>
        </div>
    </div>
    </div>

    <script src="<?= base_url('assets/vendors/js/vendors.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/js/ui/prism.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/app-menu.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/app.js') ?>"></script>
    <?= $this->renderSection('script') ?>
  </body>
</html>