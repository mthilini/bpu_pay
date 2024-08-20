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
<div class="acct-bankaccts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        $CBkModel = new AcctBankaccts(),
        //$bankName = $bankModel->getBankName($model->fundBankCode);
        'filterModel' => $CBkModel->$searchModel,
        'rowOptions' => ['style' => 'height:20px;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' =>'bactAcctCode',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' =>'bactAcctName',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:300px;']
            ],
            [
                'attribute' =>'bactBankCode',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:120px;']
            ],
            [
                'attribute' =>'bactBankName',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:550px;']
            ],
            [
                'attribute' =>'bactAcctNo',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            //'bactVoucher',
            //'bactReceipt',
            //'bactJournal',
            //'bactCBkLedg',
            //'bactPayable1',
            //'bactPayable2',
            //'bactPayable3',
            //'bactPayable4',
            //'bactPayable5',
            //'bactPayable6',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}','headerOptions' => ['style' => 'width:80px'],
                //'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}', 'header' => 'Actions',
                //           'headerOptions' => ['style' => 'color:red'],
                //'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctBankaccts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
