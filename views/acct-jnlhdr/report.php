<?php

$this->title = 'HDR Journals Details';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Journal No.</th>
                    <th>Cashbook</th>
                    <th>Prepared</th>
                    <th>Prepare Date</th>
                    <th>Certify</th>
                    <th>Certify Date</th>
                    <th>Authorise</th>
                    <th>Authorise Date</th>
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
                            <td><?= $model->jnlDate; ?></td>
                            <td><?= $model->jnlNo; ?></td>
                            <td><?= $model->jnlCashBk; ?></td>
                            <td><?= $model->jnlPrepared; ?></td>
                            <td><?= $model->jnlDatePrepare; ?></td>
                            <td><?= $model->jnlCertify; ?></td>
                            <td><?= $model->jnlDateCertify; ?></td>
                            <td><?= $model->jnlAuthorise; ?></td>
                            <td><?= $model->jnlDateAuthorise; ?></td>
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
            //                 title: 'HDR Journals Report',
            //             },
            //             {
            //                 extend: 'csvHtml5',
            //                 title: 'HDR Journals Report',
            //             },
            //             {
            //                 extend: 'excelHtml5',
            //                 title: 'HDR Journals Report',
            //             },
            //             {
            //                 extend: 'pdfHtml5',
            //                 title: 'HDR Journals Report',
            //                 orientation: "landscape",
            //                 customize: function(doc) {
            //                     var rowCount = doc.content[1].table.body.length;
            //                     for (i = 1; i < rowCount; i++) {
            //                         doc.content[1].table.body[i][0].alignment = 'right';
            //                         doc.content[1].table.body[i][1].alignment = 'center';
            //                         doc.content[1].table.body[i][2].alignment = 'right';
            //                         doc.content[1].table.body[i][5].alignment = 'center';
            //                         doc.content[1].table.body[i][7].alignment = 'center';
            //                         doc.content[1].table.body[i][9].alignment = 'center';
            //                     };
            //                 }
            //             },
            //             {
            //                 extend: 'print',
            //                 title: 'HDR Journals Report',
            //                 customize: function(win) {
            //                     $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'center');
            //                     $(win.document.body).find('table tbody td:nth-child(2)').css({
            //                         'text-align': 'center',
            //                         'white-space': 'nowrap'
            //                     });
            //                     $(win.document.body).find('table tbody td:nth-child(3)').css('text-align', 'right');
            //                     $(win.document.body).find('table tbody td:nth-child(6)').css('text-align', 'center');
            //                     $(win.document.body).find('table tbody td:nth-child(8)').css('text-align', 'center');
            //                     $(win.document.body).find('table tbody td:nth-child(10)').css('text-align', 'center');
            //                 }
            //             }
            //         ],
            //     },
            // },
            columnDefs: [{
                targets: [1],
                className: 'text-center',
                width: '65px',
                'max-width': '65px',
                'white-space': 'nowrap'
            }]
        });
    });
</script>