<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PayFields $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row pay-fields-view">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-header float-left">
                                <h1>Fixed Salary Field Info</h1>
                            </div>

                            <div class="panel-body">

                                <div class="user-view">
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            //'id',
                                            'fldCode',
                                            'fldName',
                                            'fldUPF:boolean',
                                            'fldETF:boolean',
                                            'fldType',
                                            [
                                                'label' => 'Field Desc',
                                                'value' => function ($model) {
                                                    return $model->payFieldType->typeName;
                                                },
                                            ],
                                            'fldCat',
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
                                        <?= Html::a('Close', ['/pay-fields/index'], ['class' => 'btn btn-default pull-right']) ?>
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