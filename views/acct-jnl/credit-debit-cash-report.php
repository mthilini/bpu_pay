<?php

$this->title = 'Journal Debit and Credit Report (Cashbook Wise)';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_credit-debit-cash-search', [
            'request' => $request,
            'cashbooks' => $cashbooks
        ]);
        ?>

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Journal No.</th>
                    <th rowspan="2">Sub</th>
                    <th rowspan="2">Ledger / Vote</th>
                    <th rowspan="2">Ledger / Vote Desc</th>
                    <th rowspan="2">Category</th>
                    <th colspan="2" style="text-align: center;">Amount (Rs.)</th>
                    <th rowspan="2">Remarks</th>
                    <th rowspan="2">Cashbook</th>
                    <th rowspan="2">Department</th>
                    <th rowspan="2">Net Balance (Rs.)</th>
                </tr>
                <tr>
                    <th style="text-align: center;">Credit</th>
                    <th style="text-align: center;">Debit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totAmount = 0.00;
                if ($dataProvider != null) {
                    $i = 0;
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $i++;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i ?></td>
                            <td><?= $model->jnlDate ?></td>
                            <td><?= $model->jnlNo ?></td>
                            <td><?= $model->jnlSub ?></td>
                            <td style="white-space: nowrap;"><?= $model->jnlLedg ?></td>
                            <td><?= $model->acctZledgDesc->zledgDesc ?></td>
                            <td><?= $model->jnlCat ?></td>
                            <?php
                            if ($model->jnlPayRct == 'P') {
                                $pAmount = $model->jnlAmount;
                                $totAmount -= $pAmount;
                            ?>
                                <td>&nbsp;</td>
                                <td style="text-align: right;"><?= number_format($pAmount, 2, '.', ','); ?></td>
                            <?php } else {
                                $rAmount = $model->jnlAmount;
                                $totAmount += $rAmount;
                            ?>
                                <td style="text-align: right;"><?= number_format($rAmount, 2, '.', ','); ?></td>
                                <td>&nbsp;</td>
                            <?php } ?>

                            <td><?= $model->jnlRmks ?></td>
                            <td><?= $model->jnlCashBk ?></td>
                            <td><?= $model->jnlDept ?></td>
                            <td style="text-align: right;"><?= number_format($totAmount, 2, '.', ','); ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">&nbsp;</td>
                    <td colspan="2" class="grand-tot"><label for="tot_header">Total Net Balance:</label></td>
                    <td class="grand-tot"><label for="tot"><?= number_format($totAmount, 2, '.', ','); ?></label></td>
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
                            title: 'Journal Debit and Credit Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Journal Debit and Credit Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Journal Debit and Credit Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Journal Debit and Credit Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            pageSize: "A3",
                            pageSize: 'LEGAL',
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 2; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'center';
                                    doc.content[1].table.body[i][2].alignment = 'right';
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                    doc.content[1].table.body[i][8].alignment = 'right';
                                    doc.content[1].table.body[i][8].alignment = 'right';
                                    doc.content[1].table.body[i][12].alignment = 'right';
                                };
                                doc.content[1].table.body[rowCount - 1][10].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][12].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Journal Debit and Credit Report (Cashbook Wise)' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(2)').css({
                                    'text-align': 'center',
                                    'white-space': 'nowrap'
                                });
                                $(win.document.body).find('table tbody td:nth-child(3)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(5)').css('white-space', 'nowrap');
                                $(win.document.body).find('table tbody td:nth-child(8)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(9)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(13)').css('text-align', 'right');
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
                    targets: [0, 2, 7, 8],
                    className: 'text-right',
                },
                {
                    orderable: true,
                    className: 'reorder',
                    targets: [0, 1, 2, 4, 10]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ]
        });
    });
</script>