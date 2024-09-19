<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Employee;
use app\models\PayDeductions;

/** @var yii\web\View $this */
/** @var app\models\PayDeductions $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Deductions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$getUPFno = $model->empUPFNo;
$employeemodel = new Employee();
$empName = $employeemodel->getEmpName($model->empUPFNo);

echo "<h3>Employee Name: $empName</h3>";
?>

<div class="row pay-deductions-view">
    <div class="col-md-6 col-lg-5 col-xl-4">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">
                                <div class="user-view">

                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            //'id',
                                            'empUPFNo',
                                            'dedMon',
                                            'dedYear',
                                            //'dedDeduction',
                                            [
                                                'label' => 'Deduction (Rs.)',
                                                'attribute' => 'dedDeduction',
                                                'format' => ['currency'],
                                            ],
                                        ],
                                    ]) ?>

                                    <p>
                                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                        <?= Html::a('Close', ['/pay-deductions/index'], ['class' => 'btn btn-default pull-right']) ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</div>