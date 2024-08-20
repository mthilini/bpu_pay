<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "acct_prog".
 *
 * @property int $id
 * @property string $progCode
 * @property string $progDesc
 *
 * @property AcctVotes[] $acctVotes
 */
class AcctProg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_prog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['progCode'], 'string', 'max' => 2,'min'=>2],
            [['progDesc'], 'string', 'max' => 25],
            [['progCode'], 'unique'],
            [['progDesc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'progCode' => 'Program Code',
            'progDesc' => 'Program Description',
        ];
    }

    /**
     * Gets query for [[AcctVotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcctVotes()
    {
        return $this->hasMany(AcctVotes::class, ['projCode' => 'progCode']);
    }
    //
    //
    public function behaviors(){
        return [ 
            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::class
             ],
        ];
    }
    //
    //
}
