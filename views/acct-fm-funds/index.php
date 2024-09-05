<?php

use app\models\AcctFmFunds;
use app\models\PayBank;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctFmFundsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fund Management Types';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-fm-funds-index">

    <p>
        <?= Html::a('New Fund Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'fundCode',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:120px;']
            ],
            [
                'attribute' => 'fundName',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:200px;']
            ],
            [
                'attribute' => 'fundBankType',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:120px;']
            ],
            [
                'attribute' => 'fundBankCode',
                'label' => 'Bank Name',
                'value' =>  function ($model) {
                    $bankModel = new PayBank();
                    $bankName = $bankModel->getBankName($model->fundBankCode);
                    return $bankName;
                },
                'format' => 'raw',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:350px;']
            ],
            [
                'attribute' => 'fundBankAcct',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:150px;']
            ],

            [
                'class' => ActionColumn::className(),
                //'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}','headerOptions' => ['style' => 'width:80px'],
                'urlCreator' => function ($action, AcctFmFunds $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>