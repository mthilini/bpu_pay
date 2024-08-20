<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acct_fmepfcontr".
 *
 * @property int $id
 * @property string $empUPFNo
 * @property string $epfYear
 * @property float $epfBalStart
 * @property float $epfJan10
 * @property float $epfJan15
 * @property float $epfFeb10
 * @property float $epfFeb15
 * @property float $epfMar10
 * @property float $epfMar15
 * @property float $epfApr10
 * @property float $epfApr15
 * @property float $epfMay10
 * @property float $epfMay15
 * @property float $epfJun10
 * @property float $epfJun15
 * @property float $epfJul10
 * @property float $epfJul15
 * @property float $epfAug10
 * @property float $epfAug15
 * @property float $epfSep10
 * @property float $epfSep15
 * @property float $epfOct10
 * @property float $epfOct15
 * @property float $epfNov10
 * @property float $epfNov15
 * @property float $epfDec10
 * @property float $epfDec15
 * @property float $epfIntrRate
 * @property float $epfInterest
 * @property float $epfBalEnd
 */
class AcctFmepfcontr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acct_fmepfcontr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['epfBalStart', 'epfJan10', 'epfJan15', 'epfFeb10', 'epfFeb15', 'epfMar10', 'epfMar15', 'epfApr10', 'epfApr15', 'epfMay10', 'epfMay15', 'epfJun10', 'epfJun15', 'epfJul10', 'epfJul15', 'epfAug10', 'epfAug15', 'epfSep10', 'epfSep15', 'epfOct10', 'epfOct15', 'epfNov10', 'epfNov15', 'epfDec10', 'epfDec15', 'epfIntrRate', 'epfInterest', 'epfBalEnd'], 'number'],
            [['empUPFNo'], 'string', 'max' => 8],
            [['epfYear'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empUPFNo' => 'EPF No',
            'epfYear' => 'Year',
            'epfBalStart' => 'Starting Balance',
            'epfJan10' => 'Jan 10%',
            'epfJan15' => 'Jan 15%',
            'epfFeb10' => 'Feb 10%',
            'epfFeb15' => 'Feb 15%',
            'epfMar10' => 'Mar 10%',
            'epfMar15' => 'Mar 15%',
            'epfApr10' => 'Apr 10%',
            'epfApr15' => 'Apr 15%',
            'epfMay10' => 'May 10%',
            'epfMay15' => 'May 15%',
            'epfJun10' => 'Jun 10%',
            'epfJun15' => 'Jun 15%',
            'epfJul10' => 'Jul 10%',
            'epfJul15' => 'Jul 15%',
            'epfAug10' => 'Aug 10%',
            'epfAug15' => 'Aug 15%',
            'epfSep10' => 'Sep 10%',
            'epfSep15' => 'Sep 15%',
            'epfOct10' => 'Oct 10%',
            'epfOct15' => 'Oct 15%',
            'epfNov10' => 'Nov 10%',
            'epfNov15' => 'Nov 15%',
            'epfDec10' => 'Dec 10%',
            'epfDec15' => 'Dec 15%',
            'epfIntrRate' => 'Interest Rate',
            'epfInterest' => 'Interest',
            'epfBalEnd' => 'Closing Balance',
        ];
    }
}
