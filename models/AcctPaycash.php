<?php

namespace app\models;

use Yii;
use yii\validators\Validator;

/**
 * This is the model class for table "acct_paycash".
 *
 * @property int $id
 * @property string $payDate
 * @property int $payVch
 * @property string $paySub
 * @property string $payType
 * @property float $payAmount
 * @property string $payRmks
 * @property string $payCashBk
 * @property string $payPayee
 *
 * @property AcctBankaccts $payCashBk0
 * @property AcctPayhdr $payVch0
 */
class AcctPaycash extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_paycash';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payDate'], 'safe'],
            [['payVch'], 'integer'],
            [['payAmount', 'payDeduct'], 'number'],
            [['paySub', 'payCashBk'], 'string', 'max' => 2],
            [['payType'], 'string', 'max' => 12],
            /*
            [['payType'], 'required', 'whenClient' => "function(attribute, value) {
                  return $('#mode').val()) === 'Cheque';  
            }"],
            */
            /*
            [['payType'], 'required', 'when' => function($model) {
                  return $model->payPayee === 'Cheque';  
            }],
            */
            [['payRmks'], 'string', 'max' => 100],
            [['payPayee'], 'string', 'max' => 150],
            [['payVch', 'paySub', 'payType'], 'unique', 'targetAttribute' => ['payVch', 'paySub', 'payType']],
            [['payCashBk'], 'exist', 'skipOnError' => true, 'targetClass' => AcctBankaccts::class, 'targetAttribute' => ['payCashBk' => 'bactAcctCode']],
            /*[['payVch'], 'exist', 'skipOnError' => true, 'targetClass' => AcctPayhdr::class, 'targetAttribute' => ['payVch' => 'payVch'] ], */
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payCashBk' => 'Cashbook',
            'payDate' => 'Date',
            'payVch' => 'Voucher',
            'paySub' => 'Sub No.',
            'payPayee' => 'Payee Name',
            'payType' => 'Pay Type',
            'payAmount' => 'Amount',
            'payRmks' => 'Remarks',
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
     * Gets query for [[PayVch0]].
     *
     * @return \yii\db\ActiveQuery
     */
    /*
    public function getPayVch0()
    {
        return $this->hasOne(AcctPayhdr::class, ['payVch' => 'payVch']);
    }
    */
}
