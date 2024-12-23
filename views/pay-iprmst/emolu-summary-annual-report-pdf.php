<style>
    .emp-container {
        padding: 10px;
        margin-top: 15px;
    }

    h1,
    h2 {
        font-size: 13.5px;
        text-align: center;
        margin: 0px !important;
        margin-bottom: 5px !important;
    }

    .fl-table,
    .fl-table th,
    .fl-table td {
        font-size: 13px;
        font-weight: normal;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 2px 5px 2px 5px;
    }

    .align-center {
        text-align: center !important;
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
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>

<div class="emp-container">
    <h1>Buddhist and Pali University</h1>
    <h2><?= $fldName . ' - ' . $request['year']; ?></h2>

    <?php if ($employees != null) { ?>
        <table class="fl-table" style="margin-top: 25px; width: 100%; border: none;">
            <thead>
                <tr>
                    <td style="width: 5%" class="bb-none bt-none bl-none br-none"></td>
                    <td class="bb-none bt-none bl-none br-none"></td>
                    <?php foreach ($dates as $key => $date) { ?>
                        <td class="align-center"><?= $date; ?></td>
                    <?php } ?>
                    <td class="align-center">Total</td>
                    <td style="width: 5%" class="bb-none bt-none bl-none br-none"></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $key => $employee) { ?>
                    <tr>
                        <td style="width: 5%" class="bb-none bt-none bl-none br-none"></td>
                        <td style="text-wrap: nowrap;"><?= $employee['empUPFNo'] . ' - ' . $employee['empTitle'] . ' ' . $employee['empInitials'] . ' ' . $employee['empSurname']; ?></td>
                        <?php foreach ($dates as $key => $date) { ?>
                            <td class="align-right"><?= (!empty($employeeData) && isset($employeeData[$employee['empUPFNo']])) ? (isset($employeeData[$employee['empUPFNo']][$date]) ? number_format($employeeData[$employee['empUPFNo']][$date], 2, '.', ',') : '0.00') : '0.00' ?></td>
                        <?php } ?>
                        <td class="align-right"><?= (!empty($employeeData) && isset($employeeData[$employee['empUPFNo']])) ? number_format($employeeData[$employee['empUPFNo']]['total'], 2, '.', ',') : '0.00' ?></td>
                        <td style="width: 5%" class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td style="width: 5%" class="bb-none bt-none bl-none br-none"></td>
                    <td>Total</td>
                    <?php
                    foreach ($dates as $key => $date) {
                        $columnTot = (!empty($monthData) && isset($monthData[$date])) ? $monthData[$date]['total'] : 0;
                    ?>
                        <td class="align-right"><?= number_format($columnTot, 2, '.', ','); ?></td>
                    <?php } ?>
                    <td class="align-right"><?= number_format($grandTot, 2, '.', ','); ?></td>
                    <td style="width: 5%" class="bb-none bt-none bl-none br-none"></td>
                </tr>
            </tfoot>
        </table>
    <?php } ?>
</div>