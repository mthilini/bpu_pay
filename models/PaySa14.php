<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_sa14".
 *
 * @property string $empUPFNo
 * @property string $sa14Ref
 * @property string $sa14Fld
 * @property string $sa14Start
 * @property string $sa14End
 * @property float $sa14Amt
 */
class PaySa14 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_sa14';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sa14Ref'], 'required'],
            [['sa14Start', 'sa14End'], 'safe'],
            [['sa14Amt'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['sa14Ref'], 'string', 'max' => 10],
            [['sa14Fld'], 'string', 'max' => 2],
            [['sa14Ref'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empUPFNo' => 'Emp Upf No',
            'sa14Ref' => 'Sa14ref',
            'sa14Fld' => 'Sa14fld',
            'sa14Start' => 'Sa14start',
            'sa14End' => 'Sa14end',
            'sa14Amt' => 'Sa14amt',
        ];
    }
}
