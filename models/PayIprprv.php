<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_iprprv".
 *
 * @property string|null $empUPFNo
 * @property string|null $iprpDate
 * @property float|null $iprpA1
 * @property float|null $iprpA2
 * @property float|null $iprpA3
 * @property float|null $iprpA4
 * @property float|null $iprpA5
 * @property float|null $iprpA6
 * @property float|null $iprpA7
 * @property float|null $iprpA8
 * @property float|null $iprpA9
 * @property float|null $iprpA10
 * @property float|null $iprpA11
 * @property float|null $iprpA12
 * @property float|null $iprpA13
 * @property float|null $iprpA14
 * @property float|null $iprpSubTot
 * @property float|null $iprpNopay
 * @property float|null $iprpOPay
 * @property float|null $iprpGross
 * @property float|null $iprpD1
 * @property float|null $iprpD2
 * @property float|null $iprpD3
 * @property float|null $iprpD4
 * @property float|null $iprpD5
 * @property float|null $iprpD6
 * @property float|null $iprpD7
 * @property float|null $iprpD8
 * @property float|null $iprpD9
 * @property float|null $iprpD10
 * @property float|null $iprpD11
 * @property float|null $iprpD12
 * @property float|null $iprpD13
 * @property float|null $iprpD14
 * @property float|null $iprpD15
 * @property float|null $iprpD16
 * @property float|null $iprpD17
 * @property float|null $iprpD18
 * @property float|null $iprpD19
 * @property float|null $iprpD20
 * @property float|null $iprpD21
 * @property float|null $iprpD22
 * @property float|null $iprpD23
 * @property float|null $iprpD24
 * @property float|null $iprpD25
 * @property float|null $iprpD26
 * @property float|null $iprpD27
 * @property float|null $iprpD28
 * @property float|null $iprpD29
 * @property float|null $iprpD30
 * @property float|null $iprpD31
 * @property float|null $iprpD32
 * @property float|null $iprpD33
 * @property float|null $iprpD34
 * @property float|null $iprpD35
 * @property float|null $iprpD36
 * @property float|null $iprpD37
 * @property float|null $iprpD38
 * @property float|null $iprpD39
 * @property float|null $iprpD40
 * @property float|null $iprpTotDed
 * @property float|null $iprpBalBank
 * @property float|null $iprpBalCash
 * @property float|null $iprpBalBStd
 * @property float|null $iprpUPF15
 * @property float|null $iprpETF3
 * @property float|null $iprpUP8
 */
class PayIprprv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_iprprv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iprpDate'], 'safe'],
            [['iprpA1', 'iprpA2', 'iprpA3', 'iprpA4', 'iprpA5', 'iprpA6', 'iprpA7', 'iprpA8', 'iprpA9', 'iprpA10', 'iprpA11', 'iprpA12', 'iprpA13', 'iprpA14', 'iprpSubTot', 'iprpNopay', 'iprpOPay', 'iprpGross', 'iprpD1', 'iprpD2', 'iprpD3', 'iprpD4', 'iprpD5', 'iprpD6', 'iprpD7', 'iprpD8', 'iprpD9', 'iprpD10', 'iprpD11', 'iprpD12', 'iprpD13', 'iprpD14', 'iprpD15', 'iprpD16', 'iprpD17', 'iprpD18', 'iprpD19', 'iprpD20', 'iprpD21', 'iprpD22', 'iprpD23', 'iprpD24', 'iprpD25', 'iprpD26', 'iprpD27', 'iprpD28', 'iprpD29', 'iprpD30', 'iprpD31', 'iprpD32', 'iprpD33', 'iprpD34', 'iprpD35', 'iprpD36', 'iprpD37', 'iprpD38', 'iprpD39', 'iprpD40', 'iprpTotDed', 'iprpBalBank', 'iprpBalCash', 'iprpBalBStd', 'iprpUPF15', 'iprpETF3', 'iprpUP8'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['empUPFNo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empUPFNo' => 'Emp Upf No',
            'iprpDate' => 'Iprp Date',
            'iprpA1' => 'Iprp A1',
            'iprpA2' => 'Iprp A2',
            'iprpA3' => 'Iprp A3',
            'iprpA4' => 'Iprp A4',
            'iprpA5' => 'Iprp A5',
            'iprpA6' => 'Iprp A6',
            'iprpA7' => 'Iprp A7',
            'iprpA8' => 'Iprp A8',
            'iprpA9' => 'Iprp A9',
            'iprpA10' => 'Iprp A10',
            'iprpA11' => 'Iprp A11',
            'iprpA12' => 'Iprp A12',
            'iprpA13' => 'Iprp A13',
            'iprpA14' => 'Iprp A14',
            'iprpSubTot' => 'Iprp Sub Tot',
            'iprpNopay' => 'Iprp Nopay',
            'iprpOPay' => 'Iprp O Pay',
            'iprpGross' => 'Iprp Gross',
            'iprpD1' => 'Iprp D1',
            'iprpD2' => 'Iprp D2',
            'iprpD3' => 'Iprp D3',
            'iprpD4' => 'Iprp D4',
            'iprpD5' => 'Iprp D5',
            'iprpD6' => 'Iprp D6',
            'iprpD7' => 'Iprp D7',
            'iprpD8' => 'Iprp D8',
            'iprpD9' => 'Iprp D9',
            'iprpD10' => 'Iprp D10',
            'iprpD11' => 'Iprp D11',
            'iprpD12' => 'Iprp D12',
            'iprpD13' => 'Iprp D13',
            'iprpD14' => 'Iprp D14',
            'iprpD15' => 'Iprp D15',
            'iprpD16' => 'Iprp D16',
            'iprpD17' => 'Iprp D17',
            'iprpD18' => 'Iprp D18',
            'iprpD19' => 'Iprp D19',
            'iprpD20' => 'Iprp D20',
            'iprpD21' => 'Iprp D21',
            'iprpD22' => 'Iprp D22',
            'iprpD23' => 'Iprp D23',
            'iprpD24' => 'Iprp D24',
            'iprpD25' => 'Iprp D25',
            'iprpD26' => 'Iprp D26',
            'iprpD27' => 'Iprp D27',
            'iprpD28' => 'Iprp D28',
            'iprpD29' => 'Iprp D29',
            'iprpD30' => 'Iprp D30',
            'iprpD31' => 'Iprp D31',
            'iprpD32' => 'Iprp D32',
            'iprpD33' => 'Iprp D33',
            'iprpD34' => 'Iprp D34',
            'iprpD35' => 'Iprp D35',
            'iprpD36' => 'Iprp D36',
            'iprpD37' => 'Iprp D37',
            'iprpD38' => 'Iprp D38',
            'iprpD39' => 'Iprp D39',
            'iprpD40' => 'Iprp D40',
            'iprpTotDed' => 'Iprp Tot Ded',
            'iprpBalBank' => 'Iprp Bal Bank',
            'iprpBalCash' => 'Iprp Bal Cash',
            'iprpBalBStd' => 'Iprp Bal B Std',
            'iprpUPF15' => 'Iprp Upf15',
            'iprpETF3' => 'Iprp Etf3',
            'iprpUP8' => 'Iprp Up8',
        ];
    }
}
