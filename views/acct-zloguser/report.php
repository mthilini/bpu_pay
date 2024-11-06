<?php

$this->title = 'User Log Details';
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
        $('#report thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#report thead');

        $('#report').DataTable({
            "autoWidth": false,
            fixedColumns: true,
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function() {
                var api = this.api();

                api
                    .columns(':not(.no_filter)')
                    .eq(0)
                    .each(function(colIdx) {
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );

                        $(cell).html('<div style="text-align: center;"><input type="text" style="width:100% !important;"/></div>');

                        $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                            .off('keyup change')
                            .on('keyup change', function(e) {
                                e.stopPropagation();

                                var regexr = '({search})';

                                var cursorPosition = this.selectionStart;
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();

                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
            // layout: {
            //     topStart: {
            //         buttons: [{
            //                 extend: 'copyHtml5',
            //                 title: 'User Log Report',
            //             },
            //             {
            //                 extend: 'csvHtml5',
            //                 title: 'User Log Report',
            //             },
            //             {
            //                 extend: 'excelHtml5',
            //                 title: 'User Log Report',
            //             },
            //             {
            //                 extend: 'pdfHtml5',
            //                 title: 'User Log Report',
            //                 customize: function(doc) {
            //                     var rowCount = doc.content[1].table.body.length;
            //                     for (i = 1; i < rowCount; i++) {
            //                         doc.content[1].table.body[i][0].alignment = 'right';
            //                         doc.content[1].table.body[i][1].alignment = 'center';
            //                         doc.content[1].table.body[i][5].alignment = 'center';
            //                     };
            //                 }
            //             },
            //             {
            //                 extend: 'print',
            //                 title: 'User Log Report',
            //                 customize: function(win) {
            //                     $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
            //                     $(win.document.body).find('table tbody td:nth-child(2)').css({
            //                         'text-align': 'center',
            //                         'white-space': 'nowrap'
            //                     });
            //                     $(win.document.body).find('table tbody td:nth-child(6)').css('text-align', 'center');
            //                 }
            //             }
            //         ],
            //     },
            // },
            columnDefs: [{
                    targets: [0],
                    width: '60px',
                    'max-width': '110px',
                    'white-space': 'nowrap'
                },
                {
                    targets: [1],
                    className: 'text-center',
                    width: '110px',
                    'max-width': '110px',
                    'white-space': 'nowrap'
                }
            ]
        });
    });
</script>