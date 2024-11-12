<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_mainledg".
 *
 * @property int $id
 * @property string $mainDate
 * @property int $mainVchRct
 * @property string $mainSub
 * @property string $mainLedg
 * @property string $mainCat
 * @property float $mainAmount
 * @property string $mainRmks
 * @property string $mainCashBk
 * @property string $mainPayRct
 * @property string $mainDept
 */
class AcctMainledg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_mainledg';
    }

    public static function primaryKey()
    {
        return ["id"];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mainVchRct'], 'integer'],
            [['mainDate'], 'safe'],
            [['mainAmount'], 'number'],
            [['mainSub', 'mainCat', 'mainCashBk'], 'string', 'max' => 2],
            [['mainLedg'], 'string', 'max' => 17],
            [['mainRmks'], 'string', 'max' => 100],
            [['mainPayRct'], 'string', 'max' => 1],
            [['mainDept'], 'string', 'max' => 10],
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
            'mainLedg' => 'Main Ledg',
            'mainCat' => 'Main Cat',
            'mainAmount' => 'Main Amount',
            'mainRmks' => 'Main Rmks',
            'mainCashBk' => 'Main Cash Bk',
            'mainPayRct' => 'Main Pay Rct',
            'mainDept' => 'Main Dept',
        ];
    }

    public function getAcctLedgerDesc()
    {
        return $this->hasOne(AcctLedger::className(), ['ledgCode' => 'mainLedg']);
    }
    
    public function getAcctVoteDesc()
    {
        return $this->hasOne(AcctVotes::className(), ['voteVote' => 'mainLedg']);
    }
}
