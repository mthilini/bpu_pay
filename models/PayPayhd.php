<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_payhd".
 *
 * @property int $id
 * @property string $empNIC
 * @property string $empTitle
 * @property string $empSurname
 * @property string $empInitials
 * @property string $empNames
 * @property string $empGender
 * @property string $empAddress1
 * @property string $empAddress2
 * @property string $empAddress3
 * @property string $empDept
 * @property string $empDesig
 * @property string $empSalCode
 * @property float $empBasic
 * @property string $empDtAppt
 * @property string $empDtAssm
 * @property string $empDtIncr
 * @property string $empDtConf
 * @property string $empDtBirth
 * @property string $empUPFNo
 * @property string $empETFNo
 * @property string $empUPNo
 * @property string $empUPContr
 * @property string $empBankCode
 * @property string $empAcctNo
 * @property string $empAcctName
 * @property string $empStatus
 * @property string $empAcademic
 * @property string $empTempEmp
 * @property string $empDtTemp
 * @property string $empGrade
 * @property string $empResearch
 * @property string $empTax
 * @property string $empTaxTbl
 * @property float $empLoanAmt
 * @property string $empLoanDate
 *
 * @property PayDeductions[] $payDeductions
 * @property PayIncome[] $payIncomes
 * @property PayRmks[] $payRmks
 * @property PaySa5[] $paySa5s
 * @property PayStax[] $payStaxes
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empBasic', 'empLoanAmt'], 'number'],
            [['empDtAppt', 'empDtAssm', 'empDtIncr', 'empDtConf', 'empDtBirth', 'empDtTemp', 'empLoanDate'], 'safe'],
            [['empNIC', 'empAcctNo'], 'string', 'max' => 12],
            [['empTitle'], 'string', 'max' => 2],
            [['empSurname'], 'string', 'max' => 50],
            [['empInitials'], 'string', 'max' => 30],
            [['empNames'], 'string', 'max' => 150],
            [['empGender', 'empUPContr', 'empStatus', 'empAcademic', 'empTempEmp', 'empGrade', 'empResearch', 'empTax', 'empTaxTbl'], 'string', 'max' => 1],
            [['empAddress1', 'empAddress2', 'empAddress3'], 'string', 'max' => 100],
            [['empDept', 'empDesig'], 'string', 'max' => 3],
            [['empSalCode'], 'string', 'max' => 15],
            [['empUPFNo', 'empETFNo', 'empUPNo'], 'string', 'max' => 8],
            [['empBankCode'], 'string', 'max' => 7],
            [['empAcctName'], 'string', 'max' => 20],
            [['empNIC'], 'unique'],
            [['empUPFNo'], 'unique'],
            [['empETFNo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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

    /**
     * Gets query for [[PayDeductions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayDeductions()
    {
        return $this->hasMany(PayDeductions::class, ['empUPFNo' => 'empUPFNo']);
    }

    /**
     * Gets query for [[PayIncomes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayIncomes()
    {
        return $this->hasMany(PayIncome::class, ['empUPFNo' => 'empUPFNo']);
    }

    /**
     * Gets query for [[PayRmks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayRmks()
    {
        return $this->hasMany(PayRmks::class, ['empUPFNo' => 'empUPFNo']);
    }

    /**
     * Gets query for [[PaySa5s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaySa5s()
    {
        return $this->hasMany(PaySa5::class, ['empUPFNo' => 'empUPFNo']);
    }

    /**
     * Gets query for [[PayStaxes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayStaxes()
    {
        return $this->hasMany(PayStax::class, ['empUPFNo' => 'empUPFNo']);
    }
}
