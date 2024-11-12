<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_zledg".
 *
 * @property string $zledgCode
 * @property string $zledgDesc
 */
class AcctZledg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_zledg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zledgCode'], 'string', 'max' => 17],
            [['zledgDesc'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'zledgCode' => 'Zledg Code',
            'zledgDesc' => 'Zledg Desc',
        ];
    }
}
