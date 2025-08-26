<?php
$this->title = 'Employee Details';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_emp-detail-search', [
            'request' => $request,
        ]);
        ?>

        <?php
        $chkdesigName = isset($_REQUEST['chkdesigName']) && !empty($_REQUEST['chkdesigName']) ? $_REQUEST['chkdesigName'] : '0';
        $chkempDtBirth = isset($_REQUEST['chkempDtBirth']) && !empty($_REQUEST['chkempDtBirth']) ? $_REQUEST['chkempDtBirth'] : '0';
        $chkempDtAppt = isset($_REQUEST['chkempDtAppt']) && !empty($_REQUEST['chkempDtAppt']) ? $_REQUEST['chkempDtAppt'] : '0';
        $chkempBasic = isset($_REQUEST['chkempBasic']) && !empty($_REQUEST['chkempBasic']) ? $_REQUEST['chkempBasic'] : '0';
        $chkdeptName = isset($_REQUEST['chkdeptName']) && !empty($_REQUEST['chkdeptName']) ? $_REQUEST['chkdeptName'] : '0';
        $chkempDtRetir = isset($_REQUEST['chkempDtRetir']) && !empty($_REQUEST['chkempDtRetir']) ? $_REQUEST['chkempDtRetir'] : '0';

        if ($chkdesigName == '1' || $chkempDtBirth == '1' || $chkempDtAppt == '1' || $chkempBasic == '1' || $chkdeptName == '1' || $chkempDtRetir == '1') {
        ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="emp-detail-report-pdf?chkdesigName=<?= $chkdesigName; ?>&chkempDtBirth=<?= $chkempDtBirth; ?>&chkempDtAppt=<?= $chkempDtAppt; ?>&chkempBasic=<?= $chkempBasic; ?>&chkdeptName=<?= $chkdeptName; ?>&chkempDtRetir=<?= $chkempDtRetir; ?>" style="width: 90%; height: 500px;"></iframe>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>