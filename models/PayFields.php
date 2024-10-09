<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_fields".
 *
 * @property int $id
 * @property string $fldCode
 * @property string $fldName
 * @property bool $fldUPF
 * @property bool $fldETF
 * @property int $fldType
 * @property string $fldCat
 */
class PayFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fldCode', 'fldName'], 'required'],
            [['fldUPF', 'fldETF'], 'boolean'],
            [['fldType'], 'integer'],
            [['fldCode'], 'string', 'max' => 2, 'min'=>2],
            [['fldName'], 'string', 'max' => 30],
            [['fldCat'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fldCode' => 'Field Code',
            'fldName' => 'Field Name',
            'fldUPF' => 'UPF',
            'fldETF' => 'ETF',
            'fldType' => 'Field Type',
            'fldCat' => 'Category',
        ];
    }
    //
    /**
     * Gets query for [PayFieldType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayFieldType()
    {
        return $this->hasOne(PayFieldType::className(), ['typeCode' => 'fldType']);
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

