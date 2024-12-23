<?php
$this->title = 'Programme Final Summaries';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_prog-fin-summary-search', [
            'request' => $request,
        ]);
        ?>

        <?php
        $month = isset($_REQUEST['month']) && !empty($_REQUEST['month']) ? $_REQUEST['month'] : '';
        $year = isset($_REQUEST['year']) && !empty($_REQUEST['year']) ? $_REQUEST['year'] : '';
        $empAcademic = isset($_REQUEST['empAcademic']) && !empty($_REQUEST['empAcademic']) ? $_REQUEST['empAcademic'] : '';
        $option = isset($_REQUEST['option']) && !empty($_REQUEST['option']) ? $_REQUEST['option'] : 'monthly';
        $deptProg = isset($_REQUEST['deptProg']) && !empty($_REQUEST['deptProg']) ? $_REQUEST['deptProg'] : '';

        if (!empty($month) && !empty($year) && !empty($deptProg)) { ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="prog-fin-summary-report-pdf?month=<?= $month; ?>&year=<?= $year; ?>&option=<?= $option; ?>&empAcademic=<?= $empAcademic; ?>&deptProg=<?= $deptProg; ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>