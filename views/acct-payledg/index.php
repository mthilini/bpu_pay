<?php

use app\models\AcctPayledg;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctPayledgSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Payment-Ledgers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-payledg-index">
    <p>
        <?= Html::a('New Payment-Ledger', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'payDate',
            'payVch',
            'paySub',
            'payLedg',
            //'payAmount',
            [
                'label' => 'Amount (Rs.)',
                'attribute' => 'payAmount',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format' => ['currency'],
            ],
            'payRmks',
            'payCashBk',
            'payDept',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctPayledg $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>