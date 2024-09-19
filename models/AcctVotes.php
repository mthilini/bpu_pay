<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "acct_votes".
 *
 * @property int $id
 * @property string $progCode
 * @property string $projCode
 * @property string $objCode
 * @property string $voteCode
 * @property string $voteSub
 * @property string $voteVote
 * @property string $voteDesc
 *
 * @property AcctProj $progCode0
 * @property AcctProg $projCode0
 */
class AcctVotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_votes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['progCode', 'projCode', 'objCode', 'voteCode'], 'required'],
            [['progCode', 'projCode'], 'string', 'max' => 2, 'min'=>2],
            [['objCode'], 'string', 'max' => 3, 'min'=>3],
            [['voteCode'], 'string', 'max' => 4, 'min'=>4],
            [['voteSub'], 'string', 'max' => 1],
            [['voteVote'], 'string', 'max' => 17],
            [['voteDesc'], 'string', 'max' => 50],
            [['voteVote'], 'unique'],
            [['progCode'], 'exist', 'skipOnError' => true, 'targetClass' => AcctProj::class, 'targetAttribute' => ['progCode' => 'progCode']],
            [['projCode'], 'exist', 'skipOnError' => true, 'targetClass' => AcctProg::class, 'targetAttribute' => ['projCode' => 'progCode']],
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
            'objCode' => 'Object Code',
            'voteCode' => 'Vote Code',
            'voteSub' => 'Vote Sub',
            'voteVote' => 'Vote Vote',
            'voteDesc' => 'Vote Description',
        ];
    }

    /**
     * Gets query for [[ProgCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCode0()
    {
        return $this->hasOne(AcctProj::class, ['progCode' => 'progCode']);
    }

    /**
     * Gets query for [[ProjCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjCode0()
    {
        return $this->hasOne(AcctProg::class, ['progCode' => 'projCode']);
    }
    //
    public function beforeSave($insert) {
	//set the voteVote value with other field data
	//$this->voteCode=str_pad($this->voteCode, 4, '0', STR_PAD_LEFT); //padding upto 3 numbers
	$VoteVote=$this->progCode.'-'.$this->projCode.'-'.$this->objCode.'-'.$this->voteCode;
	if (!empty($this->voteSub)){
	    $VoteVote=$VoteVote.'-'.$this->voteSub;
	}
	$this->voteVote=$VoteVote;
	return parent::beforeSave($insert);
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
}
