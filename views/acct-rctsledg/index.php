<?php

use app\models\AcctRctsledg;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsledgSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Receipt-Ledgers';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-rctsledg-index">
    <p>
        <?= Html::a('Create Receipt-Ledger', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'rctDate',
            'rctNo',
            'rctSub',
            'rctLedger',
            //'rctAmount',
            [
                'label' => 'Amount (Rs.)',
                'attribute' => 'rctAmount',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format' => ['currency'],
            ],
            'rctRmks',
            'rctCashBk',
            'rctDept',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctRctsledg $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>