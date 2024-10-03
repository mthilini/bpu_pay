<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "acct_proj".
 *
 * @property int $id
 * @property string $progCode
 * @property string $projCode
 * @property string $projDesc
 *
 * @property AcctVotes[] $acctVotes
 */
class AcctProj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_proj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['progCode', 'projCode', 'projDesc'], 'required'],
            [['progCode', 'projCode'], 'string', 'max' => 2, 'min' => 2],
            [['projDesc'], 'string', 'max' => 25],
            [['progCode', 'projCode'], 'unique', 'targetAttribute' => ['progCode', 'projCode']],
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
            'projCode' => 'Project Code',
            'projDesc' => 'Project Description',
        ];
    }
    /**
     * Gets query for [[MainCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCode0()
    {
        return $this->hasOne(AcctProg::class, ['progCode' => 'progCode']);
    }

    public function getAcctProg()
    {
        return $this->hasOne(AcctProg::className(), ['progCode' => 'progCode']);
    }
    /**
     * Gets query for [[AcctVotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcctVotes()
    {
        return $this->hasMany(AcctVotes::class, ['progCode' => 'progCode']);
    }
    //
    //
    public function behaviors()
    {
        return [
            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::class
            ],
        ];
    }
    //
    //
}
