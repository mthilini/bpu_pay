<?php
$this->title = 'University Reconcilation';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">
        <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

        <div id="ifrmDv" style="text-align: center;">
            <iframe id="ifrm" src="university-recon-report-pdf" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
        </div>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>