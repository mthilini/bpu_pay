<?php
$this->title = 'Division Final Summary';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_division-summary-search', [
            'request' => $request,
            'dataProvider' => $dataProvider
        ]);
        ?>

        <?php
        $month = isset($_REQUEST['month']) && !empty($_REQUEST['month']) ? $_REQUEST['month'] : '';
        $year = isset($_REQUEST['year']) && !empty($_REQUEST['year']) ? $_REQUEST['year'] : '';
        $empAcademic = isset($_REQUEST['empAcademic']) && !empty($_REQUEST['empAcademic']) ? $_REQUEST['empAcademic'] : '';
        $option = isset($_REQUEST['option']) && !empty($_REQUEST['option']) ? $_REQUEST['option'] : 'monthly';
        $deptCode = isset($_REQUEST['deptCode']) && !empty($_REQUEST['deptCode']) ? $_REQUEST['deptCode'] : '';

        if (!empty($month) && !empty($year) && !empty($deptCode)) { ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="division-summary-report-pdf?month=<?= $month; ?>&year=<?= $year; ?>&option=<?= $option; ?>&empAcademic=<?= $empAcademic; ?>&deptCode=<?= $deptCode; ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>