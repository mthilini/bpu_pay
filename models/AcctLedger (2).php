<?php

namespace app\models;

use Yii;
use mehulpatel\mod\audit\behaviors\AuditEntryBehaviors;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "acct_ledger".
 *
 * @property int $id
 * @property string $mainCode
 * @property string $ledgSub
 * @property string $ledgCode
 * @property string $ledgDesc
 *
 * @property AcctObject[] $acctObjects
 * @property AcctLedgmain $mainCode0
 */
class AcctLedger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_ledger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mainCode','ledgSub','ledgDesc'], 'required'],
            [['mainCode'], 'string', 'max' => 2, 'min'=>2],
            [['ledgSub'], 'string', 'max' => 3],
            [['ledgCode'], 'string', 'max' => 5],
            [['ledgDesc'], 'string', 'max' => 75],
            [['ledgDesc', 'ledgCode'], 'unique'],
            [['mainCode'], 'exist', 'skipOnError' => true, 'targetClass' => AcctLedgmain::class, 'targetAttribute' => ['mainCode' => 'mainCode']],
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
            'ledgSub' => 'Ledger Sub',
            'ledgCode' => 'Ledger Code',
            'ledgDesc' => 'Ledger Description',
        ];
    }

    /**
     * Gets query for [[AcctObjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcctObjects()
    {
        return $this->hasMany(AcctObject::class, ['ledgCode' => 'ledgCode']);
    }

    /**
     * Gets query for [[MainCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainCode0()
    {
        return $this->hasOne(AcctLedgmain::class, ['mainCode' => 'mainCode']);
    }
    //
    //
    public function beforeSave($insert) {
           $this->ledgSub=str_pad($this->ledgSub, 3, '0', STR_PAD_RIGHT); //padding upto 3 numbers
           $this->ledgCode = $this->mainCode.$this->ledgSub;
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
