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
                    <th>Emp. EPF No</th>
                    <th>Emp. Name</th>
                    <th>SO Bank Ref.</th>
                    <th>SO Start</th>
                    <th>SO End</th>
                    <th>Amount (Rs.)</th>
                    <th>SO Bank</th>
                    <th>SO Account</th>
                    <th>SO Account Name</th>
                    <th>SO Loan</th>
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
                            <td><?= $model->sbnkRef; ?></td>
                            <td><?= date("d/m/Y", strtotime($model->sbnkStart)); ?></td>
                            <td><?= date("d/m/Y", strtotime($model->sbnkEnd)); ?></td>
                            <td><?= $model->sbnkAmt; ?></td>
                            <td><?= $model->sbnkBank; ?></td>
                            <td><?= $model->sbnkAcct; ?></td>
                            <td><?= $model->sbnkAName; ?></td>
                            <td><?= ($model->sbnkLoan == 1 ? 'Yes' : 'No'); ?></td>
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