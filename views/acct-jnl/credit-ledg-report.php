<?php

$this->title = 'Journal Credit Report (Ledger Wise)';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_credit-ledg-search', [
            'request' => $request,
            'ledgers' => $ledgers
        ]);
        ?>

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Journal No.</th>
                    <th>Sub</th>
                    <th>Ledger</th>
                    <th>Ledger Description</th>
                    <th>Category</th>
                    <th>Amount (Rs.)</th>
                    <th>Remarks</th>
                    <th>Cashbook</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totCredit = 0.00;
                if ($dataProvider != null) {
                    $i = 0;
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $i++;
                        $amount = $model->jnlAmount;
                        $totCredit += $amount;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i ?></td>
                            <td><?= $model->jnlDate ?></td>
                            <td><?= $model->jnlNo ?></td>
                            <td><?= $model->jnlSub ?></td>
                            <td><?= $model->jnlLedg ?></td>
                            <td><?= $model->acctLedgerDesc->ledgDesc ?></td>
                            <td><?= $model->jnlCat ?></td>
                            <td><?= number_format($amount, 2, '.', ',') ?></td>
                            <td><?= $model->jnlRmks ?></td>
                            <td><?= $model->jnlCashBk ?></td>
                            <td><?= $model->jnlDept ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">&nbsp;</td>
                    <td class="grand-tot" colspan="2"><label for="tot_header">Total Credit:</label></td>
                    <td class="grand-tot"><label for="tot"><?= number_format($totCredit, 2, '.', ','); ?></label></td>
                    <td colspan="3">&nbsp;</td>
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
                            title: 'Journal Credit Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Journal Credit Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Journal Credit Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Journal Credit Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'center';
                                    doc.content[1].table.body[i][2].alignment = 'right';
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                };

                                doc.content[1].table.body[rowCount - 1][5].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][7].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Journal Credit Report (Ledger Wise)' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
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
                    targets: '_all',
                    className: 'text-left'
                },
                {
                    targets: [1],
                    className: 'text-center',
                    width: '63px'
                },
                {
                    targets: [0, 2, 7],
                    className: 'text-right',
                },
                {
                    orderable: true,
                    className: 'reorder',
                    targets: [0, 1, 2, 4, 9]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ]
        });
    });
</script>