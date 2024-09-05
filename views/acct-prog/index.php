<?php

use app\models\AcctProg;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctProgSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Account Programs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-prog-index">
    <p>
        <?= Html::a('Create Acct Prog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'progCode',
            'progDesc',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctProg $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
