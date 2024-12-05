<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_sa13".
 *
 * @property string $empUPFNo
 * @property string $sa13Ref
 * @property string $sa13Fld
 * @property string $sa13Start
 * @property string $sa13End
 * @property float $sa13Amt
 */
class PaySa13 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_sa13';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sa13Ref'], 'required'],
            [['sa13Start', 'sa13End'], 'safe'],
            [['sa13Amt'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['sa13Ref'], 'string', 'max' => 10],
            [['sa13Fld'], 'string', 'max' => 2],
            [['sa13Ref'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empUPFNo' => 'Emp Upf No',
            'sa13Ref' => 'Sa13ref',
            'sa13Fld' => 'Sa13fld',
            'sa13Start' => 'Sa13start',
            'sa13End' => 'Sa13end',
            'sa13Amt' => 'Sa13amt',
        ];
    }
}
