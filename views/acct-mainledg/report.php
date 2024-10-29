<?php

$this->title = 'Main Ledger Report';
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
                    <th rowspan="2">#</th>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Receipt</th>
                    <th rowspan="2">Sub</th>
                    <th rowspan="2">Ledger</th>
                    <th rowspan="2">Ledger Desc</th>
                    <th rowspan="2">Category</th>
                    <th style="text-align: center;" colspan="2">Amount</th>
                    <th rowspan="2">Remarks</th>
                    <th rowspan="2">Cashbook</th>
                    <th rowspan="2">Tot. Amnt</th>
                </tr>
                <tr>
                    <th style="text-align: center;">Payment</th>
                    <th style="text-align: center;">Receipt</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ptotal = 0.00;
                $rtotal = 0.00;
                $gtotal = 0.00;
                $totAmount = 0.00;
                if ($dataProvider != null) {
                    $i = 0;
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $i++;
                        $totAmount += $model->mainAmount;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i; ?></td>
                            <td><?= $model->mainDate; ?></td>
                            <td><?= $model->mainVchRct; ?></td>
                            <td><?= $model->mainSub; ?></td>
                            <td><?= $model->mainLedg; ?></td>
                            <td><?= $model->acctLedgerDesc->ledgDesc; ?></td>
                            <td><?= $model->mainCat; ?></td>
                            <?php
                            $amount = $model->mainAmount;
                            if ($model->mainPayRct == 'P') {
                                $ptotal += $amount;
                            ?>
                                <td style="text-align: right;"><?= number_format($amount, 2, '.', ','); ?></td>
                                <td>&nbsp;</td>
                            <?php
                            } else {
                                $rtotal += $amount;
                            ?>
                                <td>&nbsp;</td>
                                <td style="text-align: right;"><?= number_format($amount, 2, '.', ','); ?></td>
                            <?php } ?>
                            <td><?= $model->mainRmks; ?></td>
                            <td><?= $model->mainCashBk; ?></td>
                            <td><?= number_format($totAmount, 2, '.', ','); ?></td>
                        </tr>
                <?php
                        $gtotal += $amount;
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">&nbsp;</td>
                    <td colspan="2" class="grand-tot"><label for="tot_header">Grand Total :</label></td>
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
                            title: 'Main Ledger Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Main Ledger Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Main Ledger Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Main Ledger Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 2; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][2].alignment = 'right';
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                    doc.content[1].table.body[i][8].alignment = 'right';
                                    doc.content[1].table.body[i][11].alignment = 'right';
                                };

                                doc.content[1].table.body[0][7].alignment = 'center';
                                doc.content[1].table.body[rowCount - 1][9].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][11].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Main Ledger Report' + ($('#ledger').val() != '' ? ' - ' + $('#ledger').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(2)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(3)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(8)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(9)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(12)').css('text-align', 'right');
                            }
                        }
                    ],
                },
            },
            // columnDefs: [{
            //     "targets": '_all',
            //     {
            //         targets: '_all',
            //         className: 'text-left'
            //     },
            //     {
            //         targets: [0],
            //         className: 'text-center'
            //     },
            // }]
        });
    });
</script>