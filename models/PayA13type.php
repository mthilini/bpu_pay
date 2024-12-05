<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_a13type".
 *
 * @property string $a13Code
 * @property string $a13Desc
 */
class PayA13type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_a13type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['a13Code'], 'required'],
            [['a13Code'], 'string', 'max' => 2],
            [['a13Desc'], 'string', 'max' => 50],
            [['a13Code'], 'unique'],
            [['a13Desc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'a13Code' => 'A13code',
            'a13Desc' => 'A13desc',
        ];
    }
}
