<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_a14type".
 *
 * @property string $a14Code
 * @property string $a14Desc
 */
class PayA14type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_a14type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['a14Code'], 'required'],
            [['a14Code'], 'string', 'max' => 2],
            [['a14Desc'], 'string', 'max' => 50],
            [['a14Code'], 'unique'],
            [['a14Desc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'a14Code' => 'A14code',
            'a14Desc' => 'A14desc',
        ];
    }
}
