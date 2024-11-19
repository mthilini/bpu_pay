<?php

$this->title = 'Main Cash Report';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_search', [
            'request' => $request,
            'cashbooks' => $cashbooks
        ]);
        ?>

        <table id="report" class="table dataTable" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Receipt</th>
                    <th rowspan="2">Sub</th>
                    <th rowspan="2">
                        <label>Category</label>
                        <br>
                        <label>Type</label>
                    </th>
                    <th rowspan="2">Name</th>
                    <th style="text-align: center;" colspan="2">Amount</th>
                    <th rowspan="2">Deduction</th>
                    <th rowspan="2">Remarks</th>
                    <th rowspan="2">Cashbook</th>
                    <th rowspan="2">Net Balance (Rs.)</th>
                </tr>
                <tr>
                    <th style="text-align: center;">Receipt</th>
                    <th style="text-align: center;">Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totAmount = !empty($openingBalance) ? $openingBalance : 0.00;
                if ($dataProvider != null) {
                    $i = 0;
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $i++;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i; ?></td>
                            <td><?= $model->mainDate; ?></td>
                            <td><?= $model->mainVchRct; ?></td>
                            <td><?= $model->mainSub; ?></td>
                            <td>
                                <b><?= ($model->mainCat != '') ? $model->mainCat : '' ?></b>
                                <br>
                                <div><?= ($model->mainType != '') ? $model->mainType : '' ?></div>
                            </td>
                            <td><?= $model->mainName; ?></td>
                            <?php
                            $amount = $model->mainAmount;
                            if ($model->mainPayRct == 'P') {
                                $pay = $model->mainAmount;
                                $totAmount -= $pay;
                            ?>
                                <td>&nbsp;</td>
                                <td style="text-align: right;"><?= number_format($pay, 2, '.', ','); ?></td>
                            <?php
                            } else {
                                $rec = $model->mainAmount;
                                $totAmount += $rec;
                            ?>
                                <td style="text-align: right;"><?= number_format($rec, 2, '.', ','); ?></td>
                                <td>&nbsp;</td>
                            <?php } ?>
                            <td style="text-align: right !important;"><?= $model->mainDeduct; ?></td>
                            <td><?= $model->mainRmks; ?></td>
                            <td><?= $model->mainCashBk; ?></td>
                            <td><?= number_format($totAmount, 2, '.', ','); ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="grand-tot balance" colspan="5" style="text-align: right;"><label for="openingBalance">Opening Balance <?= (!empty($request['from'])) ? ' For ' . $request['from'] : ''; ?> (Rs.) : </label></td>
                    <td class="grand-tot balance" style="text-align: left !important;"><label for="openingBalance"><?=  number_format($openingBalance, 2, '.', ','); ?></label></td>
                    <td colspan="3"></td>
                    <td colspan="2" class="grand-tot balance"><label for="tot_header">Closing Balance :</label></td>
                    <td class="grand-tot balance"><label for="tot"><?= number_format($totAmount, 2, '.', ','); ?></label></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#report').DataTable({
            "autoWidth": false,
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'copyHtml5',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            pageSize: "A3",
                            pageSize: 'LEGAL',
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 2; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'center';
                                    doc.content[1].table.body[i][2].alignment = 'right';
                                    doc.content[1].table.body[i][6].alignment = 'right';
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                    doc.content[1].table.body[i][8].alignment = 'right';
                                    doc.content[1].table.body[i][11].alignment = 'right';
                                };

                                doc.content[1].table.body[0][4].alignment = 'left';
                                doc.content[1].table.body[0][6].alignment = 'center';
                                doc.content[1].table.body[rowCount - 1][9].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][11].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            exportOptions: {
                                stripHtml: false
                            },
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(2)').css({
                                    'text-align': 'center',
                                    'white-space': 'nowrap'
                                });
                                $(win.document.body).find('table tbody td:nth-child(3)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(7)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(8)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(9)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(12)').css('text-align', 'right');
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
                    targets: [4],
                    width: '65px',
                    'max-width': '78px'
                },
                {
                    orderable: true,
                    className: 'reorder',
                    targets: [0, 1, 2, 10]
                },
                {
                    orderable: false,
                    targets: '_all'
                },
            ]
        });
    });
</script>