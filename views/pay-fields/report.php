<?php
$this->title = 'Field Information List';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Field Code</th>
                    <th>Field Name</th>
                    <th>EPF Contributor</th>
                    <th>ETF Contributor</th>
                    <th>Field Type</th>
                    <th>Field Category</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                if ($dataProvider != null) {
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $i++;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i; ?></td>
                            <td><?= $model->fldCode; ?></td>
                            <td><?= $model->fldName; ?></td>
                            <td><?= ($model->fldUPF == '0' ? 'No' : 'Yes'); ?></td>
                            <td><?= ($model->fldETF == '0' ? 'No' : 'Yes'); ?></td>
                            <td><?= $model->fldType; ?></td>
                            <td><?= $model->fldCat; ?></td>
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
                            title: 'Field Information List'
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Field Information List'
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Field Information List'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Field Information List',
                            customize: function(doc) {
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount; i++) {
                                    doc.content[1].table.body[i][3].alignment = 'center';
                                    doc.content[1].table.body[i][4].alignment = 'center';
                                    doc.content[1].table.body[i][5].alignment = 'right';
                                    doc.content[1].table.body[i][6].alignment = 'right';
                                };
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Field Information List',
                            exportOptions: {
                                stripHtml: false
                            },
                            customize: function(win) {
                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(4)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(5)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(6)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(7)').css('text-align', 'right');
                            },
                        }
                    ],
                },
            },
            columnDefs: [{
                    targets: '_all',
                    className: 'text-left',
                },
                {
                    targets: [3, 4, 5, 6],
                    className: 'text-center',
                },
                {
                    targets: [0],
                    className: 'text-right',
                },
                {
                    orderable: true,
                    className: 'reorder',
                    targets: [0, 1]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ]
        });
    });
</script>