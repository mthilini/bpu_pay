<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_trialdtl".
 *
 * @property int $id
 * @property string $ledgCode
 * @property float $trialdtlOpening
 * @property float $trialdtlDebits
 * @property float $trialdtlCredits
 * @property float $trialdtlClosing
 * @property string $trialdtlMonth
 * @property string $trialdtlDate
 * @property string $trialdtlTB
 * @property string $trialdtlCnf
 */
class AcctTrialdtl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_trialdtl';
    }

    public static function primaryKey()
    {
        return ["id"];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['trialdtlOpening', 'trialdtlDebits', 'trialdtlCredits', 'trialdtlClosing'], 'number'],
            [['trialdtlDate'], 'safe'],
            [['ledgCode'], 'string', 'max' => 5],
            [['trialdtlMonth'], 'string', 'max' => 2],
            [['trialdtlTB'], 'string', 'max' => 3],
            [['trialdtlCnf'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ledgCode' => 'Ledger Code',
            'trialdtlOpening' => 'Opening',
            'trialdtlDebits' => 'Debits',
            'trialdtlCredits' => 'Credits',
            'trialdtlClosing' => 'Closing',
            'trialdtlMonth' => 'Month',
            'trialdtlDate' => 'Date',
            'trialdtlTB' => 'TB',
            'trialdtlCnf' => 'Confirm',
        ];
    }

    public function getAcctLedgerDesc()
    {
        return $this->hasOne(AcctLedger::className(), ['ledgCode' => 'ledgCode']);
    }
}
