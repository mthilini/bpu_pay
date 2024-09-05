<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_sded".
 *
 * @property int $id
 * @property string $empUPFNo
 * @property string $sdedRef
 * @property string $sdedFld
 * @property string $sdedStart
 * @property string $sdedEnd
 * @property float $sdedAmt
 */
class PaySded extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_sded';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sdedStart', 'sdedEnd'], 'safe'],
            [['sdedAmt'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['sdedRef'], 'string', 'max' => 10],
            [['sdedFld'], 'string', 'max' => 2],
            [['sdedRef'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empUPFNo' => 'Emp Upf No',
            'sdedRef' => 'SO Ded. Ref',
            'sdedFld' => 'SO Ded. Fld',
            'sdedStart' => 'SO Ded. Start',
            'sdedEnd' => 'SO Ded. End',
            'sdedAmt' => 'SO Ded. Amount',
        ];
    }
    //
    //
    /**
     * Gets query for [[MainCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayField0()
    {
        return $this->hasOne(PayFields::class, ['fldCode' => 'sdedFld']);
    }
    //
    //
    //
    public function getUPFno($ID){
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $UPFno = Yii::$app->db->createCommand("SELECT empUPFNo FROM pay_sded where id='$ID'")->queryScalar();
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
}
