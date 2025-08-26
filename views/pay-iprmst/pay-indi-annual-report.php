<?php
$this->title = 'Individual Pay Records';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_pay-indi-annual-search', [
            'request' => $request,
        ]);
        ?>

        <?php
        $empUPFNo = isset($_REQUEST['empUPFNo']) && !empty($_REQUEST['empUPFNo']) ? $_REQUEST['empUPFNo'] : '';
        $year = isset($_REQUEST['year']) && !empty($_REQUEST['year']) ? $_REQUEST['year'] : '';

        if (!empty($empUPFNo) && !empty($year)) { ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="pay-indi-annual-report-pdf?empUPFNo=<?= $empUPFNo; ?>&year=<?= $year; ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>