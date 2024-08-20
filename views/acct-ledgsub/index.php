<?php

use app\models\AcctLedgsub;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgsubSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ledger Sub Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-ledgsub-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ledger Sub Code', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' =>'lsubCode',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' =>'lsubDesc',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:700px;']
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctLedgsub $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
