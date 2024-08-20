<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_payhdr".
 *
 * @property int $id
 * @property string $payDate
 * @property int $payVch
 * @property string $payCashBk
 * @property string $payPrepared
 * @property string $payDatePrepare
 * @property string $payCertify
 * @property string $payDateCertify
 * @property string $payAuthorise
 * @property string $payDateAuthorise
 *
 * @property AcctPaycash[] $acctPaycashes
 * @property AcctPayledg[] $acctPayledgs
 * @property AcctBankaccts $payCashBk0
 */
class AcctPayhdr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $payType;
    //
    public static function tableName()
    {
        return 'acct_payhdr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payDate', 'payDatePrepare', 'payDateCertify', 'payDateAuthorise'], 'safe'],
            [['payVch'], 'integer'],
            [['payCashBk'], 'string', 'max' => 2],
            [['payPrepared', 'payCertify', 'payAuthorise'], 'string', 'max' => 8],
            [['payVch', 'payCashBk'], 'unique', 'targetAttribute' => ['payVch', 'payCashBk']],
            [['payCashBk'], 'exist', 'skipOnError' => true, 'targetClass' => AcctBankaccts::class, 'targetAttribute' => ['payCashBk' => 'bactAcctCode']],
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
            'payCashBk' => 'Payment Cashbook',
            'payPrepared' => 'Prepared By',
            'payDatePrepare' => 'Date Prepared',
            'payCertify' => 'Payment Certified By',
            'payDateCertify' => 'Date Certified',
            'payAuthorise' => 'Payment Authorised By',
            'payDateAuthorise' => 'Date Authorised',
        ];
    }

    /**
     * Gets query for [[AcctPaycashes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcctPaycashes()
    {
        return $this->hasMany(AcctPaycash::class, ['payVch' => 'payVch']);
    }

    /**
     * Gets query for [[AcctPayledgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcctPayledgs()
    {
        return $this->hasMany(AcctPayledg::class, ['payVch' => 'payVch']);
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
}
