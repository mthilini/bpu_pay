<style>
    .emp-container {
        padding: 10px;
        margin-top: 15px;
    }

    h2 {
        font-size: 13.5px;
    }

    .emp-tbl tbody tr {
        line-height: 19px;
    }

    .emp-tbl tbody td {
        font-size: 13.5px;
    }

    .fl-table {
        font-size: 12px;
        font-weight: normal;
        border: 1px solid black;
    }

    .fl-table,
    .fl-table th,
    .fl-table td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .fl-table td{
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
    <?php if ($employeeData != null) { ?>
        <table style="width: 100%;" class="emp-tbl">
            <tbody>
                <tr>
                    <td width="8%"></td>
                    <td colspan="3"><b><?= 'Buddhist and Pali University : Indiviudal Pay Record - ' . $request['year']; ?></b></td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td width="8%"></td>
                    <td colspan="3"><?= $employeeData['empUPFNo'] . ' - ' . $employeeData['empTitle'] . $employeeData['empSurname'] . ', ' . $employeeData['empInitials'] . ' (' . $employeeData['desigName'] . ')'; ?></td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td width="8%"></td>
                    <td colspan="3"><?= $employeeData['deptName']; ?></td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td width="8%"></td>
                    <td><?= 'Appointment Date : ' . date("d-M-Y", strtotime($employeeData['empDtAppt'])); ?></td>
                    <td><?= 'Increment Date : ' . date("d-M-Y", strtotime($employeeData['empDtIncr'])); ?></td>
                    <td><?= 'Last Promotion Date : ' . date("d-M-Y", strtotime($employeeData['empDtAssm'])); ?></td>
                    <td width="10%"></td>
                </tr>
                <td width="8%"></td>
                <td colspan="2"><?= 'Salary Code & Scale : ' . $employeeData['empSalCode'] . ' - ' . $employeeData['empSalScale']; ?></td>
                <td><?= 'Basic Salary : ' . number_format($employeeData['empBasic'], 2, '.', ','); ?></td>
                <td width="10%"></td>
                </tr>
                <tr>
                    <td width="8%"></td>
                    <td colspan="3"><?= 'Address : ' . $employeeData['empAddress1'] . " " . $employeeData['empAddress2'] . " " . $employeeData['empAddress3']; ?></td>
                    <td width="10%"></td>
                </tr>
            </tbody>
        </table>

        <?php if ($monthData != null) { ?>
            <table class="fl-table" style="margin-top: 15px; width: 100%; border: none;">
                <thead>
                    <tr>
                        <th width="5%" class="bb-none bt-none bl-none br-none"></th>
                        <th colspan="2" class="bb-none bt-none bl-none br-none"></th>
                        <?php
                        $totIprmNopay = $totIprmOPay = $totIprmGross = $totIprmSubTot = 0.00;
                        $totIprmTotDed = $totIprmBalBank = $totIprmBalCash = $totIprmBalBStd = $totIprmUPF15 = $totIprmETF3 = $totIprmUP8 = 0.00;
                        $totIprmA1 = $totIprmA2 = $totIprmA3 = $totIprmA4 = $totIprmA5 = $totIprmA6 = $totIprmA7 = 0.00;
                        $totIprmA8 = $totIprmA9 = $totIprmA10 = $totIprmA11 = $totIprmA12 = $totIprmA13 = $totIprmA14 = 0.00;

                        $totIprmD1 = $totIprmD2 = $totIprmD3 = $totIprmD4 = $totIprmD5 = $totIprmD6 = $totIprmD7 = 0.00;
                        $totIprmD8 = $totIprmD9 = $totIprmD10 = $totIprmD11 = $totIprmD12 = $totIprmD13 = $totIprmD14 = 0.00;
                        $totIprmD15 = $totIprmD16 = $totIprmD17 = $totIprmD18 = $totIprmD19 = $totIprmD20 = $totIprmD21 = 0.00;
                        $totIprmD22 = $totIprmD23 = $totIprmD24 = $totIprmD25 = $totIprmD26 = $totIprmD27 = $totIprmD28 = $totIprmD29 = $totIprmD30 = 0.00;

                        foreach ($monthData as $key => $mdata) {
                            $totIprmA1 += $mdata['iprmA1'];
                            $totIprmA2 += $mdata['iprmA2'];
                            $totIprmA3 += $mdata['iprmA3'];
                            $totIprmA4 += $mdata['iprmA4'];
                            $totIprmA5 += $mdata['iprmA5'];
                            $totIprmA6 += $mdata['iprmA6'];
                            $totIprmA7 += $mdata['iprmA7'];
                            $totIprmA8 += $mdata['iprmA8'];
                            $totIprmA9 += $mdata['iprmA9'];
                            $totIprmA10 += $mdata['iprmA10'];
                            $totIprmA11 += $mdata['iprmA11'];
                            $totIprmA12 += $mdata['iprmA12'];
                            $totIprmA13 += $mdata['iprmA13'];
                            $totIprmA14 += $mdata['iprmA14'];

                            $totIprmNopay += $mdata['iprmNopay'];
                            $totIprmOPay += $mdata['iprmOPay'];
                            $totIprmGross += $mdata['iprmGross'];
                            $totIprmSubTot += $mdata['iprmSubTot'];

                            $totIprmD1 += $mdata['iprmD1'];
                            $totIprmD2 += $mdata['iprmD2'];
                            $totIprmD3 += $mdata['iprmD3'];
                            $totIprmD4 += $mdata['iprmD4'];
                            $totIprmD5 += $mdata['iprmD5'];
                            $totIprmD6 += $mdata['iprmD6'];
                            $totIprmD7 += $mdata['iprmD7'];
                            $totIprmD8 += $mdata['iprmD8'];
                            $totIprmD9 += $mdata['iprmD9'];
                            $totIprmD10 += $mdata['iprmD10'];
                            $totIprmD11 += $mdata['iprmD11'];
                            $totIprmD12 += $mdata['iprmD12'];
                            $totIprmD13 += $mdata['iprmD13'];
                            $totIprmD14 += $mdata['iprmD14'];
                            $totIprmD15 += $mdata['iprmD15'];
                            $totIprmD16 += $mdata['iprmD16'];
                            $totIprmD17 += $mdata['iprmD17'];
                            $totIprmD18 += $mdata['iprmD18'];
                            $totIprmD19 += $mdata['iprmD19'];
                            $totIprmD20 += $mdata['iprmD20'];
                            $totIprmD21 += $mdata['iprmD21'];
                            $totIprmD22 += $mdata['iprmD22'];
                            $totIprmD23 += $mdata['iprmD23'];
                            $totIprmD24 += $mdata['iprmD24'];
                            $totIprmD25 += $mdata['iprmD25'];
                            $totIprmD26 += $mdata['iprmD26'];
                            $totIprmD27 += $mdata['iprmD27'];
                            $totIprmD28 += $mdata['iprmD28'];
                            $totIprmD29 += $mdata['iprmD29'];
                            $totIprmD30 += $mdata['iprmD30'];

                            $totIprmTotDed += $mdata['iprmTotDed'];
                            $totIprmBalBank += $mdata['iprmBalBank'];
                            $totIprmBalCash += $mdata['iprmBalCash'];
                            $totIprmBalBStd += $mdata['iprmBalBStd'];
                            $totIprmUPF15 += $mdata['iprmUPF15'];
                            $totIprmETF3 += $mdata['iprmETF3'];
                            $totIprmUP8 += $mdata['iprmUP8'];
                        ?>
                            <th class="align-center"><?= $mdata['date_month'] ?></th>
                        <?php } ?>
                        <th class="align-center">Total</th>
                        <th width="5%" class="bb-none bt-none bl-none br-none"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Basic Salary</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmA1'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmA1, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Increments & Arrears</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA2'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA2, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Arrears - Prv. Years</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA3'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA3, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Research Allowance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA4'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA4, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Other Allowances</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA5'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA5, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Cost of Living</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA6'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA6, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Dean/Head Allowance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA7'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA7, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Monthly Comp. Allow.</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA8'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA8, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Addl. Monthly Allowance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA9'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA9, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Academic Allowance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA10'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA10, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Prop. Intr. Rcvd. Govt</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA11'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA11, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">10% Allowance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA12'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA12, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Fuel & Vehicle Allowance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none bb-none"><?= number_format($mdata['iprmA13'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none bb-none"><?= number_format($totIprmA13, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Other Income</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmA14'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmA14, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td width="6%" style="text-wrap: nowrap;" class="bb-none br-none">Less :</td>
                        <td class="bb-none bl-none">No Pay</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmNopay'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmNopay, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td class="bt-none br-none"></td>
                        <td class="bt-none bl-none" style="text-wrap: nowrap;">Over Payments</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmOPay'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmOPay, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;">TOTAL EPF</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right"><?= number_format($mdata['iprmSubTot'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right"><?= number_format($totIprmSubTot, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;">GROSS PAY</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right"><?= number_format($mdata['iprmGross'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right"><?= number_format($totIprmGross, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">EPF - 10%</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmD1'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmD1, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Medical Fund (1%)</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD2'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD2, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Deduction</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD3'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD3, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Stamp Duty</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD4'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD4, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Salary/Other Advance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmD5'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmD5, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Festival Advance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmD6'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmD6, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Special Advance</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD7'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD7, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Provident Fund Loan</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD8'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD8, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Distress Loan</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD9'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD9, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Distress Ln - Interest</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmD10'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmD10, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Bicycle Loan</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmD11'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmD11, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Bicycle Ln - Interest</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD12'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD12, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Other Loans</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD13'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD13, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Union - JSS</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD14'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD14, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Sub Warden Union</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmD15'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmD15, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Welfare Society</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmD16'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmD16, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Academic Union</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD17'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD17, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Librarian Union</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD18'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD18, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Hostel Charges</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD19'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD19, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Over Payments</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmD20'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmD20, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Union - Anthar</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmD21'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmD21, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Water & Electricity</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD22'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD22, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Prepaid Other Income</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD23'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD23, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">PAYE Tax</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD24'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD24, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">SLNSS</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmD25'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmD25, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Bank Ln/Insure etc.</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmD26'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmD26, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Spl Adv - Interest</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD27'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD27, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Tax - Other Income</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD28'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD28, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Telephone Charges</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmD29'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmD29, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Tax Adjustments</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmD30'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmD30, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;">TOTAL DEDUCTIONS</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right"><?= number_format($mdata['iprmTotDed'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right"><?= number_format($totIprmTotDed, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">Bank</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmBalBank'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmBalBank, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">Cash</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmBalCash'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmBalCash, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Bank Standing Order</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmBalBStd'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmBalBStd, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none">EPF 15%</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none"><?= number_format($mdata['iprmUPF15'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none"><?= number_format($totIprmUPF15, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bb-none bt-none">ETF 3%</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bb-none bt-none"><?= number_format($mdata['iprmETF3'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bb-none bt-none"><?= number_format($totIprmETF3, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" style="text-wrap: nowrap;" class="bt-none">Medical 5%</td>
                        <?php foreach ($monthData as $key => $mdata) { ?>
                            <td class="align-right bt-none"><?= number_format($mdata['iprmUP8'], 2, '.', ','); ?></td>
                        <?php } ?>
                        <td class="align-right bt-none"><?= number_format($totIprmUP8, 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="bb-none bt-none bl-none br-none"></th>
                        <th colspan="2"></th>
                        <?php for ($i = 0; $i < count($monthData); $i++) { ?>
                            <th class="align-center"><?= 'UPF: ' . $request['empUPFNo']; ?></th>
                        <?php } ?>
                        <th></th>
                        <th class="bb-none bt-none bl-none br-none"></th>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
    <?php } ?>
</div>