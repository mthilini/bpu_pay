<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AcctFmEpfContr $model */

$this->title = $model->empUPFNo;
$this->params['breadcrumbs'][] = ['label' => 'Employee EPF Contribution', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row acct-fm-epf-contr-view">
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
                                            'epfYear',
                                            'epfBalStart',
                                            'epfJan10',
                                            'epfJan15',
                                            'epfFeb10',
                                            'epfFeb15',
                                            'epfMar10',
                                            'epfMar15',
                                            'epfApr10',
                                            'epfApr15',
                                            'epfMay10',
                                            'epfMay15',
                                            'epfJun10',
                                            'epfJun15',
                                            'epfJul10',
                                            'epfJul15',
                                            'epfAug10',
                                            'epfAug15',
                                            'epfSep10',
                                            'epfSep15',
                                            'epfOct10',
                                            'epfOct15',
                                            'epfNov10',
                                            'epfNov15',
                                            'epfDec10',
                                            'epfDec15',
                                            'epfIntrRate',
                                            'epfInterest',
                                            'epfBalEnd',
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
                                        <?= Html::a('Close', ['/acct-fm-epf-contr/index'], ['class' => 'btn btn-default pull-right']) ?>
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