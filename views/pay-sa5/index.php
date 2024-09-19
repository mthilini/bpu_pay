<?php

use app\models\PaySa5;
use app\models\PayA5type;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PaySa5Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'SA-5 Allowances';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-sa5-index">

    <p>
        <?= Html::a('Create SA-5 Allow.', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'empUPFNo',
            'sa5Ref',
            'sa5Fld',
            [
                'label' => 'SA5 Field Desc.',
                'value' => 'sa5Fld0.a5Desc'
            ],
            'sa5Start',
            'sa5End',
            [
                'label' => 'SA5 Amount (Rs.)',
                'attribute' => 'sa5Amt',
                'format' => ['currency'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PaySa5 $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>