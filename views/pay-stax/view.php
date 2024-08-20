<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Employee;
use app\models\PayStax;

/** @var yii\web\View $this */
/** @var app\models\PayStax $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Staxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//
////
$getID= Yii::$app->request->queryParams['id'];
$getUPFno=PayStax::getUPFno($getID);
$empName=Employee::getEmpName($getUPFno);
echo "<h3>Employee Name: $empName</h3>";
?>
<div class="pay-stax-view">

 <!--   <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'empUPFNo',
            'staxRef',
	    'staxFld',
	     ['label' => 'Tax Field Desc',
             'value' => function ($model) {
                return $model->staxFld0->taxDesc;
             },],
            'staxStart',
            'staxEnd',
	    //'staxAmt',
	    ['label' => 'Tax Amount',
                'attribute' =>'staxAmt',
                'format'=>['currency'],
            ],
	    //'staxIncome',
	    ['label' => 'Tax Income',
                'attribute' =>'staxIncome',
                'format'=>['currency'],
            ],
            'staxMoney',
        ],
    ]) ?>

</div>
