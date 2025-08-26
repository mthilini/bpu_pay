<style>
    .emp-container {
        padding: 10px;
        margin-top: 10px;
    }

    h1 {
        text-align: center;
        font-size: 13px;
    }

    .fl-table {
        font-size: 12.5px;
        font-weight: 500;
        border: 1px solid black;
    }

    .fl-table,
    .fl-table th,
    .fl-table td {
        border-collapse: collapse;
    }

    .fl-table td,
    .fl-table th {
        padding: 5px 5px 5px 5px;
    }

    .align-left {
        text-align: left !important;
    }
</style>

<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0mm;
    }

    @media print {
        div.emp-container {
            page-break-after: always;
        }
    }
</style>

<?php
if ($employeeData != null) {
    $monthNum  = $request['month'];
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);

    foreach ($employeeData as $key => $employees) {
?>
        <div class="emp-container">
            <h1>Buddhist and Pali University</h1>
            <h1><?= 'Employees - ' . $dateObj->format('F') . ' ' . $request['year']; ?></h1>

            <table class="fl-table" style="margin-top: 25px; width: 100%; border: none;">
                <thead>
                    <tr>
                        <th width="5%"></th>
                        <th colspan="3" class="align-left" style="padding-top: 15px; padding-bottom: 15px; font-size: 13px; font-weight: 500;"><?= 'Department: &nbsp;&nbsp;&nbsp;' . $employees['deptName'] ?></th>
                        <th width="5%"></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th colspan="2" class="align-left" style="font-weight: 500; padding-bottom: 7px; border-bottom: 1.5px solid black;">Employee</th>
                        <th class="align-left" style="font-weight: 500; padding-bottom: 7px; border-bottom: 1.5px solid black;">Designation</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="5"></th>
                    </tr>
                    <?php
                    if ($employees['employees'] != null) {
                        $employees = $employees['employees'];
                        foreach ($employees as $key => $employee) {
                    ?>
                            <tr>
                                <td></td>
                                <td style="width: auto;"><?= $employee['empUPFNo']; ?></td>
                                <td><?= $employee['empTitle'] . ' ' . $employee['empSurname'] . ', ' . $employee['empInitials']; ?></td>
                                <td><?= $employee['desigName']; ?></td>
                                <td></td>
                            </tr>
                    <?php
                        }
                    } ?>
                    <tr>
                        <th colspan="5"></th>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th colspan="3" style="border-bottom: 1.5px solid black;"></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2" style="padding-top: 10px;">
                            <p>I certify that each employee named above has been, to the best of my knowledge and belief, actually and
                                bona fide employed in the Department/Division , during the month of <?= " " . $dateObj->format('F') . ' ' . $request['year']; ?></p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td style="padding-top: 50px;">Department Head</td>
                        <td style="padding-top: 50px;">Date</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

        </div>
<?php
    }
} ?>