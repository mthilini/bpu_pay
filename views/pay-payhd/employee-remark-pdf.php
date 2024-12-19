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
        <h2><u>Employee Remarks</u></h2>

        <?php foreach ($models as $key => $model) { ?>
            <table style="margin-top: 55px; width: 100%;" class="emp-tbl">
                <tbody>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Employee Name : </b><?= $model->empTitle . $model->empSurname . ', ' . $model->empInitials; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="5%"></td>
                        <td width="50%"><b>Designation : </b><?= ($model->payDesig != null) ? $model->payDesig->desigName : ''; ?></td>
                        <td width="40%"><b>Department : </b><?= ($model->payDept != null) ? $model->payDept->deptName : ''; ?></td>
                        <td width="5%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>Remarks : </b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">
                            <table style="margin-left: 40px;">
                                <tbody>
                                    <?php if ($model->payRmks != null) {
                                        $Rmks = $model->payRmks;
                                        foreach ($Rmks as $key => $Rmk) {
                                    ?>
                                            <tr>
                                                <td width="25%"><?= date("d-M-Y", strtotime($Rmk->rmkDate)); ?></td>
                                                <td width="30%" style="text-align: right;"><?= $Rmk->rmkRmks; ?></td>
                                                <td width="45%"></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>

<?php } ?>