<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_sa5".
 *
 * @property int $id
 * @property string $empUPFNo
 * @property string $sa5Ref
 * @property string $sa5Fld
 * @property string $sa5Start
 * @property string $sa5End
 * @property float $sa5Amt
 *
 * @property PayPayhd $empUPFNo0
 * @property PayA5type $sa5Fld0
 */
class PaySa5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_sa5';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empUPFNo', 'sa5Ref', 'sa5Fld'], 'required'],
            [['sa5Start', 'sa5End'], 'safe'],
            [['sa5Amt'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['sa5Ref'], 'string', 'max' => 10],
            [['sa5Fld'], 'string', 'max' => 2],
            [['sa5Ref'], 'unique'],
            [['empUPFNo'], 'exist', 'skipOnError' => true, 'targetClass' => PayPayhd::class, 'targetAttribute' => ['empUPFNo' => 'empUPFNo']],
            [['sa5Fld'], 'exist', 'skipOnError' => true, 'targetClass' => PayA5type::class, 'targetAttribute' => ['sa5Fld' => 'a5Code']],
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
            'sa5Ref' => 'SA5 Ref',
            'sa5Fld' => 'SA5 Field',
            'sa5Start' => 'SA5 Start',
            'sa5End' => 'SA5 End',
            'sa5Amt' => 'SA5 Amount (Rs.)',
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
     * Gets query for [[Sa5Fld0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSa5Fld0()
    {
        return $this->hasOne(PayA5type::class, ['a5Code' => 'sa5Fld']);
    }

    public function getPayA5type()
    {
        return $this->hasOne(PayA5type::className(), ['a5Code' => 'sa5Fld']);
    }
    //
    //
    //
    public function getUPFno($ID)
    {
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $UPFno = Yii::$app->db->createCommand("SELECT empUPFNo FROM pay_sa5 where id='$ID'")->queryScalar();
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
}
