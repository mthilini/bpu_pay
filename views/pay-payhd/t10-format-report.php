<?php
$this->title = 'T10 Form';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_t10-format-search', [
            'request' => $request,
            'upfList' => $upfList,
        ]);
        ?>

        <div id="ifrmDv" style="<?= (isset($_REQUEST['upfNo']) && !empty($_REQUEST['upfNo'])) ? '' : 'display: none;'; ?>; text-align: center;">
            <iframe id="ifrm" src="t10-format-pdf?upfNo=<?= (isset($_REQUEST['upfNo']) && !empty($_REQUEST['upfNo'])) ? $_REQUEST['upfNo'] : ''; ?>" style="width: 90%; height: 700px;"></iframe>
        </div>
    </div>
</div>