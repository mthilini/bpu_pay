<?php

$this->title = 'Payment Ledger Report (Ledger Wise)';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_ledg-search', [
            'request' => $request,
            'ledgers' => $ledgers,
        ]);
        ?>

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Pay Voucher</th>
                    <th>Pay Sub</th>
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
                            <td><?= $model->payDate ?></td>
                            <td><?= $model->payVch ?></td>
                            <td><?= $model->paySub ?></td>
                            <td><?= $model->payCat ?></td>
                            <td><?= $model->payLedg ?></td>
                            <td><?= $model->acctLedgerDesc->ledgDesc ?></td>
                            <td><?= number_format($model->payAmount, 2, '.', ',') ?></td>
                            <td><?= $model->payRmks ?></td>
                            <td><?= $model->payCashBk ?></td>
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
                            title: 'Payment Ledger Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Payment Ledger Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Payment Ledger Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Payment Ledger Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
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
                            title: 'Payment Ledger Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(2)').css({
                                    'text-align': 'center',
                                    'white-space': 'nowrap'
                                });
                                $(win.document.body).find('table tbody td:nth-child(3)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(8)').css('text-align', 'right');
                            }
                        }
                    ],
                },
            },
            columnDefs: [{
                targets: [1],
                className: 'text-center',
                width: '63px'
            }]
        });
    });
</script>