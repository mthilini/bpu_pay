<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_ipr".
 *
 * @property string|null $empUPFNo
 * @property string|null $iprDate
 * @property float|null $iprA1
 * @property float|null $iprA2
 * @property float|null $iprA3
 * @property float|null $iprA4
 * @property float|null $iprA5
 * @property float|null $iprA6
 * @property float|null $iprA7
 * @property float|null $iprA8
 * @property float|null $iprA9
 * @property float|null $iprA10
 * @property float|null $iprA11
 * @property float|null $iprA12
 * @property float|null $iprA13
 * @property float|null $iprA14
 * @property float|null $iprSubTot
 * @property float|null $iprNopay
 * @property float|null $iprOPay
 * @property float|null $iprGross
 * @property float|null $iprD1
 * @property float|null $iprD2
 * @property float|null $iprD3
 * @property float|null $iprD4
 * @property float|null $iprD5
 * @property float|null $iprD6
 * @property float|null $iprD7
 * @property float|null $iprD8
 * @property float|null $iprD9
 * @property float|null $iprD10
 * @property float|null $iprD11
 * @property float|null $iprD12
 * @property float|null $iprD13
 * @property float|null $iprD14
 * @property float|null $iprD15
 * @property float|null $iprD16
 * @property float|null $iprD17
 * @property float|null $iprD18
 * @property float|null $iprD19
 * @property float|null $iprD20
 * @property float|null $iprD21
 * @property float|null $iprD22
 * @property float|null $iprD23
 * @property float|null $iprD24
 * @property float|null $iprD25
 * @property float|null $iprD26
 * @property float|null $iprD27
 * @property float|null $iprD28
 * @property float|null $iprD29
 * @property float|null $iprD30
 * @property float|null $iprD31
 * @property float|null $iprD32
 * @property float|null $iprD33
 * @property float|null $iprD34
 * @property float|null $iprD35
 * @property float|null $iprD36
 * @property float|null $iprD37
 * @property float|null $iprD38
 * @property float|null $iprD39
 * @property float|null $iprD40
 * @property float|null $iprTotDed
 * @property float|null $iprBalBank
 * @property float|null $iprBalCash
 * @property float|null $iprBalBStd
 * @property float|null $iprUPF15
 * @property float|null $iprETF3
 * @property float|null $iprUP8
 */
class PayIpr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_ipr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iprDate'], 'safe'],
            [['iprA1', 'iprA2', 'iprA3', 'iprA4', 'iprA5', 'iprA6', 'iprA7', 'iprA8', 'iprA9', 'iprA10', 'iprA11', 'iprA12', 'iprA13', 'iprA14', 'iprSubTot', 'iprNopay', 'iprOPay', 'iprGross', 'iprD1', 'iprD2', 'iprD3', 'iprD4', 'iprD5', 'iprD6', 'iprD7', 'iprD8', 'iprD9', 'iprD10', 'iprD11', 'iprD12', 'iprD13', 'iprD14', 'iprD15', 'iprD16', 'iprD17', 'iprD18', 'iprD19', 'iprD20', 'iprD21', 'iprD22', 'iprD23', 'iprD24', 'iprD25', 'iprD26', 'iprD27', 'iprD28', 'iprD29', 'iprD30', 'iprD31', 'iprD32', 'iprD33', 'iprD34', 'iprD35', 'iprD36', 'iprD37', 'iprD38', 'iprD39', 'iprD40', 'iprTotDed', 'iprBalBank', 'iprBalCash', 'iprBalBStd', 'iprUPF15', 'iprETF3', 'iprUP8'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empUPFNo' => 'Emp Upf No',
            'iprDate' => 'Ipr Date',
            'iprA1' => 'Ipr A1',
            'iprA2' => 'Ipr A2',
            'iprA3' => 'Ipr A3',
            'iprA4' => 'Ipr A4',
            'iprA5' => 'Ipr A5',
            'iprA6' => 'Ipr A6',
            'iprA7' => 'Ipr A7',
            'iprA8' => 'Ipr A8',
            'iprA9' => 'Ipr A9',
            'iprA10' => 'Ipr A10',
            'iprA11' => 'Ipr A11',
            'iprA12' => 'Ipr A12',
            'iprA13' => 'Ipr A13',
            'iprA14' => 'Ipr A14',
            'iprSubTot' => 'Ipr Sub Tot',
            'iprNopay' => 'Ipr Nopay',
            'iprOPay' => 'Ipr O Pay',
            'iprGross' => 'Ipr Gross',
            'iprD1' => 'Ipr D1',
            'iprD2' => 'Ipr D2',
            'iprD3' => 'Ipr D3',
            'iprD4' => 'Ipr D4',
            'iprD5' => 'Ipr D5',
            'iprD6' => 'Ipr D6',
            'iprD7' => 'Ipr D7',
            'iprD8' => 'Ipr D8',
            'iprD9' => 'Ipr D9',
            'iprD10' => 'Ipr D10',
            'iprD11' => 'Ipr D11',
            'iprD12' => 'Ipr D12',
            'iprD13' => 'Ipr D13',
            'iprD14' => 'Ipr D14',
            'iprD15' => 'Ipr D15',
            'iprD16' => 'Ipr D16',
            'iprD17' => 'Ipr D17',
            'iprD18' => 'Ipr D18',
            'iprD19' => 'Ipr D19',
            'iprD20' => 'Ipr D20',
            'iprD21' => 'Ipr D21',
            'iprD22' => 'Ipr D22',
            'iprD23' => 'Ipr D23',
            'iprD24' => 'Ipr D24',
            'iprD25' => 'Ipr D25',
            'iprD26' => 'Ipr D26',
            'iprD27' => 'Ipr D27',
            'iprD28' => 'Ipr D28',
            'iprD29' => 'Ipr D29',
            'iprD30' => 'Ipr D30',
            'iprD31' => 'Ipr D31',
            'iprD32' => 'Ipr D32',
            'iprD33' => 'Ipr D33',
            'iprD34' => 'Ipr D34',
            'iprD35' => 'Ipr D35',
            'iprD36' => 'Ipr D36',
            'iprD37' => 'Ipr D37',
            'iprD38' => 'Ipr D38',
            'iprD39' => 'Ipr D39',
            'iprD40' => 'Ipr D40',
            'iprTotDed' => 'Ipr Tot Ded',
            'iprBalBank' => 'Ipr Bal Bank',
            'iprBalCash' => 'Ipr Bal Cash',
            'iprBalBStd' => 'Ipr Bal B Std',
            'iprUPF15' => 'Ipr Upf15',
            'iprETF3' => 'Ipr Etf3',
            'iprUP8' => 'Ipr Up8',
        ];
    }
}
