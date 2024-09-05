<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_a5type".
 *
 * @property int $id
 * @property string $a5Code
 * @property string $a5Desc
 *
 * @property PaySa5[] $paySa5s
 */
class PayA5type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_a5type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['a5Code', 'a5Desc'], 'required'],
            [['a5Code'], 'string', 'max' => 2],
            [['a5Desc'], 'string', 'max' => 50],
            [['a5Code'], 'unique'],
            [['a5Desc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'a5Code' => 'A5 Code',
            'a5Desc' => 'A5 Description',
        ];
    }

    /**
     * Gets query for [[PaySa5s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaySa5s()
    {
        return $this->hasMany(PaySa5::class, ['sa5Fld' => 'a5Code']);
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
