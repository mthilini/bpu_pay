<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_payetot".
 *
 * @property string $empUPFNo
 * @property string $ptFMon
 * @property string $ptFYear
 * @property string $ptTMon
 * @property string $ptTYear
 * @property float $ptTotGross
 * @property float $ptTotOth
 * @property float $ptTotNonMon
 * @property float $ptTotLump
 * @property float $ptTotPAYE
 * @property float $ptTotPrvPAYE
 * @property float $ptTotLumpPAYE
 * @property float $ptTotDeduct
 * @property float $ptTotDeductPAYE
 * @property float $ptTotAdjust
 * @property float $ptTotAdjustPAYE
 */
class PayPayetot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_payetot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ptTotGross', 'ptTotOth', 'ptTotNonMon', 'ptTotLump', 'ptTotPAYE', 'ptTotPrvPAYE', 'ptTotLumpPAYE', 'ptTotDeduct', 'ptTotDeductPAYE', 'ptTotAdjust', 'ptTotAdjustPAYE'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['ptFMon', 'ptTMon'], 'string', 'max' => 2],
            [['ptFYear', 'ptTYear'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empUPFNo' => 'Emp Upf No',
            'ptFMon' => 'Pt F Mon',
            'ptFYear' => 'Pt F Year',
            'ptTMon' => 'Pt T Mon',
            'ptTYear' => 'Pt T Year',
            'ptTotGross' => 'Pt Tot Gross',
            'ptTotOth' => 'Pt Tot Oth',
            'ptTotNonMon' => 'Pt Tot Non Mon',
            'ptTotLump' => 'Pt Tot Lump',
            'ptTotPAYE' => 'Pt Tot Paye',
            'ptTotPrvPAYE' => 'Pt Tot Prv Paye',
            'ptTotLumpPAYE' => 'Pt Tot Lump Paye',
            'ptTotDeduct' => 'Pt Tot Deduct',
            'ptTotDeductPAYE' => 'Pt Tot Deduct Paye',
            'ptTotAdjust' => 'Pt Tot Adjust',
            'ptTotAdjustPAYE' => 'Pt Tot Adjust Paye',
        ];
    }
}
