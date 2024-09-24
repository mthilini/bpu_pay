<?php
$this->title = 'Cashbook Reports';
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
            $this->render('_search', [
                'request' => $request,
            ]);
        ?>

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bact Acct Code</th>
                    <th>Bact Bank Code</th>
                    <th>Bact Bank Name</th>
                    <th>Bact Acct No</th>
                    <th>Bact Acct Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($dataProvider != null) {
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        ?>
                        <tr>
                            <td class="dt-center"><?= ++$key ?></td>
                            <td><?= $model->bactAcctCode ?></td>
                            <td><?= $model->bactBankCode ?></td>
                            <td><?= $model->bactBankName ?></td>
                            <td><?= $model->bactAcctNo ?></td>
                            <td><?= $model->bactAcctName ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#report').DataTable({
            layout: {
                topStart: {
                    buttons: ['copy', 'csv',
                        {
                            extend: 'excelHtml5',
                            title: (document.getElementById('a_min').value && document.getElementById('a_max').value) ? document.title + ' - ' + document.getElementById('a_min').value + ' to ' + document.getElementById('a_max').value : document.title
                        },
                        {
                            extend: 'pdfHtml5',
                            title: (document.getElementById('a_min').value && document.getElementById('a_max').value) ? document.title + ' - ' + document.getElementById('a_min').value + ' to ' + document.getElementById('a_max').value : document.title,
                            messageBottom: 'System Generated Report - ' + (new Date()).toLocaleDateString() + ' ' + (new Date()).toLocaleTimeString()
                        },
                        'print']
                }
            },
            columnDefs: [
                { targets: '_all', className: 'text-left' },
                { targets: [0], className: 'text-center' }
            ]
        });
    });
</script>