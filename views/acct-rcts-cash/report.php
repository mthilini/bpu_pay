<?php

$this->title = 'Receipt Cash Report';
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
                    <th style="text-align: center">Receipt</th>
                    <th>Sub</th>
                    <th>
                        <label>Category</label>
                        <br>
                        <label>Rct Type</label>
                    </th>
                    <th>Payer Name</th>
                    <th style="text-align: center">Amount</th>
                    <th style="text-align: center">Deduction</th>
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
                            <td class="dt-center"><?= $i; ?></td>
                            <td><?= $model->rctDate ?></td>
                            <td><?= $model->rctNo ?></td>
                            <td><?= $model->rctSub ?></td>
                            <td>
                                <b><?= ($model->rctCat != '') ? $model->rctCat : '' ?></b>
                                <br>
                                <div><?= ($model->rctType != '') ? $model->rctType : '' ?></div>
                            </td>
                            <td><?= $model->rctName ?></td>
                            <td style="text-align: right !important;"><?= number_format($model->rctAmount, 2, '.', ',') ?></td>
                            <td style="text-align: right !important;"><?= number_format($model->rctDeduct, 2, '.', ',') ?></td>
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
            "autoWidth": false,
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'copyHtml5',
                            title: 'Receipt Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Receipt Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Receipt Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Receipt Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'center';
                                    doc.content[1].table.body[i][2].alignment = 'right';
                                    doc.content[1].table.body[i][6].alignment = 'right';
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                };
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Receipt Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\n From: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
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
                            }
                        }
                    ],
                },
                columnDefs: [{
                        targets: [1],
                        className: 'text-center',
                        width: '63px',
                        'white-space': 'nowrap'
                    },
                    {
                        targets: [3],
                        width: '55px',
                        'max-width': '55px',
                    },
                    {
                        targets: [4],
                        width: '65px',
                        'max-width': '78px'
                    },
                    {
                        orderable: false,
                        targets: '_all'
                    },
                    {
                        orderable: true,
                        className: 'reorder',
                        targets: [0, 1, 9]
                    },
                ]
            },
        });
    });
</script>