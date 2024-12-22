<style>
    .emp-container {
        padding: 25px;
        margin-top: 35px;
    }

    h1 {
        text-align: center;
        font-size: 16px;
    }

    h2 {
        text-align: center;
        font-size: 14px;
    }

    .emp-tbl tbody tr {
        line-height: 25px;
    }

    .emp-tbl tbody td {
        font-size: 13px;
    }
</style>

<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0mm;
    }
</style>

<div class="emp-container">
    <h1>Buddhist and Pali University - Annual Deduction List</h1>
    <h2><?= $fldName . ' - ' . $request['year']; ?></h2>

    <?php if ($employeeData != null) { ?>
        <table style="margin-top: 35px; width: 100%;" class="emp-tbl">
            <tbody>
                <tr>
                    <td width="8%"></td>
                    <td><?= 'Name : ' . $_REQUEST['empUPFNo'] . ' - ' . $employeeData['empTitle'] . $employeeData['empInitials'] . $employeeData['empSurname']; ?></td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td width="8%"></td>
                    <td><?= 'Designation : ' . $employeeData['desigName']; ?></td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td width="8%"></td>
                    <td><?= 'Division : ' . $employeeData['deptName']; ?></td>
                    <td width="10%"></td>
                </tr>
            </tbody>
        </table>

        <?php if ($monthData != null) { ?>
            <table style="margin-top: 20px; width: 100%;" class="emp-tbl">
                <tbody>
                    <tr>
                        <td width="30%"></td>
                        <td style="width: 20%; text-align: left;">Month</td>
                        <td style="width: 20%; text-align: right;">Amount (Rs.)</td>
                        <td width="30%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" style="border-bottom: 1.5px solid; padding-top: 0px; padding-bottom: 0px;"></td>
                        <td></td>
                    </tr>
                    <?php
                    $total = 0.00;
                    for ($i = 0; $i < count($monthData); $i++) {
                        $md = $monthData[$i];
                        $total += $md['column'];
                    ?>
                        <tr>
                            <td></td>
                            <td style="text-align: left;"><?= $md['month']; ?></td>
                            <td style="text-align: right;"><?= number_format($md['column'], 2, '.', ','); ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td colspan="2" style="border-bottom: 1.5px solid; padding-top: 0px; padding-bottom: 0px;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><?= number_format($total, 2, '.', ','); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="border-bottom: 1.5px solid; padding-bottom: 0px; padding-top: 0px;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="border-bottom: 1.5px solid; padding-bottom: 0px; padding-top: 0px;"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>

    <?php } ?>
</div>