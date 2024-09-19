<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_rctshdr".
 *
 * @property int $id
 * @property string $rctDate
 * @property int $rctNo
 * @property string $rctCashBk
 * @property string $rctPrepared
 * @property string $rctDatePrepare
 * @property string $rctCertify
 * @property string $rctDateCertify
 * @property string $rctAuthorise
 * @property string $rctDateAuthorise
 */
class AcctRctshdr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_rctshdr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rctDate', 'rctDatePrepare', 'rctDateCertify', 'rctDateAuthorise'], 'safe'],
            [['rctNo'], 'integer'],
            [['rctCashBk'], 'string', 'max' => 2],
            [['rctPrepared', 'rctCertify', 'rctAuthorise'], 'string', 'max' => 8],
            [['rctNo', 'rctCashBk'], 'unique', 'targetAttribute' => ['rctNo', 'rctCashBk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rctDate' => 'Rct Date',
            'rctNo' => 'Rct No',
            'rctCashBk' => 'Rct Cash Bk',
            'rctPrepared' => 'Rct Prepared',
            'rctDatePrepare' => 'Rct Date Prepare',
            'rctCertify' => 'Rct Certify',
            'rctDateCertify' => 'Rct Date Certify',
            'rctAuthorise' => 'Rct Authorise',
            'rctDateAuthorise' => 'Rct Date Authorise',
        ];
    }
}
