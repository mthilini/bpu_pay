<?php

$this->title = 'Payment Cash Report';
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
                    <th>#</th>
                    <th>Date</th>
                    <th style="text-align: center">Voucher</th>
                    <th>Sub No.</th>
                    <th>
                        <label>Category</label>
                        <br>
                        <label>Pay Type</label>
                    </th>
                    <th>Payee Name</th>
                    <th style="text-align: center">Amount</th>
                    <th style="text-align: center">Deduction</th>
                    <th>Remarks</th>
                    <th>Cashbook</th>
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
                        $totAmount += $model->payAmount;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i; ?></td>
                            <td><?= $model->payDate ?></td>
                            <td><?= $model->payVch ?></td>
                            <td><?= $model->paySub ?></td>
                            <td>
                                <b><?= ($model->payCat != '') ? $model->payCat : '' ?></b>
                                <br>
                                <div><?= ($model->payType != '') ? $model->payType : '' ?></div>
                            </td>
                            <td><?= $model->payPayee ?></td>
                            <td><?= number_format($model->payAmount, 2, '.', ',') ?></td>
                            <td><?= $model->payDeduct ?></td>
                            <td><?= $model->payRmks ?></td>
                            <td><?= $model->payCashBk ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="grand-tot balance"><label for="tot_header">Total Payment :</label></td>
                    <td class="grand-tot balance"><label for="tot"><?= number_format($totAmount, 2, '.', ','); ?></label></td>
                    <td colspan="3"></td>
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
                            title: 'Payment Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Payment Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Payment Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Payment Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'center';
                                    doc.content[1].table.body[i][2].alignment = 'right';
                                    doc.content[1].table.body[i][6].alignment = 'right';
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                };
                                doc.content[1].table.body[rowCount - 1][4].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][7].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Payment Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            exportOptions: {
                                stripHtml: false
                            },
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(2)').css({
                                    'text-align': 'center',
                                    'white-space': 'nowrap',
                                });
                                $(win.document.body).find('table tbody td:nth-child(3)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(7)').css('text-align', 'right');
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
                    targets: [4],
                    width: '65px',
                    'max-width': '78px'
                },
                {
                    orderable: true,
                    className: 'reorder',
                    targets: [0, 1, 2, 9]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ]
        });
    });
</script>