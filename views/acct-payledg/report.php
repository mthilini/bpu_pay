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
                    <th>Payment Date</th>
                    <th>Payment Voucher</th>
                    <th>Payment Sub</th>
                    <th>Ledger</th>
                    <th>Amount (Rs.)</th>
                    <th>Remarks</th>
                    <th>Cashbook</th>
                    <th>Department</th>
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
                            <td><?= $model->payDate ?></td>
                            <td><?= $model->payVch ?></td>
                            <td><?= $model->paySub ?></td>
                            <td><?= $model->payLedg ?></td>
                            <td><?= $model->payAmount ?></td>
                            <td><?= $model->payRmks ?></td>
                            <td><?= $model->payCashBk ?></td>
                            <td><?= $model->payDept ?></td>
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