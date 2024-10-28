<?php

$this->title = 'Trial Detail Report';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_search', [
            'request' => $request,
        ]);
        ?>

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ledger Code</th>
                    <th>Ledger Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Month</th>
                    <th>TB</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totDebit = 0;
                $totCredit = 0;
                if ($dataProvider != null) {
                    $i = 0;
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $i++;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i; ?></td>
                            <td><?= $model->ledgCode; ?></td>
                            <td><?= $model->acctLedgerDesc->ledgDesc; ?></td>
                            <?php
                            if ($model->trialdtlClosing > 0) {
                                $debit = $model->trialdtlClosing;
                                $totDebit += $debit;
                            ?>
                                <td><?= number_format($debit, 2, '.', ','); ?></td>
                                <td></td>
                            <?php
                            } else {
                                $credit = abs($model->trialdtlClosing);
                                $totCredit += $credit;
                            ?>
                                <td></td>
                                <td><?= number_format($credit, 2, '.', ','); ?></td>
                            <?php } ?>
                            <td><?= $model->trialdtlMonth; ?></td>
                            <td><?= $model->trialdtlTB; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align: right;"><label for="">Grand Total :</label></td>
                    <td><?= number_format($totDebit, 2, '.', ','); ?></td>
                    <td><?= number_format($totCredit, 2, '.', ','); ?></td>
                    <td></td>
                    <td></td>
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
                            title: 'Trial Detail Report' + ($('#month').val() != '' ? ' Month: ' + $('#month').val() : '') + ($('#tb').val() != '' ? ' TB: ' + $('#tb').val() : ''),
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Trial Detail Report' + ($('#month').val() != '' ? ' Month: ' + $('#month').val() : '') + ($('#tb').val() != '' ? ' TB: ' + $('#tb').val() : ''),
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Trial Detail Report' + ($('#month').val() != '' ? ' Month: ' + $('#month').val() : '') + ($('#tb').val() != '' ? ' TB: ' + $('#tb').val() : ''),
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Trial Detail Report' + ($('#month').val() != '' ? ' Month: ' + $('#month').val() : '') + ($('#tb').val() != '' ? ' TB: ' + $('#tb').val() : ''),
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][3].alignment = 'right';
                                    doc.content[1].table.body[i][4].alignment = 'right';
                                    doc.content[1].table.body[i][5].alignment = 'right';
                                    doc.content[1].table.body[i][6].alignment = 'center';
                                };

                                doc.content[1].table.body[rowCount - 1][2].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][3].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][4].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Trial Detail Report' + ($('#month').val() != '' ? ' Month: ' + $('#month').val() : '') + ($('#tb').val() != '' ? ' TB: ' + $('#tb').val() : ''),
                            pageSize: "A3",
                            orientation: "landscape",
                            columnDefs: [{
                                    targets: [3, 4, 5],
                                    className: 'text-right'
                                },
                                {
                                    targets: [6],
                                    className: 'text-center'
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