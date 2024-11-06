<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_jnlhdr".
 *
 * @property int $id
 * @property string $jnlDate
 * @property int $jnlNo
 * @property string $jnlCashBk
 * @property string $jnlPrepared
 * @property string $jnlDatePrepare
 * @property string $jnlCertify
 * @property string $jnlDateCertify
 * @property string $jnlAuthorise
 * @property string $jnlDateAuthorise
 */
class AcctJnlhdr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_jnlhdr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jnlDate', 'jnlDatePrepare', 'jnlDateCertify', 'jnlDateAuthorise'], 'safe'],
            [['jnlNo'], 'integer'],
            [['jnlCashBk'], 'string', 'max' => 2],
            [['jnlPrepared', 'jnlCertify', 'jnlAuthorise'], 'string', 'max' => 8],
            [['jnlNo', 'jnlCashBk'], 'unique', 'targetAttribute' => ['jnlNo', 'jnlCashBk']],
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
            'jnlCashBk' => 'Jnl Cash Bk',
            'jnlPrepared' => 'Jnl Prepared',
            'jnlDatePrepare' => 'Jnl Date Prepare',
            'jnlCertify' => 'Jnl Certify',
            'jnlDateCertify' => 'Jnl Date Certify',
            'jnlAuthorise' => 'Jnl Authorise',
            'jnlDateAuthorise' => 'Jnl Date Authorise',
        ];
    }
}
