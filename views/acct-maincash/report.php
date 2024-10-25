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

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Receipt</th>
                    <th rowspan="2">Sub</th>
                    <th rowspan="2">Type</th>
                    <th rowspan="2">Category</th>
                    <th rowspan="2">Name</th>
                    <th style="text-align: center;" colspan="2">Amount</th>
                    <th rowspan="2">Deduction</th>
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
                            <td><?= $model->mainType; ?></td>
                            <td><?= $model->mainCat; ?></td>
                            <td><?= $model->mainName; ?></td>
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
                            <td style="text-align: right !important;"><?= $model->mainDeduct; ?></td>
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
                    <td colspan="10">&nbsp;</td>
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
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\nFrom: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\nFrom: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\nFrom: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\nFrom: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 2; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                    doc.content[1].table.body[i][8].alignment = 'right';
                                    doc.content[1].table.body[i][9].alignment = 'right';
                                    doc.content[1].table.body[i][12].alignment = 'right';
                                };

                                doc.content[1].table.body[0][7].alignment = 'center';
                                doc.content[1].table.body[rowCount - 1][10].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][12].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Main Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\nFrom: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            columnDefs: [{
                                    targets: '_all',
                                    className: 'text-left'
                                },
                                {
                                    targets: [7, 8, 9, 12],
                                    className: 'text-right'
                                }
                            ]
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