<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_iprmst".
 *
 * @property string|null $empUPFNo
 * @property string|null $iprmDate
 * @property float|null $iprmA1
 * @property float|null $iprmA2
 * @property float|null $iprmA3
 * @property float|null $iprmA4
 * @property float|null $iprmA5
 * @property float|null $iprmA6
 * @property float|null $iprmA7
 * @property float|null $iprmA8
 * @property float|null $iprmA9
 * @property float|null $iprmA10
 * @property float|null $iprmA11
 * @property float|null $iprmA12
 * @property float|null $iprmA13
 * @property float|null $iprmA14
 * @property float|null $iprmSubTot
 * @property float|null $iprmNopay
 * @property float|null $iprmOPay
 * @property float|null $iprmGross
 * @property float|null $iprmD1
 * @property float|null $iprmD2
 * @property float|null $iprmD3
 * @property float|null $iprmD4
 * @property float|null $iprmD5
 * @property float|null $iprmD6
 * @property float|null $iprmD7
 * @property float|null $iprmD8
 * @property float|null $iprmD9
 * @property float|null $iprmD10
 * @property float|null $iprmD11
 * @property float|null $iprmD12
 * @property float|null $iprmD13
 * @property float|null $iprmD14
 * @property float|null $iprmD15
 * @property float|null $iprmD16
 * @property float|null $iprmD17
 * @property float|null $iprmD18
 * @property float|null $iprmD19
 * @property float|null $iprmD20
 * @property float|null $iprmD21
 * @property float|null $iprmD22
 * @property float|null $iprmD23
 * @property float|null $iprmD24
 * @property float|null $iprmD25
 * @property float|null $iprmD26
 * @property float|null $iprmD27
 * @property float|null $iprmD28
 * @property float|null $iprmD29
 * @property float|null $iprmD30
 * @property float|null $iprmD31
 * @property float|null $iprmD32
 * @property float|null $iprmD33
 * @property float|null $iprmD34
 * @property float|null $iprmD35
 * @property float|null $iprmD36
 * @property float|null $iprmD37
 * @property float|null $iprmD38
 * @property float|null $iprmD39
 * @property float|null $iprmD40
 * @property float|null $iprmTotDed
 * @property float|null $iprmBalBank
 * @property float|null $iprmBalCash
 * @property float|null $iprmBalBStd
 * @property float|null $iprmUPF15
 * @property float|null $iprmETF3
 * @property float|null $iprmUP8
 */
class PayIprmst extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_iprmst';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iprmDate', 'month', 'column'], 'safe'],
            [['iprmA1', 'iprmA2', 'iprmA3', 'iprmA4', 'iprmA5', 'iprmA6', 'iprmA7', 'iprmA8', 'iprmA9', 'iprmA10', 'iprmA11', 'iprmA12', 'iprmA13', 'iprmA14', 'iprmSubTot', 'iprmNopay', 'iprmOPay', 'iprmGross', 'iprmD1', 'iprmD2', 'iprmD3', 'iprmD4', 'iprmD5', 'iprmD6', 'iprmD7', 'iprmD8', 'iprmD9', 'iprmD10', 'iprmD11', 'iprmD12', 'iprmD13', 'iprmD14', 'iprmD15', 'iprmD16', 'iprmD17', 'iprmD18', 'iprmD19', 'iprmD20', 'iprmD21', 'iprmD22', 'iprmD23', 'iprmD24', 'iprmD25', 'iprmD26', 'iprmD27', 'iprmD28', 'iprmD29', 'iprmD30', 'iprmD31', 'iprmD32', 'iprmD33', 'iprmD34', 'iprmD35', 'iprmD36', 'iprmD37', 'iprmD38', 'iprmD39', 'iprmD40', 'iprmTotDed', 'iprmBalBank', 'iprmBalCash', 'iprmBalBStd', 'iprmUPF15', 'iprmETF3', 'iprmUP8'], 'number'],
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
            'iprmDate' => 'Iprm Date',
            'iprmA1' => 'Iprm A1',
            'iprmA2' => 'Iprm A2',
            'iprmA3' => 'Iprm A3',
            'iprmA4' => 'Iprm A4',
            'iprmA5' => 'Iprm A5',
            'iprmA6' => 'Iprm A6',
            'iprmA7' => 'Iprm A7',
            'iprmA8' => 'Iprm A8',
            'iprmA9' => 'Iprm A9',
            'iprmA10' => 'Iprm A10',
            'iprmA11' => 'Iprm A11',
            'iprmA12' => 'Iprm A12',
            'iprmA13' => 'Iprm A13',
            'iprmA14' => 'Iprm A14',
            'iprmSubTot' => 'Iprm Sub Tot',
            'iprmNopay' => 'Iprm Nopay',
            'iprmOPay' => 'Iprm O Pay',
            'iprmGross' => 'Iprm Gross',
            'iprmD1' => 'Iprm D1',
            'iprmD2' => 'Iprm D2',
            'iprmD3' => 'Iprm D3',
            'iprmD4' => 'Iprm D4',
            'iprmD5' => 'Iprm D5',
            'iprmD6' => 'Iprm D6',
            'iprmD7' => 'Iprm D7',
            'iprmD8' => 'Iprm D8',
            'iprmD9' => 'Iprm D9',
            'iprmD10' => 'Iprm D10',
            'iprmD11' => 'Iprm D11',
            'iprmD12' => 'Iprm D12',
            'iprmD13' => 'Iprm D13',
            'iprmD14' => 'Iprm D14',
            'iprmD15' => 'Iprm D15',
            'iprmD16' => 'Iprm D16',
            'iprmD17' => 'Iprm D17',
            'iprmD18' => 'Iprm D18',
            'iprmD19' => 'Iprm D19',
            'iprmD20' => 'Iprm D20',
            'iprmD21' => 'Iprm D21',
            'iprmD22' => 'Iprm D22',
            'iprmD23' => 'Iprm D23',
            'iprmD24' => 'Iprm D24',
            'iprmD25' => 'Iprm D25',
            'iprmD26' => 'Iprm D26',
            'iprmD27' => 'Iprm D27',
            'iprmD28' => 'Iprm D28',
            'iprmD29' => 'Iprm D29',
            'iprmD30' => 'Iprm D30',
            'iprmD31' => 'Iprm D31',
            'iprmD32' => 'Iprm D32',
            'iprmD33' => 'Iprm D33',
            'iprmD34' => 'Iprm D34',
            'iprmD35' => 'Iprm D35',
            'iprmD36' => 'Iprm D36',
            'iprmD37' => 'Iprm D37',
            'iprmD38' => 'Iprm D38',
            'iprmD39' => 'Iprm D39',
            'iprmD40' => 'Iprm D40',
            'iprmTotDed' => 'Iprm Tot Ded',
            'iprmBalBank' => 'Iprm Bal Bank',
            'iprmBalCash' => 'Iprm Bal Cash',
            'iprmBalBStd' => 'Iprm Bal B Std',
            'iprmUPF15' => 'Iprm Upf15',
            'iprmETF3' => 'Iprm Etf3',
            'iprmUP8' => 'Iprm Up8',
            'month' => 'Month',
            'column' => 'Column'
        ];
    }
}
