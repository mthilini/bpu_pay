<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_payledg".
 *
 * @property int $id
 * @property string $payDate
 * @property int $payVch
 * @property string $paySub
 * @property string $payLedg
 * @property float $payAmount
 * @property string $payRmks
 * @property string $payCashBk
 * @property string $payDept
 *
 * @property AcctBankaccts $payCashBk0
 * @property AcctAccounts $payLedg0
 * @property AcctPayhdr $payVch0
 */
class AcctPayledg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    //
    public $mainCode;
    //
    public static function tableName()
    {
        return 'acct_payledg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payDate', 'payVch', 'payCat', 'paySub', 'payCashBk', 'payPayRct', 'payDept'], 'required'],
            [['payDate'], 'safe'],
            [['payVch'], 'integer'],
            [['payAmount'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
            [['paySub', 'payCat', 'payCashBk'], 'string', 'max' => 2],
            [['payLedg'], 'string', 'max' => 17],
            [['payRmks'], 'string', 'max' => 100],
            [['payDept'], 'string', 'max' => 10],
            [['payVch', 'paySub'], 'unique', 'targetAttribute' => ['payVch', 'paySub']],
            [['payCashBk'], 'exist', 'skipOnError' => true, 'targetClass' => AcctBankaccts::class, 'targetAttribute' => ['payCashBk' => 'bactAcctCode']],
            [['payVch'], 'exist', 'skipOnError' => true, 'targetClass' => AcctPayhdr::class, 'targetAttribute' => ['payVch' => 'payVch']],
            [['payLedg'], 'exist', 'skipOnError' => true, 'targetClass' => AcctAccounts::class, 'targetAttribute' => ['payLedg' => 'acctCode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payDate' => 'Payment Date',
            'payVch' => 'Payment Voucher',
            'paySub' => 'Payment Sub',
            'payLedg' => 'Ledger',
            'payCat' => 'Category',
            'payAmount' => 'Amount',
            'payRmks' => 'Remarks',
            'payCashBk' => 'Cashbook',
            'payDept' => 'Department',
        ];
    }

    /**
     * Gets query for [[PayCashBk0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayCashBk0()
    {
        return $this->hasOne(AcctBankaccts::class, ['bactAcctCode' => 'payCashBk']);
    }

    /**
     * Gets query for [[PayLedg0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayLedg0()
    {
        return $this->hasOne(AcctAccounts::class, ['acctCode' => 'payLedg']);
    }

    /**
     * Gets query for [[PayVch0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayVch0()
    {
        return $this->hasOne(AcctPayhdr::class, ['payVch' => 'payVch']);
    }

    public function getAcctLedgerDesc()
    {
        return $this->hasOne(AcctLedger::className(), ['ledgCode' => 'payLedg']);
    }
}
