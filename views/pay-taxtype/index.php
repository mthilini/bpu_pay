<?php

use app\models\PayTaxtype;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PayTaxtypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pay Tax Types';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-taxtype-index">
    <p>
        <?= Html::a('Create Pay Taxtype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'taxCode',
            'taxDesc',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PayTaxtype $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>