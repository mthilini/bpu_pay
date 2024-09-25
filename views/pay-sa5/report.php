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
                    <th>SA5 Ref</th>
                    <th>SA5 Field</th>
                    <th>SA5 Field Desc.</th>
                    <th>Sa5 Start</th>
                    <th>Sa5 End</th>
                    <th>SA5 Amount (Rs.)</th>
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
                            <td><?= $model->id; ?></td>
                            <td><?= $model->empUPFNo; ?></td>
                            <td><?= $model->sa5Ref; ?></td>
                            <td><?= $model->sa5Fld; ?></td>
                            <td><?= date("d/m/Y", strtotime($model->sa5Start)); ?></td>
                            <td><?= date("d/m/Y", strtotime($model->sa5End)); ?></td>
                            <td><?= $model->sa5Amt ?></td>
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