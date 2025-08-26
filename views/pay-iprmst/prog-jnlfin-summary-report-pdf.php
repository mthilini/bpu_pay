<style>
    .emp-container {
        padding: 10px;
        margin-top: 25px;
    }

    h1 {
        font-size: 13px;
        text-align: center;
    }

    h2 {
        font-size: 12.5px;
        text-align: center;
    }

    .fl-table,
    .fl-table th,
    .fl-table td {
        font-size: 12.5px;
        font-weight: normal;
        padding: 5px;
        border: 1px solid black;
        border-collapse: collapse;
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

    <h1><?= 'Buddhist and Pali University : ' . $option . ' Salary - ' . date("F", mktime(0, 0, 0, $request['month'], 10)) . ' ' . $request['year'] . ' (' . $employee . ' Employees) - Summary'; ?></h1>
    <h2 style="margin-top: 0px;"><?= 'Programme : ' . $request['deptProg']; ?></h2>

    <?php if ($summary != null) { ?>
        <table class="fl-table" style="margin-top: 25px; width: 100%; border: none;">
            <thead>
                <tr>
                    <th width="5%" class="bb-none bt-none bl-none br-none"></th>
                    <th colspan="2" class="bb-none bt-none bl-none br-none"></th>
                    <?php
                    foreach ($summary as $key => $sm) { ?>
                        <th class="align-center"><?= $sm['deptProj'] ?></th>
                    <?php } ?>
                    <th class="align-center">Total</th>
                    <th width="5%" class="bb-none bt-none bl-none br-none"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none">01.01 Salaries & Wages</td>
                    <?php
                    $totRaw1 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw1 += $sm['r1'];
                    ?>
                        <td class="align-right bb-none"><?= number_format($sm['r1'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none"><?= number_format($totRaw1, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">01.02 EPF</td>
                    <?php
                    $totRaw2 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw2 += $sm['r2'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r2'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw2, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">01.03 ETF</td>
                    <?php
                    $totRaw3 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw3 += $sm['r3'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r3'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw3, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">03.01 Academic Allowance</td>
                    <?php
                    $totRaw4 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw4 += $sm['r4'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r4'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw4, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none">03.02 Other Allowances</td>
                    <?php
                    $totRaw5 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw5 += $sm['r5'];
                    ?>
                        <td class="align-right bt-none"><?= number_format($sm['r5'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none"><?= number_format($totRaw5, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">03.03 10% Allowance</td>
                    <?php
                    $totRaw6 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw6 += $sm['r6'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r6'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw6, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">03.04 Language Proficien</td>
                    <?php
                    $totRaw7 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw7 += $sm['r7'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r7'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw7, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">03.05 Cost Of Living</td>
                    <?php
                    $totRaw8 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw8 += $sm['r8'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r8'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw8, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">03.06 Special 5% Allowance</td>
                    <?php
                    $totRaw9 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw9 += $sm['r9'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r9'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw9, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">03.07 Fuel & Vehicle Allowance</td>
                    <?php
                    $totRaw10 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw10 += $sm['r10'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r10'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw10, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;">Sub Total</td>
                    <?php
                    $totSubTotRaw = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totSubTotRaw += $sm['rsub'];
                    ?>
                        <td class="align-right"><?= number_format($sm['rsub'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right"><?= number_format($totSubTotRaw, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Jnl: Salaries & Wages</td>
                    <?php
                    $totRaw11 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw11 += $sm['r11'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r11'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw11, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Jnl: Medical</td>
                    <?php
                    $totRaw12 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw12 += $sm['r12'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r12'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw12, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Jnl: Over Payments</td>
                    <?php
                    $totRaw13 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw13 += $sm['r13'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r13'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw13, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bt-none bb-none">Jnl: Salary Advance</td>
                    <?php
                    $totRaw14 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw14 += $sm['r14'];
                    ?>
                        <td class="align-right bt-none bb-none"><?= number_format($sm['r14'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bt-none bb-none"><?= number_format($totRaw14, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;" class="bb-none br-none bt-none">Jnl: Special Deductions</td>
                    <?php
                    $totRaw15 = 0.00;
                    foreach ($summary as $key => $sm) {
                        $totRaw15 += $sm['r15'];
                    ?>
                        <td class="align-right bb-none bt-none"><?= number_format($sm['r15'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right bb-none bt-none"><?= number_format($totRaw15, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
                <tr>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <td colspan="2" style="text-wrap: nowrap;">Grand Total</td>
                    <?php
                    $grandTot = 0.00;
                    foreach ($summary as $key => $sm) {
                        $grandTot += $sm['rgrand'];
                    ?>
                        <td class="align-right"><?= number_format($sm['rgrand'], 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right"><?= number_format($grandTot, 2, '.', ','); ?></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                </tr>
            </tbody>
        </table>

        <table class="fl-table" style="margin-top: 40px; width: 100%; border: none;">
            <tbody>
                <tr>
                    <th width="5%" class="bb-none bt-none bl-none br-none"></th>
                    <td style="width: 30%;" class="bb-none bt-none bl-none br-none">Prepared By:</td>
                    <td style="width: 30%;" class="bb-none bt-none bl-none br-none">Checked By:</td>
                    <td style="width: 30%;" class="bb-none bt-none bl-none br-none">Authorised By:</td>
                    <th width="5%" class="bb-none bt-none bl-none br-none"></th>
                </tr>
            </tbody>
        </table>
    <?php } ?>
</div>