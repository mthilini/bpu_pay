<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_dept".
 *
 * @property int $id
 * @property string $deptCode
 * @property string $deptName
 * @property string|null $deptProg
 * @property string|null $deptProj
 * @property string|null $deptUPF
 */
class PayDept extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_dept';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'deptCode', 'deptName'], 'required'],
            [['id'], 'integer'],
            [['deptCode', 'deptProj'], 'string', 'max' => 3],
            [['deptName'], 'string', 'max' => 30],
            [['deptProg'], 'string', 'max' => 2],
            [['deptUPF'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deptCode' => 'Dept Code',
            'deptName' => 'Dept Name',
            'deptProg' => 'Dept Prog',
            'deptProj' => 'Dept Proj',
            'deptUPF' => 'Dept Upf',
        ];
    }
}
