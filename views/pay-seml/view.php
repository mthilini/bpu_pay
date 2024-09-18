<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Employee;
use app\models\PaySeml;

/** @var yii\web\View $this */
/** @var app\models\PaySeml $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'SO Allow.', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$getUPFno = $model->empUPFNo;
$employeemodel = new Employee();
$empName = $employeemodel->getEmpName($model->empUPFNo);

echo "<h3>Employee Name: $empName</h3>";

?>

<div class="pay-seml-view">
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
            'semlRef',
            //'semlFld',
            [
                'label' => 'SO Allow. Field',
                'value' => function ($model) {
                    return $model->payField0->fldName;
                },
            ],
            'semlStart',
            'semlEnd',
            //'semlAmt',
            [
                'label' => 'Amount',
                'attribute' => 'semlAmt',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format' => ['currency'],
            ],
        ],
    ]) ?>

</div>