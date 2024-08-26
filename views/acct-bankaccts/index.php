<?php

use app\models\AcctBankaccts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctBankacctsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cashbook Details';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \nullref\datatable\DataTable::widget([
    'tableOptions' => [
        'class' => 'table',
    ],
    'columns' => [
        'id',
        'bactAcctCode',
        'bactBankCode',
        'bactBankName',
        'bactAcctNo',
        'bactAcctNo',
        'bactAcctName',
    ],
    'data' => $dataProvider->getModels(),
    'serverSide' => true,
    'ajax' => __DIR__ . '/web/acct-bankaccts',

]) ?>