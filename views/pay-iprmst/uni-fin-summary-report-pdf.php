<style>
    .emp-container {
        padding: 10px;
        margin-top: 25px;
    }

    h1 {
        font-size: 13px;
        text-align: center;
    }

    .fl-table {
        font-size: 12.5px;
        font-weight: normal;
        border: 1px solid black;
    }

    .fl-table,
    .fl-table th,
    .fl-table td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .fl-table td {
        padding: 0.5px 5px 0.5px 5px;
    }

    .fl-table th {
        padding: 3px 5px 3px 5px;
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
    <?php
    $option = 'Monthly';
    if ($request['option'] == 'cumalative') {
        $option = 'Cumalative';
    }

    $employee = 'All';
    if ($request['empAcademic'] == 'A') {
        $employee = 'Academic';
    } else if ($request['empAcademic'] == 'N') {
        $employee = 'Non Academic';
    }
    ?>

    <h1><?= 'Buddhist and Pali University : ' . $option . ' Salary - ' . date("F", mktime(0, 0, 0, $request['month'], 10)) . ' ' . $request['year'] . ' (' . $employee. ' Employees)'; ?></h1>

    <?php if ($summary != null) { ?>
        <table class="fl-table" style="margin-top: 25px; width: 100%; border: none;">
            <thead>
                <tr>
                    <th width="5%" class="bb-none bt-none bl-none br-none"></th>
                    <th colspan="2" class="bb-none bt-none bl-none br-none"></th>

                    <?php
                    $totSumIprmNopay = $totSumIprmOPay = $totSumIprmGross = $totSumIprmSubTot = 0.00;
                    $totSumIprmTotDed = $totSumIprmBalBank = $totSumIprmBalCash = $totSumIprmBalBStd = $totSumIprmUPF15 = $totSumIprmETF3 = $totSumIprmUP8 = 0.00;
                    $totSumIprmA1 = $totSumIprmA2 = $totSumIprmA3 = $totSumIprmA4 = $totSumIprmA5 = $totSumIprmA6 = $totSumIprmA7 = 0.00;
                    $totSumIprmA8 = $totSumIprmA9 = $totSumIprmA10 = $totSumIprmA11 = $totSumIprmA12 = $totSumIprmA13 = $totSumIprmA14 = 0.00;

                    $totSumIprmD1 = $totSumIprmD2 = $totSumIprmD3 = $totSumIprmD4 = $totSumIprmD5 = $totSumIprmD6 = $totSumIprmD7 = 0.00;
                    $totSumIprmD8 = $totSumIprmD9 = $totSumIprmD10 = $totSumIprmD11 = $totSumIprmD12 = $totSumIprmD13 = $totSumIprmD14 = 0.00;
                    $totSumIprmD15 = $totSumIprmD16 = $totSumIprmD17 = $totSumIprmD18 = $totSumIprmD19 = $totSumIprmD20 = $totSumIprmD21 = 0.00;
                    $totSumIprmD22 = $totSumIprmD23 = $totSumIprmD24 = $totSumIprmD25 = $totSumIprmD26 = $totSumIprmD27 = $totSumIprmD28 = $totSumIprmD29 = $totSumIprmD30 = 0.00;

                    foreach ($summary as $key => $sm) {
                        $totSumIprmA1 += $sm['sum_iprmA1'];
                        $totSumIprmA2 += $sm['sum_iprmA2'];
                        $totSumIprmA3 += $sm['sum_iprmA3'];
                        $totSumIprmA4 += $sm['sum_iprmA4'];
                        $totSumIprmA5 += $sm['sum_iprmA5'];
                        $totSumIprmA6 += $sm['sum_iprmA6'];
                        $totSumIprmA7 += $sm['sum_iprmA7'];
                        $totSumIprmA8 += $sm['sum_iprmA8'];
                        $totSumIprmA9 += $sm['sum_iprmA9'];
                        $totSumIprmA10 += $sm['sum_iprmA10'];
                        $totSumIprmA11 += $sm['sum_iprmA11'];
                        $totSumIprmA12 += $sm['sum_iprmA12'];
                        $totSumIprmA13 += $sm['sum_iprmA13'];
                        $totSumIprmA14 += $sm['sum_iprmA14'];

                        $totSumIprmNopay += $sm['sum_iprmNopay'];
                        $totSumIprmOPay += $sm['sum_iprmOPay'];
                        $totSumIprmGross += $sm['sum_iprmGross'];
                        $totSumIprmSubTot += $sm['sum_iprmSubTot'];

                        $totSumIprmD1 += $sm['sum_iprmD1'];
                        $totSumIprmD2 += $sm['sum_iprmD2'];
                        $totSumIprmD3 += $sm['sum_iprmD3'];
                        $totSumIprmD4 += $sm['sum_iprmD4'];
                        $totSumIprmD5 += $sm['sum_iprmD5'];
                        $totSumIprmD6 += $sm['sum_iprmD6'];
                        $totSumIprmD7 += $sm['sum_iprmD7'];
                        $totSumIprmD8 += $sm['sum_iprmD8'];
                        $totSumIprmD9 += $sm['sum_iprmD9'];
                        $totSumIprmD10 += $sm['sum_iprmD10'];
                        $totSumIprmD11 += $sm['sum_iprmD11'];
                        $totSumIprmD12 += $sm['sum_iprmD12'];
                        $totSumIprmD13 += $sm['sum_iprmD13'];
                        $totSumIprmD14 += $sm['sum_iprmD14'];
                        $totSumIprmD15 += $sm['sum_iprmD15'];
                        $totSumIprmD16 += $sm['sum_iprmD16'];
                        $totSumIprmD17 += $sm['sum_iprmD17'];
                        $totSumIprmD18 += $sm['sum_iprmD18'];
                        $totSumIprmD19 += $sm['sum_iprmD19'];
                        $totSumIprmD20 += $sm['sum_iprmD20'];
                        $totSumIprmD21 += $sm['sum_iprmD21'];
                        $totSumIprmD22 += $sm['sum_iprmD22'];
                        $totSumIprmD23 += $sm['sum_iprmD23'];
                        $totSumIprmD24 += $sm['sum_iprmD24'];
                        $totSumIprmD25 += $sm['sum_iprmD25'];
                        $totSumIprmD26 += $sm['sum_iprmD26'];
                        $totSumIprmD27 += $sm['sum_iprmD27'];
                        $totSumIprmD28 += $sm['sum_iprmD28'];
                        $totSumIprmD29 += $sm['sum_iprmD29'];
                        $totSumIprmD30 += $sm['sum_iprmD30'];

                        $totSumIprmTotDed += $sm['sum_iprmTotDed'];
                        $totSumIprmBalBank += $sm['sum_iprmBalBank'];
                        $totSumIprmBalCash += $sm['sum_iprmBalCash'];
                        $totSumIprmBalBStd += $sm['sum_iprmBalBStd'];
                        $totSumIprmUPF15 += $sm['sum_iprmUPF15'];
                        $totSumIprmETF3 += $sm['sum_iprmETF3'];
                        $totSumIprmUP8 += $sm['sum_iprmUP8'];
                    ?>
                        <th class="align-center"><?= $sm['deptProg'] ?></th>
                    <?php } ?>
                    <th class="align-center">Total</th>
                    <th width="5%" class="bb-none bt-none bl-none br-none"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Basic Salary</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmA1'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmA1, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Increments & Arrears</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA2'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA2, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Arrears - Prv. Years</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA3'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA3, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Research Allowance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA4'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA4, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Other Allowances</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA5'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA5, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Cost of Living</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA6'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA6, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Dean/Head Allowance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA7'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA7, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Monthly Comp. Allow.</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA8'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA8, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Addl. Monthly Allowance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA9'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA9, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Academic Allowance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA10'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA10, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Prop. Intr. Rcvd. Govt</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA11'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA11, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">10% Allowance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA12'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA12, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Fuel & Vehicle Allowance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['sum_iprmA13'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totSumIprmA13, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Other Income</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmA14'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmA14, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td width="6%" style="text-wrap: nowrap;" class="bb-none br-none">Less :</td>
                    <td class="bb-none bl-none">No Pay</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmNopay'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmNopay, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td class="bt-none br-none"></td>
                    <td class="bt-none bl-none" style="text-wrap: nowrap;">Over Payments</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmOPay'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmOPay, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;">TOTAL EPF</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right"><?= number_format($sm['sum_iprmSubTot'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right"><?= number_format($totSumIprmSubTot, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;">GROSS PAY</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right"><?= number_format($sm['sum_iprmGross'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right"><?= number_format($totSumIprmGross, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">EPF - 10%</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmD1'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmD1, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Medical Fund (1%)</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD2'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD2, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Deduction</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD3'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD3, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Stamp Duty</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD4'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD4, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Salary/Other Advance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmD5'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmD5, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Festival Advance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmD6'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmD6, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Special Advance</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD7'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD7, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Provident Fund Loan</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD8'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD8, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Distress Loan</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD9'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD9, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Distress Ln - Interest</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmD10'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmD10, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Bicycle Loan</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmD11'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmD11, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Bicycle Ln - Interest</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD12'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD12, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Other Loans</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD13'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD13, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Union - JSS</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD14'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD14, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Sub Warden Union</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmD15'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmD15, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Welfare Society</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmD16'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmD16, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Academic Union</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD17'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD17, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Librarian Union</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD18'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD18, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Hostel Charges</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD19'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD19, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Over Payments</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmD20'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmD20, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Union - Anthar</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmD21'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmD21, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Water & Electricity</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD22'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD22, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Prepaid Other Income</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD23'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD23, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">PAYE Tax</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD24'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD24, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">SLNSS</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmD25'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmD25, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Bank Ln/Insure etc.</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmD26'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmD26, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Spl Adv - Interest</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD27'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD27, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Tax - Other Income</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD28'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD28, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Telephone Charges</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmD29'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmD29, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Tax Adjustments</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmD30'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmD30, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;">TOTAL DEDUCTIONS</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right"><?= number_format($sm['sum_iprmTotDed'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right"><?= number_format($totSumIprmTotDed, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Bank</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmBalBank'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmBalBank, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Cash</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmBalCash'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmBalCash, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Bank Standing Order</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmBalBStd'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmBalBStd, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">EPF 15%</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none"><?= number_format($sm['sum_iprmUPF15'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totSumIprmUPF15, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">ETF 3%</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['sum_iprmETF3'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totSumIprmETF3, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Medical 5%</td>
                    <?php foreach ($summary as $key => $sm) { ?>
                        <td class="align-right bt-none"><?= number_format($sm['sum_iprmUP8'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totSumIprmUP8, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
</div>