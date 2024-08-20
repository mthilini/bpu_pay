<?php

use app\models\AcctLedger;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Account Ledgers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-ledger-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Account Ledger', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
	    'mainCode',
	    ['label'=>'Main Code Desc',
            'value'=>'mainCode0.mainDesc'],
            'ledgSub',
            'ledgCode',
            'ledgDesc',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctLedger $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
