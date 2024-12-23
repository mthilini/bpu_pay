<?php
$this->title = 'Annual Emolument Summary';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_emolu-summary-annual-search', [
            'request' => $request,
            'payFields' => $payFields
        ]);
        ?>

        <?php
        $year = isset($_REQUEST['year']) && !empty($_REQUEST['year']) ? $_REQUEST['year'] : '';
        $fldCode = isset($_REQUEST['fldCode']) && !empty($_REQUEST['fldCode']) ? $_REQUEST['fldCode'] : '';
        $empAcademic = isset($_REQUEST['empAcademic']) && !empty($_REQUEST['empAcademic']) ? $_REQUEST['empAcademic'] : '';

        if (!empty($fldCode) && !empty($year)) { ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="emolu-summary-annual-report-pdf?fldCode=<?= $fldCode; ?>&year=<?= $year; ?>&empAcademic=<?= $empAcademic; ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>