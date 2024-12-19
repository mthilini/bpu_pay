<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_rmks".
 *
 * @property string $empUPFNo
 * @property string $rmkRmks
 * @property string $rmkDate
 */
class PayRmks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_rmks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rmkDate'], 'safe'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['rmkRmks'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empUPFNo' => 'Emp Upf No',
            'rmkRmks' => 'Rmk Rmks',
            'rmkDate' => 'Rmk Date',
        ];
    }
}
