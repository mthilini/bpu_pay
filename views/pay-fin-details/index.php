<?php

use app\models\PayFinDetails;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetailsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employee Details (Finance)';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-fin-details-index">

    <p>
        <?= Html::a('Create Emp. Details (Fin)', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nic',
            'title',
            'surname',
            //'initials',
            'epfNo',
            //'medicalFundContributor',
            [
                'label' => 'Medical Fund Contributor',
                'value' => function ($model) {
                    return $model->medicalFundContributor == 1 ? 'Yes' : 'No';
                }
            ],
            'salaryBankCode',
            'bankAccountNo',
            'bankAccountName',
            //'taxConsent',
            [
                'label' => 'Tax Consent',
                'value' => function ($model) {
                    return $model->taxConsent == 1 ? 'Yes' : 'No';
                }
            ],
            'applicableTaxTable',
            //'bankLoanAmount',
            [
                'format' => 'Currency',
                'attribute' => 'bankLoanAmount',
            ],
            'bankLoanReleaseDate',
            'otherInfo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PayFinDetails $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>