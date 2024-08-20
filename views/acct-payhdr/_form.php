<!-- <style type="text/css">
    .help-block {
    color: red; /* Change the text color to red */
    font-size: 16px; /* Adjust the font size */
    /* Add more CSS rules as needed */
}
</style> -->


<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use app\models\AcctBankaccts;

/** @var yii\web\View $this */
/** @var app\models\AcctPayhdr $model */
/** @var yii\widgets\ActiveForm $form */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-paycash").each(function(index) {
        jQuery(this).html("Cash Payment: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-paycash").each(function(index) {
        jQuery(this).html("Cash Payment: " + (index + 1))
    });
});

jQuery(".dynamicform_ledger").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_ledger .panel-title-ledger").each(function(index) {
        jQuery(this).html("Ledger Payment: " + (index + 1))
    });
});

jQuery(".dynamicform_ledger").on("afterDelete", function(e) {
    jQuery(".dynamicform_ledger .panel-title-ledger").each(function(index) {
        jQuery(this).html("Ledger Payment: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="acct-payhdr-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-sm-4">
            <?php
            //use app\models\AcctProg; //Program Drop-down list
            $cashbooks=AcctBankaccts::find()->all();
            //use yii\helpers\ArrayHelper;
            $listData=ArrayHelper::map($cashbooks,'bactAcctCode','bactAcctName');
            echo $form->field($model, 'payCashBk')->dropDownList($listData, [
                'id'=>'cashBk',
                'prompt' => 'Select Cashbook...',
                'onchange' => '
                    var selectedValue = $(this).val();
                    $.ajax({
                        url: "' . Yii::$app->urlManager->createUrl(['acct-bankaccts/dropdown']) . '",
                        method: "GET",
                        data: { id: selectedValue },
                        success: function(data) {
                            $("#subcat").val(data);
                        },
                        error: function() {
                            console.error("AJAX request failed.");
                        }
                    });
                ',
            ]); ?>
        </div>
        <div class="col-sm-4">
            <label for="<?= $model->formName() ?>payVch">Payment Voucher</label>
            <?= $form->field($model, 'payVch')->label(false)->textInput(['id' => 'subcat']); ?>  
        </div>
        <div class="col-sm-4">
            <label for="<?= $model->formName() ?>-payDate">Payment Date</label>
            <?= $form->field($model, 'payDate')->label(false)->widget(\yii\jui\DatePicker::classname(), [
                'language' => 'en',
                'dateFormat' => 'yyyy-MM-dd',
            ]) ?>
        </div>
    </div>  
    <div> <hr> </div>       
    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 10, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsCash[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'paySub',
            'payType',
            'payAmount',
            'payPayee',
            'payRmks',
        ],

    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3> Cash Payment </h3>
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Cash Payment</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsCash as $index => $modelCash): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-paycash">Cash Payment: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelCash->isNewRecord) {
                                echo Html::activeHiddenInput($modelCash, "[{$index}]id");
                            }
                        ?>  
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelCash, "[{$index}]paySub")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
    <?= Html::label('Pay Type', '') ?>
    <br>
    <?= Html::dropDownList('mode', 'Cheque', ['Cheque' => 'Cheque', 'Cash' => 'Cash', 'Direct Debit' => 'Direct Debit'],
        [//'prompt'=>'-Choose a option-',
                'onchange'=>'if($(this).val() != "Cheque"){
                var selectedValue = $(this).find(":selected").val();
                $("#payType").val(selectedValue).prop("readonly", true);
         } else {
                var selectedValue ="";
                $("#payType").val(selectedValue).prop("readonly", false);
        }'
        ]) ?>

                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelCash, 'payType')->textInput(['maxlength' => true, 'id'=>'payType']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelCash, "[{$index}]payAmount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelCash, "[{$index}]payPayee")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelCash, "[{$index}]payRmks")->textInput(['maxlength' => true]) ?>
                            </div>
                            
                        </div><!-- end:row --> 
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
    <div> <hr> </div>
    <?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_ledger', // Unique identifier for loan information
    'widgetBody' => '.container-items-ledger', // CSS class selector
    'widgetItem' => '.item-ledger', // CSS class for loan info items
    'limit' => 10, // Maximum loan info entries
    'min' => 0, // Minimum loan info entries
    'insertButton' => '.add-item-ledger', // CSS class for add button
    'deleteButton' => '.remove-item-ledger', // CSS class for delete button
    'model' => $modelsLedger[0], // Use the first loan info model for initialization
    'formId' => 'dynamic-form', // Your form ID
    'formFields' => [
        'paySub',
        'payAmount',
        // Add other loan info fields as needed
    ],
    //'formFields' => '', // Set formField to an empty string to initialize with empty fields
]); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3> Ledger Payment </h3>
        <button type="button" class="pull-right add-item-ledger btn btn-success btn-xs">
            <i class="fa fa-plus"></i> Add Ledger Payment
        </button>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body container-items-ledger">
        <?php foreach ($modelsLedger as $index => $modelLedger): ?>
            <div class="item-ledger panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title-ledger">Loan Info: <?= ($index + 1) ?></span>
                    <button type="button" class="pull-right remove-item-ledger btn btn-danger btn-xs">
                        <i class="fa fa-minus"></i>
                    </button>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php
                        if (!$modelLedger->isNewRecord) {
                            echo Html::activeHiddenInput($modelLedger, "[{$index}]id");
                        }
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($modelLedger, "[{$index}]paySub")->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($modelLedger, "[{$index}]payAmount")->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <!-- Add other loan info fields as needed -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php DynamicFormWidget::end(); ?> 
<div> <hr> </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
