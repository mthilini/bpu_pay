<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_jnl".
 *
 * @property int $id
 * @property string $jnlDate
 * @property int $jnlNo
 * @property string $jnlSub
 * @property string $jnlLedg
 * @property string $jnlCat
 * @property float $jnlAmount
 * @property string $jnlRmks
 * @property string $jnlCashBk
 * @property string $jnlPayRct
 * @property string $jnlDept
 */
class AcctJnl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_jnl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jnlNo'], 'integer'],
            [['jnlDate'], 'safe'],
            [['jnlAmount'], 'number'],
            [['jnlSub', 'jnlCat', 'jnlCashBk'], 'string', 'max' => 2],
            [['jnlLedg'], 'string', 'max' => 17],
            [['jnlRmks'], 'string', 'max' => 100],
            [['jnlPayRct'], 'string', 'max' => 1],
            [['jnlDept'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jnlDate' => 'Jnl Date',
            'jnlNo' => 'Jnl No',
            'jnlSub' => 'Jnl Sub',
            'jnlLedg' => 'Jnl Ledg',
            'jnlCat' => 'Jnl Cat',
            'jnlAmount' => 'Jnl Amount',
            'jnlRmks' => 'Jnl Rmks',
            'jnlCashBk' => 'Jnl Cash Bk',
            'jnlPayRct' => 'Jnl Pay Rct',
            'jnlDept' => 'Jnl Dept',
        ];
    }

    public static function primaryKey()
    {
        return ["id"];
    }

    public function getAcctLedgerDesc()
    {
        return $this->hasOne(AcctLedger::className(), ['ledgCode' => 'jnlLedg']);
    }
    
    public function getAcctVoteDesc()
    {
        return $this->hasOne(AcctVotes::className(), ['voteVote' => 'jnlLedg']);
    }
    
    public function getAcctZledgDesc()
    {
        return $this->hasOne(AcctZledg::className(), ['zledgCode' => 'jnlLedg']);
    }
}
