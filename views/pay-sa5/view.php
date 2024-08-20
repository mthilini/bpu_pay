<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Employee;
use app\models\PaySa5;

/** @var yii\web\View $this */
/** @var app\models\PaySa5 $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Sa5s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
////
$getID= Yii::$app->request->queryParams['id'];
$getUPFno=PaySa5::getUPFno($getID);
$empName=Employee::getEmpName($getUPFno);
echo "<h3>Employee Name: $empName</h3>";

?>
<div class="pay-sa5-view">

<!--    <h1><?= Html::encode($this->title) ?></h1> -->

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
            'sa5Ref',
	    'sa5Fld',
	     ['label' => 'SA5 Field Desc',
             'value' => function ($model) {
                return $model->sa5Fld0->a5Desc;
             },],
            'sa5Start',
            'sa5End',
            'sa5Amt',
        ],
    ]) ?>

</div>
