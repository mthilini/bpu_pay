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
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php $this->registerCsrfMetaTags() ?>


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
        body, .dropdown-item, .dropdown-item-title, .input-group > .input-group-prepend > .input-group-text {
            font-size: 70%;
        }

        .dropdown-item-title, .text-sm {
            font-size: 100% !important;
        }

        .table th, .table td {
            padding: 0.2rem;
        }

        .content-header h1, h2, h3, h5, h6 {
            font-size: 130%;
        }

        h1, h2, h3, h5, h6 {
            font-size: 100%;
        }

        .navbar, .content-header {
            padding: 0 0 0 0;
        }

        table.dataTable tbody th, table.dataTable tbody td {
            padding: 2px 5px;
        }

        table.dataTable thead th, table.dataTable thead td {
            padding: 10px 5px;
        }

        .table th, .table td {
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
            height: 2rem;
        }

        .input-group-sm > .form-control:not(textarea), .form-control {
            height: calc(1.375rem + 2px);
        }

        .card-body {
            padding: 0.5rem;
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
        $(document).ready(function () {
            new DataTable('#datatable');
        });
    </script>
    <style src="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap4.css"></style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap4.js"></script>
</body>
</html>
<?php $this->endPage() ?>
