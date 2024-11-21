<?php

$this->title = 'Receipt Ledgers Report (Cashbook Wise)';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_cash-search', [
            'request' => $request,
            'cashbooks' => $cashbooks
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
                    <th>Ledger / Vote</th>
                    <th>Ledger / Vote Description</th>
                    <th>Amount (Rs.)</th>
                    <th>Remarks</th>
                    <th>Cashbook</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totReceipt = 0.00;
                if ($dataProvider != null) {
                    $i = 0;
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $totReceipt += $model->rctAmount;
                        $i++;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i ?></td>
                            <td><?= $model->rctDate ?></td>
                            <td><?= $model->rctNo ?></td>
                            <td><?= $model->rctSub ?></td>
                            <td><?= $model->rctCat ?></td>
                            <td style="white-space: nowrap;"><?= $model->rctLedger ?></td>
                            <td><?= $model->acctZledgDesc->zledgDesc ?></td>
                            <td><?= number_format($model->rctAmount, 2, '.', ',') ?></td>
                            <td><?= $model->rctRmks ?></td>
                            <td><?= $model->rctCashBk ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">&nbsp;</td>
                    <td class="grand-tot"><label for="tot_header">Total Receipt:</label></td>
                    <td class="grand-tot"><label for="tot"><?= number_format($totReceipt, 2, '.', ','); ?></label></td>
                    <td colspan="2">&nbsp;</td>
                </tr>
            </tfoot>
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
                            title: 'Receipt Ledgers Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Receipt Ledgers Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Receipt Ledgers Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Receipt Ledgers Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'center';
                                    doc.content[1].table.body[i][2].alignment = 'right';
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                };
                                doc.content[1].table.body[rowCount - 1][6].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][7].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Receipt Ledgers Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(2)').css({
                                    'text-align': 'center',
                                    'white-space': 'nowrap'
                                });
                                $(win.document.body).find('table tbody td:nth-child(3)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(6)').css('white-space', 'nowrap');
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
                },
                {
                    orderable: true,
                    className: 'reorder',
                    targets: [0, 1, 2, 5, 9]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ]
        });
    });
</script>