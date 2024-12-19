<?php
$this->title = 'Program Project Reconcilation';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_ppr-recon-search', [
            'request' => $request,
        ]);
        ?>

        <?php
        $deptProg = isset($_REQUEST['deptProg']) && !empty($_REQUEST['deptProg']) ? $_REQUEST['deptProg'] : '';
        $deptProj = isset($_REQUEST['deptProj']) && !empty($_REQUEST['deptProj']) ? $_REQUEST['deptProj'] : '';

        if (!empty($deptProg) && !empty($deptProj)) { ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="ppr-recon-report-pdf?deptProg=<?= $deptProg ?>&deptProj=<?= $deptProj; ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>