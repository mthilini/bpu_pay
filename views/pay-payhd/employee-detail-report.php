<?php
$this->title = 'Employee Detail';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_employee-detail-search', [
            'request' => $request,
            'upfList' => $upfList,
        ]);
        ?>

        <?php $upfNo = (isset($_REQUEST['upfNo']) && !empty($_REQUEST['upfNo'])) ? $_REQUEST['upfNo'] : ''; ?>

        <div id="ifrmDv" style="text-align: center; <?= ($upfNo != '') ? '' : 'display: none;'; ?>">
            <iframe id="ifrm" src="employee-detail-pdf?upfNo=<?= ($upfNo != '') ? $upfNo : ''; ?>" style="width: 90%; height: 500px;" type="application/pdf"></iframe>
        </div>
    </div>
</div>