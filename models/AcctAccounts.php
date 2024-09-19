<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_accounts".
 *
 * @property int $id
 * @property string $acctCode
 * @property string $acctDesc
 */
class AcctAccounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['acctCode'], 'string', 'max' => 17],
            [['acctDesc'], 'string', 'max' => 75],
            [['acctCode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'acctCode' => 'Acct Code',
            'acctDesc' => 'Acct Desc',
        ];
    }
}
