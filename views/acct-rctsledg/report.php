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
                    <th>ID</th>
                    <th>Receipt Date</th>
                    <th>Receipt No</th>
                    <th>Receipt Sub</th>
                    <th>Ledger</th>
                    <th>Amount (Rs.)</th>
                    <th>Remarks</th>
                    <th>Cashbook</th>
                    <th>Deparment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($dataProvider != null) {
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                ?>
                        <tr>
                            <td class="dt-center"><?= $model->id ?></td>
                            <td><?= $model->rctDate ?></td>
                            <td><?= $model->rctNo ?></td>
                            <td><?= $model->rctSub ?></td>
                            <td><?= $model->rctLedger ?></td>
                            <td><?= $model->rctAmount ?></td>
                            <td><?= $model->rctRmks ?></td>
                            <td><?= $model->rctCashBk ?></td>
                            <td><?= $model->rctDept ?></td>
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