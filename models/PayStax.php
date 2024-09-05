<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_stax".
 *
 * @property int $id
 * @property string $empUPFNo
 * @property string $staxRef
 * @property string $staxFld
 * @property string $staxStart
 * @property string $staxEnd
 * @property float $staxAmt
 * @property float $staxIncome
 * @property string $staxMoney
 *
 * @property PayPayhd $empUPFNo0
 * @property PayTaxtype $staxFld0
 */
class PayStax extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_stax';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staxStart', 'staxEnd'], 'date', 'format'=>'yyyy-mm-dd'],
            [['staxAmt', 'staxIncome'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['staxRef'], 'string', 'max' => 10],
            [['staxFld', 'staxMoney'], 'string', 'max' => 2],
            [['staxRef'], 'unique'],
            [['staxFld'], 'exist', 'skipOnError' => true, 'targetClass' => PayTaxtype::class, 'targetAttribute' => ['staxFld' => 'taxCode']],
            //[['empUPFNo'], 'exist', 'skipOnError' => true, 'targetClass' => PayPayhd::class, 'targetAttribute' => ['empUPFNo' => 'empUPFNo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empUPFNo' => 'Emp UPF No',
            'staxRef' => 'S_Tax Ref',
            'staxFld' => 'S_Tax Field',
            'staxStart' => 'S_Tax Start',
            'staxEnd' => 'S_Tax End',
            'staxAmt' => 'S_Tax Amount',
            'staxIncome' => 'S_Tax Income',
            'staxMoney' => 'S_Tax Money',
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

    /**
     * Gets query for [[StaxFld0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaxFld0()
    {
        return $this->hasOne(PayTaxtype::class, ['taxCode' => 'staxFld']);
    }
    //
    //
    public function getUPFno($ID){
        //
        $UPFno = Yii::$app->db->createCommand("SELECT empUPFNo FROM pay_stax where id='$ID'")->queryScalar();
        if (!empty($UPFno)){
            return $UPFno;
        }else{
            return NULL;
        }
    }
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
    //
}
