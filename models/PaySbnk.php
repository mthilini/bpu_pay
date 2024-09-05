<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_sbnk".
 *
 * @property int $id
 * @property string $empUPFNo
 * @property string $sbnkRef
 * @property string $sbnkStart
 * @property string $sbnkEnd
 * @property float $sbnkAmt
 * @property string $sbnkBank
 * @property string $sbnkAcct
 * @property string $sbnkAName
 * @property string $sbnkLoan
 */
class PaySbnk extends \yii\db\ActiveRecord
{
	public $empName;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_sbnk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sbnkStart', 'sbnkEnd'], 'date', 'format'=>'yyyy-mm-dd'],
            [['sbnkAmt'], 'number'],
            [['sbnkAcct', 'sbnkAName', 'empUPFNo'], 'required'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['sbnkRef'], 'string', 'max' => 10],
            [['sbnkBank'], 'string', 'max' => 7],
            [['sbnkAcct'], 'string', 'max' => 12],
            [['sbnkAName'], 'string', 'max' => 20],
            [['sbnkLoan'], 'string', 'max' => 1],
            [['sbnkRef'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empUPFNo' => 'Emp. EPF No',
            'sbnkRef' => 'SO Bank Ref.',
            'sbnkStart' => 'SO Start',
            'sbnkEnd' => 'SO End',
            'sbnkAmt' => 'SO Amountt',
            'sbnkBank' => 'SO Bank',
            'sbnkAcct' => 'SO Acctount',
            'sbnkAName' => 'SO Account Name',
            'sbnkLoan' => 'SO Loan',
        ];
    }
    //
    //
    //
    public function beforeSave($insert) {
           $this->sbnkAcct=str_pad($this->sbnkAcct, 12, '0', STR_PAD_LEFT); //padding upto 3 numbers
           $this->sbnkAName=str_pad($this->sbnkAName, 20, '*', STR_PAD_LEFT); //padding upto 3 numbers
           return parent::beforeSave($insert);
    }
    //
    //
    public function getUPFno($ID){
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $UPFno = Yii::$app->db->createCommand("SELECT empUPFNo FROM pay_sbnk where id='$ID'")->queryScalar();
        if (!empty($UPFno)){
            return $UPFno;
        }else{
            return NULL;
        }
    }
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
