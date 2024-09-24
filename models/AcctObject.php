<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_object".
 *
 * @property int $id
 * @property string $objCode
 * @property string $voteCode
 * @property string $ledgCode
 *
 * @property AcctLedger $ledgCode0
 */
class AcctObject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_object';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objCode'], 'string', 'max' => 3],
            [['voteCode'], 'string', 'max' => 4],
            [['ledgCode'], 'string', 'max' => 5],
            [['ledgCode'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedger::class, 'targetAttribute' => ['ledgCode' => 'ledgCode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'objCode' => 'Obj Code',
            'voteCode' => 'Vote Code',
            'ledgCode' => 'Ledg Code',
        ];
    }

    /**
     * Gets query for [[LedgCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLedgCode0()
    {
        return $this->hasOne(AcctLedger::class, ['ledgCode' => 'ledgCode']);
    }
}
