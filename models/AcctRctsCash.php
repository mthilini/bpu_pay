<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_rctscash".
 *
 * @property int $id
 * @property string $rctDate
 * @property int $rctNo
 * @property string $rctSub
 * @property string $rctType
 * @property string $rctName
 * @property float $rctAmount
 * @property string $rctRmks
 * @property string $rctCashBk
 *
 * @property AcctBankaccts $rctCashBk0
 * @property AcctRctshdr $rctNo0
 */
class AcctRctscash extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_rctscash';
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
            [['rctType'], 'string', 'max' => 12],
            [['rctName'], 'string', 'max' => 150],
            [['rctRmks'], 'string', 'max' => 100],
            [['rctNo', 'rctSub'], 'unique', 'targetAttribute' => ['rctNo', 'rctSub']],
            [['rctCashBk'], 'exist', 'skipOnError' => true, 'targetClass' => AcctBankaccts::class, 'targetAttribute' => ['rctCashBk' => 'bactAcctCode']],
        /*    [['rctNo'], 'exist', 'skipOnError' => true, 'targetClass' => AcctRctshdr::class, 'targetAttribute' => ['rctNo' => 'rctNo']],   */
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rctDate' => 'Date',
            'rctNo' => 'Receipt',
            'rctSub' => 'Sub',
            'rctName' => 'Payer Name',
            'rctType' => 'Rct Type',
            'rctAmount' => 'Amount',
            'rctRmks' => 'Remarks',
            'rctCashBk' => 'Cashbook',
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
     * Gets query for [[RctNo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    /*
    public function getRctNo0()
    {
        return $this->hasOne(AcctRctshdr::class, ['rctNo' => 'rctNo']);
    }
    */
}
