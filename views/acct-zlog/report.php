<?php

$this->title = 'Data Log Report';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Description</th>
                    <th>Receipt</th>
                    <th>Sub</th>
                    <th>Amount</th>
                    <th>Process</th>
                    <th>Remarks</th>
                    <th>Cashbook</th>
                    <th>Version</th>
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
                            <td><?= $model->logDate; ?></td>
                            <td><?= $model->logUser; ?></td>
                            <td><?= $model->logDesc; ?></td>
                            <td><?= $model->logVchRct; ?></td>
                            <td><?= $model->logSub; ?></td>
                            <td><?= number_format($model->logAmount, 2, '.', ','); ?></td>
                            <td><?= $model->logProcess; ?></td>
                            <td><?= $model->logRmks; ?></td>
                            <td><?= $model->logCashBk; ?></td>
                            <td><?= $model->logVersion; ?></td>
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
                            title: 'Data Log Report',
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Data Log Report',
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Data Log Report',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Data Log Report',
                            orientation: "landscape",
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'center';
                                    doc.content[1].table.body[i][4].alignment = 'right';
                                    doc.content[1].table.body[i][6].alignment = 'right';
                                    doc.content[1].table.body[i][10].alignment = 'center';
                                };
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Data Log Report',
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(2)').css({
                                    'text-align': 'center',
                                    'white-space': 'nowrap'
                                });
                                $(win.document.body).find('table tbody td:nth-child(5)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(7)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(11)').css('text-align', 'center');
                            }
                        }
                    ],
                },
            },
            columnDefs: [{
                targets: [1],
                className: 'text-center',
                width: '110px',
                'max-width': '110px',
                'white-space': 'nowrap'
            }]
        });
    });
</script>