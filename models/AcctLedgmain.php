<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "acct_ledgmain".
 *
 * @property int $id
 * @property string $mainCode
 * @property string $mainDesc
 *
 * @property AcctLedger[] $acctLedgers
 */
class AcctLedgmain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_ledgmain';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mainCode'], 'string', 'max' => 2,'min'=>2],
            [['mainDesc'], 'string', 'max' => 75],
            [['mainCode'], 'unique'],
            [['mainDesc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mainCode' => 'Main Code',
            'mainDesc' => 'Main Description',
        ];
    }

    /**
     * Gets query for [[AcctLedgers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcctLedgers()
    {
        return $this->hasMany(AcctLedger::class, ['mainCode' => 'mainCode']);
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
