<?php

$this->title = 'User Log Report';
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
                    <th>Remarks</th>
                    <th>Type</th>
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
                            <td><?= $model->loguDate; ?></td>
                            <td><?= $model->loguUser; ?></td>
                            <td><?= $model->loguRmks; ?></td>
                            <td><?= $model->loguType; ?></td>
                            <td><?= $model->loguVersion; ?></td>
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
            "pageLength": 20,
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'copyHtml5',
                            title: 'User Log Report',
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'User Log Report',
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'User Log Report',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'User Log Report',
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'center';
                                    doc.content[1].table.body[i][5].alignment = 'center';
                                };
                            }
                        },
                        {
                            extend: 'print',
                            title: 'User Log Report',
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(2)').css({
                                    'text-align': 'center',
                                    'white-space': 'nowrap'
                                });
                                $(win.document.body).find('table tbody td:nth-child(6)').css('text-align', 'center');
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