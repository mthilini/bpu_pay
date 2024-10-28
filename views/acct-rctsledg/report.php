<?php

$this->title = 'Receipt Ledgers Report';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_search', [
            'request' => $request,
            'ledgers' => $ledgers
        ]);
        ?>

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Receipt No</th>
                    <th>Receipt Sub</th>
                    <th>Category</th>
                    <th>Ledger</th>
                    <th>Ledger Description</th>
                    <th>Amount (Rs.)</th>
                    <th>Remarks</th>
                    <th>Cashbook</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($dataProvider != null) {
                    $i = 0;
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $i++;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i ?></td>
                            <td><?= $model->rctDate ?></td>
                            <td><?= $model->rctNo ?></td>
                            <td><?= $model->rctSub ?></td>
                            <td><?= $model->rctCat ?></td>
                            <td><?= $model->rctLedger ?></td>
                            <td><?= $model->acctLedgerDesc->ledgDesc ?></td>
                            <td><?= number_format($model->rctAmount, 2, '.', ',') ?></td>
                            <td><?= $model->rctRmks ?></td>
                            <td><?= $model->rctCashBk ?></td>
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
    $(document).ready(function() {
        $('#report').DataTable({
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'copyHtml5',
                            title: 'Receipt Ledgers Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Receipt Ledgers Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Receipt Ledgers Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Receipt Ledgers Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount; i++) {
                                    doc.content[1].table.body[i][2].alignment = 'right';
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                };
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Receipt Ledgers Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            columnDefs: [{
                                    targets: '_all',
                                    className: 'text-left'
                                },
                                {
                                    targets: [2, 7],
                                    className: 'text-right'
                                }
                            ]
                        }
                    ],
                },
            },
        });
    });
</script>