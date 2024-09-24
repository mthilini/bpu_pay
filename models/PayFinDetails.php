<?php

namespace app\models;

use Yii;
use yii\db\Query;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_fin_details".
 *
 * @property int $id
 * @property string $nic
 * @property string $title
 * @property string $surname
 * @property string $initials
 * @property string $epfNo
 * @property int $medicalFundContributor
 * @property string $salaryBankCode
 * @property string $bankAccountNo
 * @property string $bankAccountName
 * @property int $taxConsent
 * @property string $applicableTaxTable
 * @property float $bankLoanAmount
 * @property string $bankLoanReleaseDate
 * @property string $otherInfo
 */
class PayFinDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_fin_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nic','surname', 'epfNo', 'medicalFundContributor', 'salaryBankCode', 'bankAccountNo', 'bankAccountName', 'taxConsent', 'bankLoanAmount', 'bankLoanReleaseDate'], 'required'],
            [['medicalFundContributor', 'taxConsent'], 'integer'],
            [['bankLoanAmount'], 'number'],
            [['bankLoanReleaseDate'], 'date', 'format' => 'dd/MM/yyyy'],
            [['nic', 'title'], 'string', 'max' => 15],
            [['bankAccountNo'], 'string', 'max' => 12, 'min'=>12],
            [['surname'], 'string', 'max' => 55],
            [['initials'], 'string', 'max' => 20],
            [['epfNo', 'salaryBankCode'], 'string', 'max' => 12],
            [['bankAccountName'], 'string', 'max' => 25],
            [['applicableTaxTable'], 'string', 'max' => 2],
            [['otherInfo'], 'string', 'max' => 35],
            [['nic', 'epfNo'], 'unique', 'targetAttribute' => ['nic', 'epfNo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nic' => 'NIC',
            'title' => 'Title',
            'surname' => 'Employee Name',
            'initials' => 'Initials',
            'epfNo' => 'EPF No',
            'medicalFundContributor' => 'Medical Fund Contributor',
            'salaryBankCode' => 'Salary Bank Code',
            'bankAccountNo' => 'Bank Account No',
            'bankAccountName' => 'Bank Account Name',
            'taxConsent' => 'Tax Consent',
            'applicableTaxTable' => 'Applicable Tax Table',
            'bankLoanAmount' => 'Bank Loan Amount',
            'bankLoanReleaseDate' => 'Bank Loan Release Date',
            'otherInfo' => 'Other Info',
        ];
    }
    //
    public function beforeValidate(){
	//
	$this->nic="";
	$this->title="";
	$this->surname="";
	$this->initials="";
	$empRow = Yii::$app->db2->createCommand("SELECT empTitle,namewithinitials,empNIC FROM employees where empepf='$this->epfNo'")->queryOne();
	if (!empty($empRow)){
	    $this->title=$empRow['empTitle'];
	    $this->surname=$empRow['namewithinitials'];
	    $this->nic=$empRow['empNIC'];
	}
        return true;
    }
    //
    //
    //For sending record to the Audit Trail
    //
    public function behaviors(){
        return [
            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::class
             ],
        ];
    }
    //
}
