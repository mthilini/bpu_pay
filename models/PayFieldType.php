<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_fieldType".
 *
 * @property int $id
 * @property string $typeCode
 * @property string $typeName
 */
class PayFieldType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_fieldType';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeCode'], 'string', 'max' => 2],
            [['typeName'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typeCode' => 'Type Code',
            'typeName' => 'Type Name',
        ];
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
