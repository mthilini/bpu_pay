<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_bank".
 *
 * @property int $id
 * @property string $bankCode
 * @property string $bankBranch
 * @property string $bankBank
 * @property string $bankName
 * @property string $bankAddr
 */
class PayBank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bankCode'], 'string', 'max' => 4, 'min' => 4],
            [['bankBranch'], 'string', 'max' => 3, 'min' => 3],
            [['bankBank'], 'string', 'max' => 7],
            [['bankName'], 'string', 'max' => 75],
            [['bankAddr'], 'string', 'max' => 80],
            [['bankBank'], 'unique'],
            [['bankName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bankCode' => 'Main Bank Code',
            'bankBranch' => 'Branch Code',
            'bankBank' => 'Bank Code',
            'bankName' => 'Bank Name',
            'bankAddr' => 'Bank Address',
        ];
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

    public function getBankName($bankCode)
    {
        $bankName = Yii::$app->db->createCommand("SELECT bankName FROM pay_bank where bankBank='$bankCode'")->queryScalar();
        if (!empty($bankName)) {
            return $bankName;
        } else {
            return NULL;
        }
    }
}
