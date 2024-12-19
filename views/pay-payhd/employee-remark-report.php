<?php
$this->title = 'Employee Remark';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_employee-remark-search', [
            'request' => $request,
            'upfList' => $upfList,
        ]);
        ?>

        <div id="ifrmDv" style="<?= (isset($_REQUEST['upfNo']) && !empty($_REQUEST['upfNo'])) ? '' : 'display: none;'; ?>; text-align: center;">
            <iframe id="ifrm" src="employee-remark-pdf?upfNo=<?= (isset($_REQUEST['upfNo']) && !empty($_REQUEST['upfNo'])) ? $_REQUEST['upfNo'] : ''; ?>" style="width: 90%; height: 500px;"></iframe>
        </div>
    </div>
</div>