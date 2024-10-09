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
                    <th>Emp UPF No</th>
                    <th>Emp. Name</th>
                    <th>S_Tax Ref</th>
                    <th>S_Tax Field</th>
                    <th>Tax Field</th>
                    <th>S_Tax Start</th>
                    <th>S_Tax End</th>
                    <th>Tax Amount</th>
                    <th>Tax Income</th>
                    <th>S_Tax Money</th>
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
                            <td><?= $model->staxRef; ?></td>
                            <td><?= $model->staxFld; ?></td>
                            <td><?= $model->staxFld0->taxDesc; ?></td>
                            <td><?= date("d/m/Y", strtotime($model->staxStart)); ?></td>
                            <td><?= date("d/m/Y", strtotime($model->staxEnd)); ?></td>
                            <td><?= $model->staxAmt; ?></td>
                            <td><?= $model->staxIncome; ?></td>
                            <td><?= $model->staxMoney; ?></td>
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
                    targets: [0, 1, 6, 7],
                    className: 'text-center'
                },
                {
                    targets: [8, 9],
                    className: 'text-right'
                }
            ]
        });
    });
</script>