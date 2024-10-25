<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property int $empepf
 * @property string $empNIC
 * @property string $empTitle
 * @property string|null $empSurname
 * @property string|null $empInitials
 * @property string $namedenotedbyinitials
 * @property string|null $empNames
 * @property string $namewithinitials
 * @property string|null $empGender
 * @property string $empAddress1
 * @property string $empAddress2
 * @property string $empAddress3
 * @property int|null $empfact
 * @property int|null $empfacts
 * @property int|null $empDept
 * @property int|null $empDepts
 * @property int|null $empDesig
 * @property string $empDtBirth
 * @property string|null $empTelno
 * @property int $empDistrict
 * @property string $empStatus
 * @property string|null $empGrade
 * @property string|null $empGrades
 * @property string|null $empType
 * @property string|null $empResearch
 * @property string|null $empUPFNo
 * @property string|null $empETFNo
 * @property string $empDtAppt
 * @property int|null $empfirstDesig
 * @property string $empDtAssm
 * @property string|null $empDtIncr
 * @property string|null $empDtConf
 * @property string $empDtret
 * @property string $empAcademicStatus
 * @property int $IsActive
 * @property string|null $empRet
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $profile_image
 * @property string|null $personalfileNo
 * @property string|null $email
 * @property string|null $empOtherDesig
 * @property string|null $titlesinhala
 * @property string|null $initialssinhala
 * @property string|null $namesinhala
 * @property string|null $addresssinhala1
 * @property string|null $addresssinhala2
 * @property string|null $addresssinhala3
 * @property string|null $genders
 * @property string|null $districts
 * @property string|null $designations
 * @property string|null $empSurnamesinhala
 * @property string $namewithinitialssinhala
 * @property string $namedenotedbyinitialssinhala
 *
 * @property AcademicPostAppoinments[] $academicPostAppoinments
 * @property FxGrnHistory[] $fxGrnHistories
 * @property GinHistory[] $ginHistories
 * @property GrnHistory[] $grnHistories
 * @property Grns[] $grns
 * @property Grns[] $grns0
 * @property Grns[] $grns1
 * @property StoConisshdrs[] $stoConisshdrs
 * @property StoConisshdrs[] $stoConisshdrs0
 * @property StoConisshdrs[] $stoConisshdrs1
 * @property StoFxrcthdrs[] $stoFxrcthdrs
 * @property StoFxrcthdrs[] $stoFxrcthdrs0
 * @property StoFxrcthdrs[] $stoFxrcthdrs1
 * @property Users[] $users
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empepf', 'empNIC', 'empTitle', 'namedenotedbyinitials', 'namewithinitials', 'empAddress1', 'empAddress2', 'empAddress3', 'empDtBirth', 'empDistrict', 'empStatus', 'empDtAppt', 'empDtAssm', 'empDtret', 'empAcademicStatus', 'namewithinitialssinhala', 'namedenotedbyinitialssinhala'], 'required'],
            [['empepf', 'empfact', 'empfacts', 'empDept', 'empDepts', 'empDesig', 'empDistrict', 'empfirstDesig', 'IsActive'], 'integer'],
            [['empDtBirth', 'empDtAppt', 'empDtAssm', 'empDtIncr', 'empDtConf', 'empDtret', 'created_at', 'updated_at'], 'safe'],
            [['empNIC', 'empTitle', 'empSurname', 'empInitials', 'namedenotedbyinitials', 'empNames', 'namewithinitials', 'empGender', 'empAddress1', 'empAddress2', 'empAddress3', 'empStatus', 'empGrade', 'empType', 'empResearch', 'empUPFNo', 'empETFNo', 'empAcademicStatus', 'email', 'initialssinhala', 'namesinhala', 'addresssinhala1', 'addresssinhala2', 'addresssinhala3', 'districts', 'designations', 'empSurnamesinhala', 'namewithinitialssinhala', 'namedenotedbyinitialssinhala'], 'string', 'max' => 191],
            [['empTelno', 'empOtherDesig', 'titlesinhala', 'genders'], 'string', 'max' => 20],
            [['empGrades'], 'string', 'max' => 200],
            [['empRet', 'personalfileNo'], 'string', 'max' => 100],
            [['profile_image'], 'string', 'max' => 255],
            [['empepf'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empepf' => 'Empepf',
            'empNIC' => 'Emp Nic',
            'empTitle' => 'Emp Title',
            'empSurname' => 'Emp Surname',
            'empInitials' => 'Emp Initials',
            'namedenotedbyinitials' => 'Namedenotedbyinitials',
            'empNames' => 'Emp Names',
            'namewithinitials' => 'Namewithinitials',
            'empGender' => 'Emp Gender',
            'empAddress1' => 'Emp Address1',
            'empAddress2' => 'Emp Address2',
            'empAddress3' => 'Emp Address3',
            'empfact' => 'Empfact',
            'empfacts' => 'Empfacts',
            'empDept' => 'Emp Dept',
            'empDepts' => 'Emp Depts',
            'empDesig' => 'Emp Desig',
            'empDtBirth' => 'Emp Dt Birth',
            'empTelno' => 'Emp Telno',
            'empDistrict' => 'Emp District',
            'empStatus' => 'Emp Status',
            'empGrade' => 'Emp Grade',
            'empGrades' => 'Emp Grades',
            'empType' => 'Emp Type',
            'empResearch' => 'Emp Research',
            'empUPFNo' => 'Emp Upf No',
            'empETFNo' => 'Emp Etf No',
            'empDtAppt' => 'Emp Dt Appt',
            'empfirstDesig' => 'Empfirst Desig',
            'empDtAssm' => 'Emp Dt Assm',
            'empDtIncr' => 'Emp Dt Incr',
            'empDtConf' => 'Emp Dt Conf',
            'empDtret' => 'Emp Dtret',
            'empAcademicStatus' => 'Emp Academic Status',
            'IsActive' => 'Is Active',
            'empRet' => 'Emp Ret',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'profile_image' => 'Profile Image',
            'personalfileNo' => 'Personalfile No',
            'email' => 'Email',
            'empOtherDesig' => 'Emp Other Desig',
            'titlesinhala' => 'Titlesinhala',
            'initialssinhala' => 'Initialssinhala',
            'namesinhala' => 'Namesinhala',
            'addresssinhala1' => 'Addresssinhala1',
            'addresssinhala2' => 'Addresssinhala2',
            'addresssinhala3' => 'Addresssinhala3',
            'genders' => 'Genders',
            'districts' => 'Districts',
            'designations' => 'Designations',
            'empSurnamesinhala' => 'Emp Surnamesinhala',
            'namewithinitialssinhala' => 'Namewithinitialssinhala',
            'namedenotedbyinitialssinhala' => 'Namedenotedbyinitialssinhala',
        ];
    }

    /**
     * Gets query for [[AcademicPostAppoinments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicPostAppoinments()
    {
        return $this->hasMany(AcademicPostAppoinments::class, ['emp_id' => 'id']);
    }

    /**
     * Gets query for [[FxGrnHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFxGrnHistories()
    {
        return $this->hasMany(FxGrnHistory::class, ['empepf' => 'empepf']);
    }

    /**
     * Gets query for [[GinHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGinHistories()
    {
        return $this->hasMany(GinHistory::class, ['empepf' => 'empepf']);
    }

    /**
     * Gets query for [[GrnHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrnHistories()
    {
        return $this->hasMany(GrnHistory::class, ['empepf' => 'empepf']);
    }

    /**
     * Gets query for [[Grns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrns()
    {
        return $this->hasMany(Grns::class, ['approved_by' => 'empepf']);
    }

    /**
     * Gets query for [[Grns0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrns0()
    {
        return $this->hasMany(Grns::class, ['certified_by' => 'empepf']);
    }

    /**
     * Gets query for [[Grns1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrns1()
    {
        return $this->hasMany(Grns::class, ['created_by' => 'empepf']);
    }

    /**
     * Gets query for [[StoConisshdrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoConisshdrs()
    {
        return $this->hasMany(StoConisshdrs::class, ['approved_by' => 'empepf']);
    }

    /**
     * Gets query for [[StoConisshdrs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoConisshdrs0()
    {
        return $this->hasMany(StoConisshdrs::class, ['certified_by' => 'empepf']);
    }

    /**
     * Gets query for [[StoConisshdrs1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoConisshdrs1()
    {
        return $this->hasMany(StoConisshdrs::class, ['created_by' => 'empepf']);
    }

    /**
     * Gets query for [[StoFxrcthdrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoFxrcthdrs()
    {
        return $this->hasMany(StoFxrcthdrs::class, ['approved_by' => 'empepf']);
    }

    /**
     * Gets query for [[StoFxrcthdrs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoFxrcthdrs0()
    {
        return $this->hasMany(StoFxrcthdrs::class, ['certified_by' => 'empepf']);
    }

    /**
     * Gets query for [[StoFxrcthdrs1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoFxrcthdrs1()
    {
        return $this->hasMany(StoFxrcthdrs::class, ['created_by' => 'empepf']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['empepf' => 'empepf']);
    }
}
