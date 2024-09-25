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
                    <th></th>
                    <th>Emp Upf No</th>
                    <th>Emp. Name</th>
                    <th>SO Ded. Ref</th>
                    <th>SO Ded. Fld</th>
                    <th>SO Ded. Field</th>
                    <th>SO Ded. Start</th>
                    <th>SO Ded. End</th>
                    <th>SO Ded. Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php

                use app\models\Employee;

                if ($dataProvider != null) {
                    $i = 0;
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                        $i++;

                        $employeemodel = new Employee();
                        $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                ?>
                        <tr>
                            <td class="dt-center"><?= $i; ?></td>
                            <td><?= $model->empUPFNo; ?></td>
                            <td><?= $employeeName; ?></td>
                            <td><?= $model->sdedRef; ?></td>
                            <td><?= $model->sdedFld; ?></td>
                            <td><?= $model->payField0->fldName; ?></td>
                            <td><?= date("d/m/Y", strtotime($model->sdedStart)); ?></td>
                            <td><?= date("d/m/Y", strtotime($model->sdedEnd)); ?></td>
                            <td><?= $model->sdedAmt; ?></td>
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
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            },
            columnDefs: [{
                    targets: '_all',
                    className: 'text-left'
                },
                {
                    targets: [0],
                    className: 'text-center'
                }
            ]
        });
    });
</script>