<?php
$this->title = 'Individual Detail Reconciliations';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_individual-detail-recon-report-search', [
            'request' => $request,
        ]);
        ?>

        <?php
        $empUPFNo = isset($_REQUEST['empUPFNo']) && !empty($_REQUEST['empUPFNo']) ? $_REQUEST['empUPFNo'] : '';

        if (!empty($empUPFNo)) { ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="individual-detail-recon-report-pdf?empUPFNo=<?= $empUPFNo ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>