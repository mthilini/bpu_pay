<?php

use app\models\AcctLedgmain;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\AcctLedgmainSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Account Main Ledger Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-ledgmain-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Acc. Ledge-main', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'mainCode',
            'mainDesc',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctLedgmain $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
            ],
        ],
    ]); ?>

</div>
