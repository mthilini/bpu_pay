<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_zlog".
 *
 * @property int $id
 * @property string $logDate
 * @property string $logUser
 * @property string $logDesc
 * @property int $logVchRct
 * @property string $logSub
 * @property float $logAmount
 * @property string $logProcess
 * @property string $logRmks
 * @property string $logCashBk
 * @property string $logVersion
 */
class AcctZlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_zlog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logDate'], 'safe'],
            [['logVchRct'], 'integer'],
            [['logAmount'], 'number'],
            [['logUser'], 'string', 'max' => 15],
            [['logDesc'], 'string', 'max' => 100],
            [['logSub', 'logCashBk'], 'string', 'max' => 2],
            [['logProcess'], 'string', 'max' => 1],
            [['logRmks'], 'string', 'max' => 150],
            [['logVersion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logDate' => 'Log Date',
            'logUser' => 'Log User',
            'logDesc' => 'Log Desc',
            'logVchRct' => 'Log Vch Rct',
            'logSub' => 'Log Sub',
            'logAmount' => 'Log Amount',
            'logProcess' => 'Log Process',
            'logRmks' => 'Log Rmks',
            'logCashBk' => 'Log Cash Bk',
            'logVersion' => 'Log Version',
        ];
    }
}
