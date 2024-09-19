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
                    <th>Main Code</th>
                    <th>Main Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($dataProvider != null) {
                    $models = $dataProvider->getModels();
                    foreach ($models as $key => $model) {
                ?>
                        <tr>
                            <td class="dt-center"><?= $model->id; ?></td>
                            <td><?= $model->mainCode ?></td>
                            <td><?= $model->mainDesc ?></td>
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