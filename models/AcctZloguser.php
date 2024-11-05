<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_zloguser".
 *
 * @property int $id
 * @property string|null $loguDate
 * @property string|null $loguUser
 * @property string $loguRmks
 * @property string $loguType
 * @property string $loguVersion
 */
class AcctZloguser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_zloguser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loguDate'], 'safe'],
            [['loguUser'], 'string', 'max' => 15],
            [['loguRmks'], 'string', 'max' => 100],
            [['loguType'], 'string', 'max' => 1],
            [['loguVersion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'loguDate' => 'Logu Date',
            'loguUser' => 'Logu User',
            'loguRmks' => 'Logu Rmks',
            'loguType' => 'Logu Type',
            'loguVersion' => 'Logu Version',
        ];
    }
}
