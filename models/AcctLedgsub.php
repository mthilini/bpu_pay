<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_ledgsub".
 *
 * @property int $id
 * @property string $lsubCode
 * @property string $lsubDesc
 */
class AcctLedgsub extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_ledgsub';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lsubCode', 'lsubDesc'], 'required'],
            [['lsubCode'], 'string', 'max' => 2],
            [['lsubDesc'], 'string', 'max' => 100],
            [['lsubCode', 'lsubDesc'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lsubCode' => 'Ledger Sub Code',
            'lsubDesc' => 'Ledger Sub Description',
        ];
    }
}
