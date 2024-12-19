<style>
    .emp-container {
        padding: 10px;
        margin-top: 10px;
    }

    h1 {
        text-align: center;
        font-size: 15.5px;
    }

    h2 {
        text-align: center;
        font-size: 14.5px;
    }

    .fl-table {
        font-size: 13.5px;
        font-weight: normal;
        border: 1px solid black;
    }

    .fl-table,
    .fl-table th,
    .fl-table td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .fl-table td,
    .fl-table th {
        padding: 0.3px 5px 0.3px 5px;
    }

    .align-right {
        text-align: right !important;
    }

    .bt-none {
        border-top: none !important;
    }

    .bb-none {
        border-bottom: none !important;
    }

    .bl-none {
        border-left: none !important;
    }

    .br-none {
        border-right: none !important;
    }
</style>

<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0mm;
    }
</style>

<div class="emp-container">
    <h1 style="margin-bottom: 0px; margin-top: 0px;">Buddhist and Pali University</h1>
    <h2 style="font-weight: 500; margin-bottom: 0px; margin-top: 0px;"><u>Program Project Reconcilation - <?= date('F Y') ?></u></h2>

    <?php if ($sumArray != null) { ?>
        <table class="fl-table" style="margin-top: 9px; width: 100%; border: none;">
            <thead>
                <tr>
                    <th width="8%" class="bb-none bt-none bl-none br-none"></th>
                    <th colspan="2" width="30%" class="bb-none bt-none bl-none br-none"></th>
                    <th width="18%"><?= date('F') ?></th>
                    <th width="18%"><?= date('F', strtotime('-1 month')); ?></th>
                    <th width="18%">Differnce</th>
                    <th width="8%" class="bb-none bt-none bl-none br-none"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">Basic Salary</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprA1'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpA1'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprA1'] - $sumArray['sum_iprpA1']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Increments & Arrears</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprA2'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpA2'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprA2'] - $sumArray['sum_iprpA2']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Arrears - Prv. Years</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprA3'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpA3'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprA3'] - $sumArray['sum_iprpA3']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Research Allowance</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA4'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA4'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA4'] - $sumArray['sum_iprpA4']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Other Allowances</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA5'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA5'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA5'] - $sumArray['sum_iprpA5']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Cost of Living</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA6'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA6'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA6'] - $sumArray['sum_iprpA6']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Dean/Head Allowance</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA7'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA7'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA7'] - $sumArray['sum_iprpA7']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Monthly Comp. Allow.</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA8'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA8'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA8'] - $sumArray['sum_iprpA8']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Addl. Monthly Allowance</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA9'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA9'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA9'] - $sumArray['sum_iprpA9']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Academic Allowance</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA10'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA10'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA10'] - $sumArray['sum_iprpA10']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Prop. Intr. Rcvd. Govt</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA11'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA11'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA11'] - $sumArray['sum_iprpA11']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">10% Allowance</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA12'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA12'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA12'] - $sumArray['sum_iprpA12']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none bb-none">Fuel & Vehicle Allowance</td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprA13'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format($sumArray['sum_iprpA13'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none bb-none"><?= number_format(($sumArray['sum_iprA13'] - $sumArray['sum_iprpA13']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">Other Income</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprA14'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpA14'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprA14'] - $sumArray['sum_iprpA14']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td width="6%" class="bb-none br-none">Less :</td>
                    <td class="bb-none bl-none">No Pay</td>
                    <td class="align-right bb-none "><?= number_format($sumArray['sum_iprNopay'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpNopay'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprNopay'] - $sumArray['sum_iprpNopay']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td class="bt-none br-none"></td>
                    <td class="bt-none bl-none">Over Payments</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprOPay'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpOPay'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprOPay'] - $sumArray['sum_iprpOPay']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2">TOTAL EPF</td>
                    <td class="align-right"><?= number_format($sumArray['sum_iprSubTot'], 2, '.', ','); ?></td>
                    <td class="align-right"><?= number_format($sumArray['sum_iprpSubTot'], 2, '.', ','); ?></td>
                    <td class="align-right"><?= number_format(($sumArray['sum_iprSubTot'] - $sumArray['sum_iprpSubTot']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2">GROSS PAY</td>
                    <td class="align-right"><?= number_format($sumArray['sum_iprGross'], 2, '.', ','); ?></td>
                    <td class="align-right"><?= number_format($sumArray['sum_iprpGross'], 2, '.', ','); ?></td>
                    <td class="align-right"><?= number_format(($sumArray['sum_iprGross'] - $sumArray['sum_iprpGross']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">EPF - 10%</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprD1'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpD1'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprD1'] - $sumArray['sum_iprpD1']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Medical Fund (1%)</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD2'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD2'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD2'] - $sumArray['sum_iprpD2']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Deduction</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD3'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD3'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD3'] - $sumArray['sum_iprpD3']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Stamp Duty</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD4'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD4'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD4'] - $sumArray['sum_iprpD4']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">Salary/Other Advance</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprD5'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpD5'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprD5'] - $sumArray['sum_iprpD5']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">Festival Advance</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprD6'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpD6'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprD6'] - $sumArray['sum_iprpD6']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Special Advance</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD7'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD7'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD7'] - $sumArray['sum_iprpD7']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Provident Fund Loan</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD8'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD8'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD8'] - $sumArray['sum_iprpD8']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Distress Loan</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD9'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD9'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD9'] - $sumArray['sum_iprpD9']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">Distress Ln - Interest</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprD10'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpD10'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprD10'] - $sumArray['sum_iprpD10']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">Bicycle Loan</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprD11'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpD11'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprD11'] - $sumArray['sum_iprpD11']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Bicycle Ln - Interest</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD12'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD12'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD12'] - $sumArray['sum_iprpD12']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Other Loans</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD13'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD13'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD13'] - $sumArray['sum_iprpD13']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Union - JSS</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD14'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD14'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD14'] - $sumArray['sum_iprpD14']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">Sub Warden Union</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprD15'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpD15'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprD15'] - $sumArray['sum_iprpD15']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">Welfare Society</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprD16'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpD16'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprD16'] - $sumArray['sum_iprpD16']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Academic Union</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD17'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD17'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD17'] - $sumArray['sum_iprpD17']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Librarian Union</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD18'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD18'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD18'] - $sumArray['sum_iprpD18']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Hostel Charges</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD19'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD19'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD19'] - $sumArray['sum_iprpD19']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">Over Payments</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprD20'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpD20'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprD20'] - $sumArray['sum_iprpD20']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">Union - Anthar</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprD21'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpD21'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprD21'] - $sumArray['sum_iprpD21']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Water & Electricity</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD22'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD22'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD22'] - $sumArray['sum_iprpD22']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Prepaid Other Income</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD23'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD23'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD23'] - $sumArray['sum_iprpD23']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">PAYE Tax</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD24'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD24'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD24'] - $sumArray['sum_iprpD24']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">SLNSS</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprD25'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpD25'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprD25'] - $sumArray['sum_iprpD25']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">Bank Ln/Insure etc.</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprD26'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpD26'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprD26'] - $sumArray['sum_iprpD26']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Spl Adv - Interest</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD27'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD27'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD27'] - $sumArray['sum_iprpD27']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Tax - Other Income</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD28'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD28'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD28'] - $sumArray['sum_iprpD28']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Telephone Charges</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprD29'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpD29'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprD29'] - $sumArray['sum_iprpD29']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">Tax Adjustments</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprD30'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpD30'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprD30'] - $sumArray['sum_iprpD30']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2">TOTAL DEDUCTIONS</td>
                    <td class="align-right"><?= number_format($sumArray['sum_iprTotDed'], 2, '.', ','); ?></td>
                    <td class="align-right"><?= number_format($sumArray['sum_iprpTotDed'], 2, '.', ','); ?></td>
                    <td class="align-right"><?= number_format(($sumArray['sum_iprTotDed'] - $sumArray['sum_iprpTotDed']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">Bank</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprBalBank'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpBalBank'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprBalBank'] - $sumArray['sum_iprpBalBank']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">Cash</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprBalCash'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpBalCash'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprBalCash'] - $sumArray['sum_iprpBalCash']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">Bank Standing Order</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprBalBStd'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpBalBStd'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprBalBStd'] - $sumArray['sum_iprpBalBStd']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none">EPF 15%</td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprUPF15'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format($sumArray['sum_iprpUPF15'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none"><?= number_format(($sumArray['sum_iprUPF15'] - $sumArray['sum_iprpUPF15']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bb-none bt-none">ETF 3%</td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprETF3'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format($sumArray['sum_iprpETF3'], 2, '.', ','); ?></td>
                    <td class="align-right bb-none bt-none"><?= number_format(($sumArray['sum_iprETF3'] - $sumArray['sum_iprpETF3']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" class="bt-none">Medical 5%</td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprUP8'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format($sumArray['sum_iprpUP8'], 2, '.', ','); ?></td>
                    <td class="align-right bt-none"><?= number_format(($sumArray['sum_iprUP8'] - $sumArray['sum_iprpUP8']), 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
</div>