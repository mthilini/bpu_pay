<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_desig".
 *
 * @property string|null $desigCode
 * @property string|null $desigName
 */
class PayDesig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_desig';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desigCode'], 'string', 'max' => 3],
            [['desigName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'desigCode' => 'Desig Code',
            'desigName' => 'Desig Name',
        ];
    }
}
