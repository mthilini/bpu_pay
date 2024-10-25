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
                    <th>Voucher</th>
                    <th>Sub No.</th>
                    <th>Pay Type</th>
                    <th>Pay Category</th>
                    <th>Payee Name</th>
                    <th>Amount</th>
                    <th>Deduction</th>
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
                            <td><?= $model->payDate ?></td>
                            <td><?= $model->payVch ?></td>
                            <td><?= $model->paySub ?></td>
                            <td><?= $model->payType ?></td>
                            <td><?= $model->payCat ?></td>
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
                                    doc.content[1].table.body[i][7].alignment = 'right';
                                };
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Payment Cash Report' + ($('#cashbook').val() != '' ? ' - ' + $('#cashbook').val() : '') + (($('#from').val() != '' && $('#to').val() != '') ? '\nFrom: ' + $('#from').val() + ' - To: ' + $('#to').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            columnDefs: [{
                                    targets: '_all',
                                    className: 'text-left'
                                },
                                {
                                    targets: [7],
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