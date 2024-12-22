<?php
$this->title = 'Deduction List - Individual';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_deduct-indi-annual-search', [
            'request' => $request,
            'payFields' => $payFields
        ]);
        ?>

        <?php
        $empUPFNo = isset($_REQUEST['empUPFNo']) && !empty($_REQUEST['empUPFNo']) ? $_REQUEST['empUPFNo'] : '';
        $year = isset($_REQUEST['year']) && !empty($_REQUEST['year']) ? $_REQUEST['year'] : '';
        $fldCode = isset($_REQUEST['fldCode']) && !empty($_REQUEST['fldCode']) ? $_REQUEST['fldCode'] : '';

        if (!empty($empUPFNo) && !empty($year) && !empty($fldCode)) { ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="deduct-indi-annual-report-pdf?empUPFNo=<?= $empUPFNo; ?>&year=<?= $year; ?>&fldCode=<?= $fldCode; ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>