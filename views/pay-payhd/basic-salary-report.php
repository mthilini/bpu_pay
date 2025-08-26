<?php
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_basic-salary-search', [
            'request' => $request,
        ]);
        ?>

        <?php $empAcademic = isset($_REQUEST['empAcademic']) && !empty($_REQUEST['empAcademic']) ? $_REQUEST['empAcademic'] : ''; ?>

        <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

        <div id="ifrmDv" style="text-align: center;">
            <iframe id="ifrm" src="basic-salary-report-pdf?empAcademic=<?= $empAcademic; ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
        </div>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>