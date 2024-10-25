<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "acct_bankaccts".
 *
 * @property int $id
 * @property string $bactAcctCode
 * @property string $bactBankCode
 * @property string $bactBankName
 * @property string $bactAcctNo
 * @property string $bactAcctName
 * @property int $bactVoucher
 * @property int $bactReceipt
 * @property int $bactJournal
 * @property string $bactCBkLedg
 * @property string $bactPayable1
 * @property string $bactPayable2
 * @property string $bactPayable3
 * @property string $bactPayable4
 * @property string $bactPayable5
 * @property string $bactPayable6
 *
 * @property AcctLedger $bactCBkLedg0
 * @property AcctLedger $bactPayable10
 * @property AcctLedger $bactPayable20
 * @property AcctLedger $bactPayable30
 * @property AcctLedger $bactPayable40
 * @property AcctLedger $bactPayable50
 * @property AcctLedger $bactPayable60
 */
class AcctBankaccts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_bankaccts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['bactAcctCode'], 'required'],
            [['bactVoucher', 'bactReceipt', 'bactJournal'], 'integer'],
            [['bactAcctCode'], 'string', 'max' => 2],
            [['bactBankCode'], 'string', 'max' => 7],
            [['bactBankName'], 'string', 'max' => 50],
            [['bactAcctNo'], 'string', 'max' => 12],
            [['bactAcctName'], 'string', 'max' => 20],
            [['bactCBkLedg', 'bactPayable1', 'bactPayable2', 'bactPayable3', 'bactPayable4', 'bactPayable5', 'bactPayable6'], 'string', 'max' => 5],
            [['bactAcctCode'], 'unique'],
            [['bactCBkLedg'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedger::class, 'targetAttribute' => ['bactCBkLedg' => 'ledgCode']],
            [['bactPayable1'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedger::class, 'targetAttribute' => ['bactPayable1' => 'ledgCode']],
            [['bactPayable2'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedger::class, 'targetAttribute' => ['bactPayable2' => 'ledgCode']],
            [['bactPayable3'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedger::class, 'targetAttribute' => ['bactPayable3' => 'ledgCode']],
            [['bactPayable4'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedger::class, 'targetAttribute' => ['bactPayable4' => 'ledgCode']],
            [['bactPayable5'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedger::class, 'targetAttribute' => ['bactPayable5' => 'ledgCode']],
            [['bactPayable6'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedger::class, 'targetAttribute' => ['bactPayable6' => 'ledgCode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bactAcctCode' => 'Cashbook',
            'bactBankCode' => 'Bank Code',
            'bactBankName' => 'Bank Name',
            'bactAcctNo' => 'Account No.',
            'bactAcctName' => 'Account Name',
            'bactVoucher' => 'Voucher No.',
            'bactReceipt' => 'Receipt No.',
            'bactJournal' => 'Journal No.',
            'bactCBkLedg' => 'Cashbook Ledger No.',
            'bactPayable1' => 'Payable Ledger 1',
            'bactPayable2' => 'Payable Ledger 2',
            'bactPayable3' => 'Payable Ledger 3',
            'bactPayable4' => 'Payable Ledger 4',
            'bactPayable5' => 'Payable Ledger 5',
            'bactPayable6' => 'Payable Ledger 6',
        ];
    }

    /**
     * Gets query for [[BactCBkLedg0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBactCBkLedg0()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'bactCBkLedg']);
    }

    /**
     * Gets query for [[BactPayable10]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBactPayable10()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'bactPayable1']);
    }

    /**
     * Gets query for [[BactPayable20]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBactPayable20()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'bactPayable2']);
    }

    /**
     * Gets query for [[BactPayable30]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBactPayable30()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'bactPayable3']);
    }

    /**
     * Gets query for [[BactPayable40]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBactPayable40()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'bactPayable4']);
    }

    /**
     * Gets query for [[BactPayable50]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBactPayable50()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'bactPayable5']);
    }

    /**
     * Gets query for [[BactPayable60]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBactPayable60()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'bactPayable6']);
    }
    //
    //
    public function behaviors()
    {
        return [
            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::class
            ],
        ];
    }
    //
    //
}
