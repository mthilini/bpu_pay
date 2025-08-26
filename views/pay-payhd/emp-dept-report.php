<?php
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_emp-dept-search', [
            'request' => $request,
            'searchOption' => $searchOption
        ]);
        ?>

        <?php
        $year = isset($_REQUEST['year']) && !empty($_REQUEST['year']) ? $_REQUEST['year'] : '';
        $month = isset($_REQUEST['month']) && !empty($_REQUEST['month']) ? $_REQUEST['month'] : '';

        if (!empty($year) && !empty($month)) { ?>
            <a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport();"><i class='fas fa-print' title="print"></i></a>

            <div id="ifrmDv" style="text-align: center;">
                <iframe id="ifrm" src="<?= $reportOption; ?>year=<?= $year; ?>&month=<?= $month; ?>" style="width: 90%; height: 650px;" type="application/pdf"></iframe>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function printEmployeeDetailReport() {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>