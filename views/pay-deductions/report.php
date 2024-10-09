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
                    <th>Emp. UPF No</th>
                    <th>Emp. Name</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Deduction (Rs.)</th>
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
                            <td><?= $model->dedMon; ?></td>
                            <td><?= $model->dedYear; ?></td>
                            <td><?= $model->dedDeduction; ?></td>
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