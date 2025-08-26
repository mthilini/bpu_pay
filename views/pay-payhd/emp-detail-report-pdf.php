<?php

if ($employees != null) {
?>
    <style>
        .emp-container {
            padding: 10px;
            margin-top: 10px;
        }

        h1 {
            text-align: center;
            font-size: 15px;
        }

        h2 {
            font-size: 13px;
            font-weight: 600;
        }

        .fl-table,
        .fl-table th,
        .fl-table td {
            vertical-align: top;
            font-size: 9px;
            font-weight: 500;
            border-collapse: collapse;
            padding: 10px;
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

        .bb {
            border-bottom: 1px solid;
        }

        .valign-top {
            vertical-align: top;
        }

        .nowrap {
            white-space: nowrap;
        }
    </style>

    <style type="text/css" media="print">
        @page {
            size: auto;
            margin: 5mm;
        }
    </style>

    <div class="emp-container">
        <table style="width: 100%;" class="emp-tbl">
            <thead>
                <tr>
                    <th colspan="8">
                        <h1 style="padding-bottom: 20px;">Buddhist and Pali University</h1>
                    </th>
                </tr>
                <tr>
                    <th colspan="2" class="align-left bb">
                        <h2>Employee</h2>
                    </th>
                    <th class="align-left bb">
                        <h2><?= (isset($request['chkdesigName']) && $request['chkdesigName'] == '1') ? 'Designation' : ''; ?></h2>
                    </th>
                    <th class="bb">
                        <h2><?= (isset($request['chkempDtBirth']) && $request['chkempDtBirth'] == '1') ? 'Birth Date' : ''; ?></h2>
                    </th>
                    <th class="bb">
                        <h2><?= (isset($request['chkempDtAppt']) && $request['chkempDtAppt'] == '1') ? 'Joined Date' : ''; ?></h2>
                    </th>
                    <th class="bb">
                        <h2><?= (isset($request['chkempDtRetir']) && $request['chkempDtRetir'] == '1') ? 'Resign Date' : ''; ?></h2>
                    </th>
                    <th class="bb">
                        <h2><?= (isset($request['chkempBasic']) && $request['chkempBasic'] == '1') ? 'Basic Salary' : ''; ?></h2>
                    </th>
                    <th class="align-left bb">
                        <h2><?= (isset($request['chkdeptName']) && $request['chkdeptName'] == '1') ? 'Department' : ''; ?></h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $key => $employee) { ?>
                    <tr>
                        <td class="valign-top"><?= $employee['empUPFNo'] ?></td>
                        <td class="valign-top"><?= $employee['empTitle'] . ' ' . $employee['empSurname'] . ', ' . $employee['empInitials'] ?></td>
                        <td class="valign-top"><?= (isset($request['chkdesigName']) && $request['chkdesigName'] == '1') ? $employee['desigName'] : ''; ?></td>
                        <td class="valign-top align-right nowrap"><?= (isset($request['chkempDtBirth']) && $request['chkempDtBirth'] == '1') ? date_format(date_create($employee['empDtBirth']), "d-M-Y") : ''; ?></td>
                        <td class="valign-top align-right nowrap"><?= (isset($request['chkempDtAppt']) && $request['chkempDtAppt'] == '1') ? date_format(date_create($employee['empDtAppt']), "d-M-Y") : ''; ?></td>
                        <td class="valign-top align-right nowrap"><?= (isset($request['chkempDtRetir']) && $request['chkempDtRetir'] == '1') ? date_format(date_create($employee['empDtTemp']), "d-M-Y") : ''; ?></td>
                        <td class="valign-top align-right"><?= (isset($request['chkempBasic']) && $request['chkempBasic'] == '1') ? number_format($employee['empBasic'], 2, '.', ',') : ''; ?></td>
                        <td class="valign-top"><?= (isset($request['chkdeptName']) && $request['chkdeptName'] == '1') ? $employee['deptName'] : ''; ?></td>
                    </tr>
                <?php } ?>  
            </tbody>
        </table>
    </div>

<?php } ?>