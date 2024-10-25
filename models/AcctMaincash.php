<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_maincash".
 *
 * @property int $id
 * @property string $mainDate
 * @property int $mainVchRct
 * @property string $mainSub
 * @property string $mainType
 * @property string $mainCat
 * @property float $mainAmount
 * @property float $mainDeduct
 * @property string $mainRmks
 * @property string $mainChqCan
 * @property string $mainChqPrc
 * @property string $mainCashBk
 * @property string $mainPayRct
 * @property string $mainName
 */
class AcctMaincash extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_maincash';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mainVchRct'], 'integer'],
            [['mainDate'], 'safe'],
            [['mainAmount', 'mainDeduct'], 'number'],
            [['mainSub', 'mainCat', 'mainCashBk'], 'string', 'max' => 2],
            [['mainType'], 'string', 'max' => 12],
            [['mainRmks'], 'string', 'max' => 100],
            [['mainChqCan', 'mainChqPrc', 'mainPayRct'], 'string', 'max' => 1],
            [['mainName'], 'string', 'max' => 150],
            [['mainVchRct', 'mainSub', 'mainType'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mainDate' => 'Main Date',
            'mainVchRct' => 'Main Vch Rct',
            'mainSub' => 'Main Sub',
            'mainType' => 'Main Type',
            'mainCat' => 'Main Cat',
            'mainAmount' => 'Main Amount',
            'mainDeduct' => 'Main Deduct',
            'mainRmks' => 'Main Rmks',
            'mainChqCan' => 'Main Chq Can',
            'mainChqPrc' => 'Main Chq Prc',
            'mainCashBk' => 'Main Cash Bk',
            'mainPayRct' => 'Main Pay Rct',
            'mainName' => 'Main Name',
        ];
    }
}
