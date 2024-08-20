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
<div class="acct-fm-epf-contr-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

</div>
