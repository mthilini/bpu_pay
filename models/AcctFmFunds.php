<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_fmfunds".
 *
 * @property int $id
 * @property string $fundCode
 * @property string $fundName
 * @property string $fundBankType
 * @property string $fundBankCode
 * @property string $fundBankAcct
 * @property string $fundLedg
 */
class AcctFmfunds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_fmfunds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fundCode'], 'string', 'max' => 4],
            [['fundName'], 'string', 'max' => 75],
            [['fundBankType'], 'string', 'max' => 1],
            [['fundBankCode'], 'string', 'max' => 7],
            [['fundBankAcct'], 'string', 'max' => 12],
            [['fundLedg'], 'string', 'max' => 5],
            [['fundCode', 'fundName'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fundCode' => 'Fund Code',
            'fundName' => 'Fund Name',
            'fundBankType' => 'Bank Type',
            'fundBankCode' => 'Bank Code',
            'fundBankAcct' => 'Bank Account',
            'fundLedg' => 'Fund Ledger',
        ];
    }

    public function getFundBankCode0()
    {
        return $this->hasOne(PayBank::class, ['bankBank' => 'fundBankCode']);
    }

    public function getFundLedg0()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'fundLedg']);
    }
    
}
