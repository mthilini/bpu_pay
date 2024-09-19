<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_seml".
 *
 * @property int $id
 * @property string $empUPFNo
 * @property string $semlRef
 * @property string $semlFld
 * @property string $semlStart
 * @property string $semlEnd
 * @property float $semlAmt
 */
class PaySeml extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_seml';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empUPFNo', 'semlRef', 'semlFld', 'semlAmt'], 'required'],
            [['semlStart', 'semlEnd'], 'safe'],
            [['semlAmt'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['semlRef'], 'string', 'max' => 10],
            [['semlFld'], 'string', 'max' => 2],
            [['semlRef'], 'unique'],
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
            'semlRef' => 'SO Allow. Ref',
            'semlFld' => 'SO Allow. Field',
            'semlStart' => 'SO Allow. Start',
            'semlEnd' => 'SO Allow. End',
            'semlAmt' => 'So Allow. Amount',
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
        return $this->hasOne(PayFields::class, ['fldCode' => 'semlFld']);
    }

    public function getUPFno($ID)
    {
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $UPFno = Yii::$app->db->createCommand("SELECT empUPFNo FROM pay_seml where id='$ID'")->queryScalar();
        if (!empty($UPFno)) {
            return $UPFno;
        } else {
            return NULL;
        }
    }
    //
    //
    public function behaviors()
    {
        return [
            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::class
            ],
        ];
    }
    //
    //
}
