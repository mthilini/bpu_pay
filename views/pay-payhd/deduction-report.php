<?php
$this->title = 'Deduction List';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?=
        $this->render('_deduction-search', [
            'request' => $request,
            'payFields' => $payFields,
        ]);
        ?>

        <table id="report" class="table dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No</th>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
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
                        $amount = $model['sdedAmt'];
                        $totAmount += $amount;
                ?>
                        <tr>
                            <td class="dt-center"><?= $i; ?></td>
                            <td><?= $model['empUPFNo']; ?></td>
                            <td><?= $model['empTitle'] . ' ' . $model['empSurname'] . ' ' . $model['empInitials']; ?></td>
                            <td><?= $model['deptName']; ?></td>
                            <td><?= $model['sdedStart']; ?></td>
                            <td><?= $model['sdedEnd']; ?></td>
                            <td><?= number_format($amount, 2, '.', ','); ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">&nbsp;</th>
                    <th colspan="2" class="grand-tot balance"><label for="tot_header">Total Amount:</label></th>
                    <th class="grand-tot balance" style="text-align: right !important;"><label for="tot"><?= number_format($totAmount, 2, '.', ','); ?></label></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        var date = ($('#date').val() != '') ? $('#date').val() : '';
        var fldName = ($('#fldCode').val() != '') ? $('#fldCode').find(":selected").text() : '';

        $('#report').DataTable({
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'copyHtml5',
                            title: 'Buddhist and Pali Universitry \n Deduction List : ' + date + '\n (' + fldName + ')',
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Buddhist and Pali Universitry \n Deduction List : ' + date + '\n (' + fldName + ')',
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'Buddhist and Pali Universitry \n Deduction List : ' + date + '\n (' + fldName + ')',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Buddhist and Pali Universitry \n Deduction List : ' + date + '\n\n  ' + fldName,
                            bold: true,
                            // orientation: "landscape",
                            customize: function(doc) {
                                // doc.styles.tableHeader.alignment = "left";
                                var rowCount = doc.content[1].table.body.length;
                                for (i = 1; i < rowCount - 1; i++) {
                                    doc.content[1].table.body[i][0].alignment = 'right';
                                    doc.content[1].table.body[i][1].alignment = 'right';
                                    doc.content[1].table.body[i][4].alignment = 'center';
                                    doc.content[1].table.body[i][5].alignment = 'center';
                                    doc.content[1].table.body[i][6].alignment = 'right';
                                };
                                doc.content[1].table.body[rowCount - 1][4].alignment = 'right';
                                doc.content[1].table.body[rowCount - 1][6].alignment = 'right';
                            }
                        },
                        {
                            extend: 'print',
                            title: fldName,
                            orientation: "landscape",
                            exportOptions: {
                                stripHtml: false
                            },
                            customize: function(win) {
                                $(win.document.body)
                                    .css('font-size', '15pt')
                                    .css('font-weight', 'bold')
                                    .css('text-align', 'center')
                                    .prepend(
                                        'Buddhist and Pali Universitry <br>Deduction List : ' + date
                                    );

                                $(win.document.body).find('table tbody td:nth-child(1)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(2)').css('text-align', 'right');
                                $(win.document.body).find('table tbody td:nth-child(5)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(6)').css('text-align', 'center');
                                $(win.document.body).find('table tbody td:nth-child(7)').css('text-align', 'right');
                                $(win.document.body).find('table tfoot th').css('text-align', 'right');
                                $(win.document.body).find('table tfoot th').addClass("align-right");
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
                    targets: [4, 5],
                    className: 'text-center',
                },
                {
                    targets: [0, 1, 6],
                    className: 'text-right',
                },
                {
                    orderable: true,
                    className: 'reorder',
                    targets: [0, 1, 4, 5]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ]
        });
    });
</script>