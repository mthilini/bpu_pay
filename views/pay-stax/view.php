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

$getUPFno = $model->empUPFNo;
$employeemodel = new Employee();
$empName = $employeemodel->getEmpName($model->empUPFNo);

echo "<h3>Employee Name: $empName</h3>";
?>

<div class="row pay-stax-view">
    <div class="col-md-6 col-lg-5 col-xl-5">
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
                                            'staxRef',
                                            'staxFld',
                                            [
                                                'label' => 'Tax Field Desc',
                                                'value' => function ($model) {
                                                    return $model->staxFld0->taxDesc;
                                                },
                                            ],
                                            'staxStart',
                                            'staxEnd',
                                            //'staxAmt',
                                            [
                                                'label' => 'Tax Amount',
                                                'attribute' => 'staxAmt',
                                                'format' => ['currency'],
                                            ],
                                            //'staxIncome',
                                            [
                                                'label' => 'Tax Income',
                                                'attribute' => 'staxIncome',
                                                'format' => ['currency'],
                                            ],
                                            'staxMoney',
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
                                        <?= Html::a('Close', ['/pay-stax/index'], ['class' => 'btn btn-default pull-right']) ?>
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