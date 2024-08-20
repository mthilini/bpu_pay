<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_rctsledg".
 *
 * @property int $id
 * @property string $rctDate
 * @property int $rctNo
 * @property string $rctSub
 * @property string $rctLedger
 * @property float $rctAmount
 * @property string $rctRmks
 * @property string $rctCashBk
 * @property string $rctDept
 *
 * @property AcctBankaccts $rctCashBk0
 * @property AcctAccounts $rctLedger0
 * @property AcctRctshdr $rctNo0
 */
class AcctRctsledg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    //
    public $mainCode;
    //
    public static function tableName()
    {
        return 'acct_rctsledg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rctDate'], 'safe'],
            [['rctNo'], 'integer'],
            [['rctAmount'], 'number'],
            [['rctSub', 'rctCashBk'], 'string', 'max' => 2],
            [['rctLedger'], 'string', 'max' => 17],
            [['rctRmks'], 'string', 'max' => 100],
            [['rctDept'], 'string', 'max' => 10],
            [['rctNo', 'rctSub'], 'unique', 'targetAttribute' => ['rctNo', 'rctSub']],
            [['rctCashBk'], 'exist', 'skipOnError' => true, 'targetClass' => AcctBankaccts::class, 'targetAttribute' => ['rctCashBk' => 'bactAcctCode']],
            [['rctLedger'], 'exist', 'skipOnError' => true, 'targetClass' => AcctAccounts::class, 'targetAttribute' => ['rctLedger' => 'acctCode']],
            [['rctNo'], 'exist', 'skipOnError' => true, 'targetClass' => AcctRctshdr::class, 'targetAttribute' => ['rctNo' => 'rctNo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rctDate' => 'Receipt Date',
            'rctNo' => 'Receipt No',
            'rctSub' => 'Receipt Sub',
            'rctLedger' => 'Ledger',
            'rctAmount' => 'Amount',
            'rctRmks' => 'Remarks',
            'rctCashBk' => 'Cashbook',
            'rctDept' => 'Deparment',
        ];
    }

    /**
     * Gets query for [[RctCashBk0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRctCashBk0()
    {
        return $this->hasOne(AcctBankaccts::class, ['bactAcctCode' => 'rctCashBk']);
    }

    /**
     * Gets query for [[RctLedger0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRctLedger0()
    {
        return $this->hasOne(AcctAccounts::class, ['acctCode' => 'rctLedger']);
    }

    /**
     * Gets query for [[RctNo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRctNo0()
    {
        return $this->hasOne(AcctRctshdr::class, ['rctNo' => 'rctNo']);
    }
}
