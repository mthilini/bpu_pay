<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_income".
 *
 * @property int $id
 * @property string $empUPFNo
 * @property int $incMon
 * @property int $incYear
 * @property float $incIncome
 *
 * @property PayPayhd $empUPFNo0
 */
class PayIncome extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_income';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['incMon', 'incYear'], 'integer'],
            [['incIncome'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['empUPFNo'], 'exist', 'skipOnError' => true, 'targetClass' => PayPayhd::class, 'targetAttribute' => ['empUPFNo' => 'empUPFNo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empUPFNo' => 'Emp. UPF No',
            'incMon' => 'Month',
            'incYear' => 'Year',
            'incIncome' => 'Income',
        ];
    }

    /**
     * Gets query for [[EmpUPFNo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpUPFNo0()
    {
        return $this->hasOne(PayPayhd::class, ['empUPFNo' => 'empUPFNo']);
    }
    //
    //
    //
    public function getUPFno($ID){
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $UPFno = Yii::$app->db->createCommand("SELECT empUPFNo FROM pay_income where id='$ID'")->queryScalar();
        if (!empty($UPFno)){
            return $UPFno;
        }else{
            return NULL;
        }
    }
    //
    //
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
