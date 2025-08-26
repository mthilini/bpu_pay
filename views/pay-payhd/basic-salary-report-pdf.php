<style>
    .emp-container {
        padding: 10px;
        margin-top: 10px;
    }

    h1 {
        text-align: center;
        font-size: 13.5px;
    }

    .fl-table {
        font-size: 12.5px;
        font-weight: normal;
        border: 1px solid black;
    }

    .fl-table,
    .fl-table th,
    .fl-table td {
        border-collapse: collapse;
        padding: 5px;
    }

    .align-left {
        text-align: left !important;
    }

    .align-center {
        text-align: center !important;
    }

    .align-right {
        text-align: right !important;
    }

    .fw-none {
        font-weight: 500;
    }

    .bb {
        border-bottom: 1.5px solid;
    }

    .bt {
        border-top: 1.5px solid;
    }

    .valign-top {
        vertical-align: top;
    }
</style>

<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 5mm;
    }
</style>

<?php if ($summary != null) { ?>
    <div class="emp-container">

        <table class="fl-table" style="margin-top: 15px; width: 100%; border: none;">
            <thead>
                <tr>
                    <th colspan="7">
                        <h1>Buddhist and Pali University</h1>
                        <h1 style="padding-bottom: 20px;"><u><?= 'Employee Basic Salary and Bank Information (' . $option . ' Employees)'; ?></u></h1>
                    </th>
                </tr>
                <tr>
                    <th class="bb"></th>
                    <th colspan="2" class="fw-none bb align-left">Employee Name</th>
                    <th class="fw-none bb" style="white-space: nowrap;">Basic Salary</th>
                    <th class="fw-none bb align-left">Bank</th>
                    <th class="fw-none bb">Account No</th>
                    <th class="fw-none bb align-left">Account Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totBasic = 0.00;
                foreach ($summary as $key => $employee) {
                    $totBasic += $employee['empBasic'];
                ?>
                    <tr>
                        <td class="valign-top"><?= $key + 1; ?></td>
                        <td class="valign-top"><?= $employee['empUPFNo']; ?></td>
                        <td class="valign-top"><?= $employee['empTitle'] . ' ' . $employee['empSurname'] . ', ' . $employee['empInitials']; ?></td>
                        <td class="align-right valign-top"><?= number_format($employee['empBasic'], 2, '.', ','); ?></td>
                        <td class="valign-top"><?= $employee['bankName']; ?></td>
                        <td class="valign-top"><?= $employee['empAcctNo']; ?></td>
                        <td class="valign-top"><?= $employee['empAcctName']; ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="3" class="align-right">Grand Total :</td>
                    <td class="align-right bb bt"><?= number_format($totBasic, 2, '.', ','); ?></td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>