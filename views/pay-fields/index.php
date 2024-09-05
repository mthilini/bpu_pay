<?php

use app\models\PayFields;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PayFieldsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fixed Salary Fields';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-fields-index">

    <p>
        <?= Html::a('Create New Field', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fldCode',
            'fldName',
            'fldUPF:boolean',
            'fldETF:boolean',
            //'fldType',
            [
                'label' => 'Field Type',
                'value' => 'payFieldType.typeName'
            ],
            'fldCat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PayFields $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>