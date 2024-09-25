<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$publishedRes = Yii::$app->assetManager->publish('@vendor/hail812/yii2-adminlte3/src/web/js');
$this->registerJsFile($publishedRes[1] . '/control_sidebar.js', ['depends' => '\hail812\adminlte3\assets\AdminLteAsset']);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php $this->registerCsrfMetaTags() ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <?php
    $this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
    $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
    $this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
    $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
    ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style>
        body,
        .dropdown-item,
        .dropdown-item-title,
        .input-group>.input-group-prepend>.input-group-text {
            font-size: 70%;
        }

        .dropdown-item-title,
        .text-sm {
            font-size: 100% !important;
        }

        .table th,
        .table td {
            padding: 0.2rem;
        }

        .content-header h1,
        h2,
        h3,
        h5,
        h6 {
            font-size: 130%;
        }

        h1,
        h2,
        h3,
        h5,
        h6 {
            font-size: 100%;
        }

        .navbar,
        .content-header {
            padding: 0 0 0 0;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 2px 5px;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 5px;
        }

        .table th,
        .table td {
            padding: 0.02rem 0rem;
        }

        .form-control {
            font-size: 100%;
            padding: 0 5px;
            height: calc(1.5em + 0.75rem + 2px);
        }

        label {
            margin: unset;
        }

        .form-group {
            margin-bottom: 0.25rem;
        }

        .main-header .nav-link {
            height: 1.75rem;
        }

        .input-group-sm>.form-control:not(textarea),
        .form-control {
            height: calc(1.375rem + 2px);
        }

        .card-body {
            padding: 0.5rem;
        }

        div.dt-container div.dt-length select {
            min-width: 50px;
        }

        .btn-sm {
            padding: .05rem .5rem;
        }

        .nav-link {
            padding: .25rem 0.5rem;
        }

        .navbar-expand .navbar-nav {
            padding-top: 0.25rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <?php $this->beginBody() ?>

    <div class="wrapper">
        <!-- Navbar -->
        <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <?= $this->render('control-sidebar') ?>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?= $this->render('footer') ?>
    </div>

    <?php $this->endBody() ?>

    <script>
        $(document).ready(function() {
            new DataTable('#datatable');
        });
    </script>
    <link href="https://cdn.datatables.net/v/bs4/jq-3.7.0/jszip-3.10.1/dt-2.1.4/b-3.1.1/b-colvis-3.1.1/b-html5-3.1.1/b-print-3.1.1/cr-2.0.4/date-1.5.3/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.0.5/sr-1.4.1/datatables.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/jszip-3.10.1/dt-2.1.4/b-3.1.1/b-colvis-3.1.1/b-html5-3.1.1/b-print-3.1.1/cr-2.0.4/date-1.5.3/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.0.5/sr-1.4.1/datatables.min.js"></script>
    <?php
    $this->registerJsFile('@web/js/server.js',);
    ?>
</body>

</html>
<?php $this->endPage() ?>