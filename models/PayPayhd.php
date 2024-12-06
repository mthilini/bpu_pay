<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_payhd".
 *
 * @property string|null $empNIC
 * @property string|null $empTitle
 * @property string|null $empSurname
 * @property string|null $empInitials
 * @property string|null $empNames
 * @property string|null $empGender
 * @property string|null $empAddress1
 * @property string|null $empAddress2
 * @property string|null $empAddress3
 * @property string|null $empDept
 * @property string|null $empDesig
 * @property string|null $empSalCode
 * @property string|null $empSalScale
 * @property float|null $empBasic
 * @property string|null $empDtAppt
 * @property string|null $empDtAssm
 * @property string|null $empDtIncr
 * @property string|null $empDtConf
 * @property string|null $empDtBirth
 * @property string|null $empUPFNo
 * @property string|null $empETFNo
 * @property string|null $empUPNo
 * @property string|null $empUPContr
 * @property string|null $empBankCode
 * @property string|null $empAcctNo
 * @property string|null $empAcctName
 * @property string|null $empStatus
 * @property string|null $empAcademic
 * @property string|null $empTempEmp
 * @property string|null $empDtTemp
 * @property string|null $empGrade
 * @property string|null $empResearch
 * @property string|null $empTax
 * @property string|null $empTaxTbl
 * @property float|null $empLoanAmt
 * @property string|null $empLoanDate
 */
class PayPayhd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_payhd';
    }

    public static function primaryKey()
    {
        return ["empNIC"];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empBasic', 'empLoanAmt'], 'number'],
            [['empDtAppt', 'empDtAssm', 'empDtIncr', 'empDtConf', 'empDtBirth', 'empDtTemp', 'empLoanDate'], 'safe'],
            [['empNIC'], 'string', 'max' => 50],
            [['empTitle', 'empAddress3'], 'string', 'max' => 15],
            [['empSurname', 'empAddress1', 'empAddress2'], 'string', 'max' => 25],
            [['empInitials', 'empAcctNo'], 'string', 'max' => 12],
            [['empNames'], 'string', 'max' => 75],
            [['empGender', 'empUPContr', 'empStatus', 'empAcademic', 'empTempEmp', 'empGrade', 'empResearch', 'empTax', 'empTaxTbl'], 'string', 'max' => 1],
            [['empDept'], 'string', 'max' => 5],
            [['empDesig'], 'string', 'max' => 3],
            [['empSalCode', 'empUPFNo', 'empETFNo', 'empUPNo'], 'string', 'max' => 8],
            [['empSalScale'], 'string', 'max' => 100],
            [['empBankCode'], 'string', 'max' => 7],
            [['empAcctName'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empNIC' => 'Emp Nic',
            'empTitle' => 'Emp Title',
            'empSurname' => 'Emp Surname',
            'empInitials' => 'Emp Initials',
            'empNames' => 'Emp Names',
            'empGender' => 'Emp Gender',
            'empAddress1' => 'Emp Address1',
            'empAddress2' => 'Emp Address2',
            'empAddress3' => 'Emp Address3',
            'empDept' => 'Emp Dept',
            'empDesig' => 'Emp Desig',
            'empSalCode' => 'Emp Sal Code',
            'empSalScale' => 'Emp Sal Scale',
            'empBasic' => 'Emp Basic',
            'empDtAppt' => 'Emp Dt Appt',
            'empDtAssm' => 'Emp Dt Assm',
            'empDtIncr' => 'Emp Dt Incr',
            'empDtConf' => 'Emp Dt Conf',
            'empDtBirth' => 'Emp Dt Birth',
            'empUPFNo' => 'Emp Upf No',
            'empETFNo' => 'Emp Etf No',
            'empUPNo' => 'Emp Up No',
            'empUPContr' => 'Emp Up Contr',
            'empBankCode' => 'Emp Bank Code',
            'empAcctNo' => 'Emp Acct No',
            'empAcctName' => 'Emp Acct Name',
            'empStatus' => 'Emp Status',
            'empAcademic' => 'Emp Academic',
            'empTempEmp' => 'Emp Temp Emp',
            'empDtTemp' => 'Emp Dt Temp',
            'empGrade' => 'Emp Grade',
            'empResearch' => 'Emp Research',
            'empTax' => 'Emp Tax',
            'empTaxTbl' => 'Emp Tax Tbl',
            'empLoanAmt' => 'Emp Loan Amt',
            'empLoanDate' => 'Emp Loan Date',
        ];
    }

    public function getPaySeml()
    {
        return $this->hasOne(PaySeml::className(), ['empUPFNo' => 'empUPFNo']);
    }

    public function getPaySded()
    {
        return $this->hasOne(PaySded::className(), ['empUPFNo' => 'empUPFNo']);
    }

    public function getPaySa5()
    {
        return $this->hasOne(PaySa5::className(), ['empUPFNo' => 'empUPFNo']);
    }

    public function getPaySa13()
    {
        return $this->hasOne(PaySa13::className(), ['empUPFNo' => 'empUPFNo']);
    }

    public function getPaySa14()
    {
        return $this->hasOne(PaySa14::className(), ['empUPFNo' => 'empUPFNo']);
    }

    public function getPayStax()
    {
        return $this->hasOne(PayStax::className(), ['empUPFNo' => 'empUPFNo']);
    }

    public function getPaySbnk()
    {
        return $this->hasOne(PaySbnk::className(), ['empUPFNo' => 'empUPFNo']);
    }

    public function getPayDept()
    {
        return $this->hasOne(PayDept::className(), ['deptCode' => 'empDept']);
    }
}
