<?php

if ($dataProvider != null) {
    $models = $dataProvider->getModels();
?>
    <style>
        .emp-container {
            padding: 25px;
            margin-top: 25px;
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
        <h1>Buddhist and Pali University</h1>
        <h2><u>Employee Details (Personal Information)</u></h2>

        <?php
        foreach ($models as $key => $model) {
            $status = 'Pay';
            $empStatus = $model->empStatus;
            if ($empStatus == '1') {
                $status = 'No Pay';
            } elseif ($empStatus == '2') {
                $status = 'Soft Payment';
            }

            $grade = 'Executive';
            $empGrade = $model->empGrade;
            if ($empGrade == '1') {
                $grade = 'Academic';
            } elseif ($empGrade == '2') {
                $grade = 'Middle';
            } elseif ($empGrade == '3') {
                $grade = 'Miner';
            } elseif ($empGrade == '4') {
                $grade = 'Apprentice';
            }

        ?>
            <table style="margin-top: 55px; width: 100%;" class="emp-tbl">
                <tbody>
                    <tr>
                        <td width="5%"></td>
                        <td width="10%"><b>EPF No : </b></td>
                        <td style="width: 40%;"><?= $model->empUPFNo; ?></td>
                        <td width="40%"><b>ETF No : </b><?= $model->empETFNo; ?></td>
                        <td width="5%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3"><b>Employee Name : </b><?= $model->empTitle . $model->empSurname . ', ' . $model->empInitials; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3"><b>Names denoted by Initials : </b><?= $model->empNames; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><b>Address : </b></td>
                        <td><?= $model->empAddress1; ?></td>
                        <td><b>NIC No : </b><?= $model->empNIC; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?= $model->empAddress2; ?></td>
                        <td><b>Gender : </b><?= ($model->empGender == '0' ? 'Male' : 'Female'); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?= $model->empAddress3; ?></td>
                        <td><b>Date of Birth : </b><?= date("d-M-Y", strtotime($model->empDtBirth)); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="height: 50px;"></td>
                        <td colspan="3" style="border-bottom-style: dotted; border-bottom-width: thin;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="height: 20px;" colspan="5"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Designation : </b><?= ($model->payDesig != null) ? $model->payDesig->desigName : ''; ?></td>
                        <td><b>Academic : </b><?= ($model->empAcademic == "A" ? "Yes" : "No"); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Department : </b><?= ($model->payDept != null) ? $model->payDept->deptName : ''; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Status : </b><?= $status; ?></td>
                        <td><b>Grade : </b><?= $grade; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Date Of Appoitment : </b><?= date("d-M-Y", strtotime($model->empDtAppt)); ?></td>
                        <td><b>Date Of Confirmation : </b><?= date("d-M-Y", strtotime($model->empDtConf)); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Date Of Assumtion of Duties : </b><?= date("d-M-Y", strtotime($model->empDtAssm)); ?></td>
                        <td><b>Date Of Increment : </b><?= date("d-M-Y", strtotime($model->empDtIncr)); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Temporary Employee : </b><?= ($model->empTempEmp == "P" ? "No" : "Yes"); ?></td>
                        <td><b>Medical Contributor : </b><?= ($model->empUPContr == "0" ? "No" : "Yes"); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="height: 40px;"></td>
                        <td colspan="3" style="border-bottom-style: dotted; border-bottom-width: thin;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="height: 20px;" colspan="5"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Basic Salary : </b><?= number_format($model->empBasic, 2, '.', ','); ?></td>
                        <td><b>Bank : </b><?= ($model->payBank != null) ? $model->payBank->bankName : ''; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Salary Code : </b><?= $model->empSalCode; ?></td>
                        <td><b>Bank Account No : </b><?= $model->empAcctNo; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Salary Scale : </b><?= $model->empSalScale; ?></td>
                        <td><b>Bank Account Name : </b><?= $model->empAcctName; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="height: 50px;"></td>
                        <td colspan="3" style="border-bottom-style: dotted; border-bottom-width: thin;"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>

<?php } ?>