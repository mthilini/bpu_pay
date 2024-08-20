<!DOCTYPE html>
<html>
<head>
<style>
#empInfoTb {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}
#empInfoTb td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#empInfoTb tr:nth-child(even){background-color: #e2f2f2;}
#empInfoTb tr:hover {background-color: #ddd;}
</style>
</head>
<body>

<?php
use Yii;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetails $model */

$this->title = $model->title." ". $model->initials." ". $model->surname;
$this->params['breadcrumbs'][] = ['label' => 'Pay_Fin_Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pay-fin-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
	])?>
    </p>
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
                'label'=>'Med. Fund Contributor',
                'format'=>'raw',
                'value' => $model->medicalFundContributor == 0 ? 'No' : 'Yes', 
            ],
            'salaryBankCode',
            'bankAccountNo',
            'bankAccountName',
            //'taxConsent',
            [
                'label'=>'Tax Consent',
                'format'=>'raw',
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
<h2>Other Information of the Employee </h2>
<hr> 
<?php
    //Get the epfNo of this employee from employees table o "misbpudb" database
$EpfNo = Yii::$app->db->createCommand("SELECT epfNo FROM pay_fin_details where id='$model->id'")->queryScalar();
//
//Get the Epf Number from misbpudb/employees table (confirmation vailability)
$empEpf=Employee::getEmpEpf($EpfNo);
//
if (empty($empEpf)) {
	echo "<h2> NO employee was registered with this EPF Number </h2>"; 
}else{
//Get Employee info of this EPF Number    	
$EmpRow = Yii::$app->db2->createCommand("SELECT * FROM employees where empepf='$EpfNo'")->queryOne(); ?> 
<table id="empInfoTb">
<tr><td>NIC</td> <td><?php echo $EmpRow['empNIC']?></td></tr>
<tr><td>EPF No</td> <td><?php echo $EmpRow['empepf']?></td></tr>
<tr><td>Title</td> <td><?php echo $EmpRow['empTitle']?></td></tr>
<tr><td>Name with Initials</td> <td><?php echo $EmpRow['namewithinitials']?></td></tr>
<tr><td>Gender</td> <td><?php echo $EmpRow['empGender']?></td></tr>
<tr><td>Address</td> <td><?php echo $EmpRow['empAddress1'].", ".$EmpRow['empAddress2']?></td></tr>
<tr><td></td> <td><?php echo $EmpRow['empAddress3']?></td></tr>
<tr><td>Department</td> <td><?php echo Employee::getDepartment($EmpRow['empDept'])?></td></tr>
<tr><td>Designation</td> <td><?php echo Employee::getDesignation($EmpRow['empDesig'])?></td></tr>
<tr><td>Date of Birth</td> <td><?php echo $EmpRow['empDtBirth']?></td></tr>
<tr><td>Date of Apointment</td> <td><?php echo $EmpRow['empDtAppt']?></td></tr>
<tr><td>Date of Acceptance</td> <td><?php echo $EmpRow['empDtAssm']?></td></tr>
<!--<tr><td>Status</td> <td><?php echo $EmpRow['empStatus']?></td></tr> -->
<tr><td>Academic/Non-Academic</td> <td><?php echo Employee::getAcademic($EmpRow['empAcademicStatus'])?></td></tr>
<tr><td>Permanent/Temp./Contract</td> <td><?php echo Employee::getEmpStatus($EmpRow['empStatus'])?></td></tr>
<tr><td>Grade</td> <td><?php echo Employee::getGrade($EmpRow['empGrade'])?></td></tr>
<tr><td>Research Allowance</td> <td><?php echo $EmpRow['empResearch']?></td></tr>
</table>
<?php } //end of else ?>
</div>
</body>
</html>
