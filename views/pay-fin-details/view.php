<?php

use app\models\Employee;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetails $model */

$this->title = $model->title . " " . $model->initials . " " . $model->surname;
$this->params['breadcrumbs'][] = ['label' => 'Pay_Fin_Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row acct-ledgsub-view">
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
                                            'nic',
                                            'title',
                                            'surname',
                                            //'initials',
                                            'epfNo',
                                            //'medicalFundContributor',
                                            [
                                                'label' => 'Med. Fund Contributor',
                                                'format' => 'raw',
                                                'value' => $model->medicalFundContributor == 0 ? 'No' : 'Yes',
                                            ],
                                            'salaryBankCode',
                                            'bankAccountNo',
                                            'bankAccountName',
                                            //'taxConsent',
                                            [
                                                'label' => 'Tax Consent',
                                                'format' => 'raw',
                                                'value' => $model->taxConsent == 0 ? 'No' : 'Yes',
                                            ],
                                            'applicableTaxTable',
                                            //'bankLoanAmount',
                                            [
                                                'format' => 'Currency',
                                                'attribute' => 'bankLoanAmount',
                                            ],
                                            'bankLoanReleaseDate',
                                            'otherInfo',
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
                                        <?= Html::a('Close', ['/pay-fin-details/index'], ['class' => 'btn btn-default pull-right']) ?>
                                    </p>
                                </div>

                                <div class="user-view" style="margin-top: 25px !important;">
                                    <h1>Other Information of the Employee </h1>
                                    <?php
                                    $employeemodel = new Employee();
                                    $empEpf = $employeemodel->getEmpEpf($model->epfNo);

                                    if (empty($empEpf)) {
                                        echo "<h2> NO employee was registered with this EPF Number </h2>";
                                    } else {
                                        //Get Employee info of this EPF Number    	
                                        $EmpRow = Yii::$app->db2->createCommand("SELECT * FROM employees where empepf='$model->epfNo'")->queryOne(); ?>

                                        <style>
                                            #empInfoTb {
                                                font-family: Arial, Helvetica, sans-serif;
                                                border-collapse: collapse;
                                                width: 100%;
                                            }

                                            #empInfoTb td,
                                            #customers th {
                                                border: 1px solid #ddd;
                                                padding: 5px;
                                            }

                                            #empInfoTb tr:nth-child(odd) {
                                                background-color: #e2f2f2;
                                            }

                                            #empInfoTb tr:hover {
                                                background-color: #ddd;
                                            }
                                        </style>

                                        <table id="empInfoTb">
                                            <tr>
                                                <td>NIC</td>
                                                <td><?= $EmpRow['empNIC'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>EPF No</td>
                                                <td><?= $EmpRow['empepf'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Title</td>
                                                <td><?= $EmpRow['empTitle'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Name with Initials</td>
                                                <td style="white-space: nowrap;"><?= $EmpRow['namewithinitials'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?= $EmpRow['empGender'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td style="white-space: nowrap;"><?= $EmpRow['empAddress1'] . ", " . $EmpRow['empAddress2'] . ', ' . $EmpRow['empAddress3'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Department</td>
                                                <td><?= $employeemodel->getDepartment($EmpRow['empDept']) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td style="white-space: nowrap;"><?= $employeemodel->getDesignation($EmpRow['empDesig']) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth</td>
                                                <td><?= $EmpRow['empDtBirth'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Apointment</td>
                                                <td><?= $EmpRow['empDtAppt'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Acceptance</td>
                                                <td><?= $EmpRow['empDtAssm'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Academic/Non-Academic</td>
                                                <td><?= $employeemodel->getAcademic($EmpRow['empAcademicStatus']) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Permanent/Temp./Contract</td>
                                                <td><?= $employeemodel->getEmpStatus($EmpRow['empStatus']) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Grade</td>
                                                <td><?= $employeemodel->getGrade($EmpRow['empGrade']) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Research Allowance</td>
                                                <td><?= $EmpRow['empResearch'] ?></td>
                                            </tr>
                                        </table>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>