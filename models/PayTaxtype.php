<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "pay_taxtype".
 *
 * @property int $id
 * @property string $taxCode
 * @property string $taxDesc
 *
 * @property PayStax[] $payStaxes
 */
class PayTaxtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_taxtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['taxCode'], 'string', 'max' => 2],
            [['taxDesc'], 'string', 'max' => 50],
            [['taxCode'], 'unique'],
            [['taxDesc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'taxCode' => 'Tax Code',
            'taxDesc' => 'Tax Description',
        ];
    }

    /**
     * Gets query for [[PayStaxes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayStaxes()
    {
        return $this->hasMany(PayStax::class, ['staxFld' => 'taxCode']);
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
