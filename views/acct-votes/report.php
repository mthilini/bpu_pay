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
                    <th>Programme Code</th>
                    <th>Project Code</th>
                    <th>Object Code</th>
                    <th>Vote Code</th>
                    <th>Vote Sub</th>
                    <th>Vote Vote</th>
                    <th>Vote Description</th>
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
                            <td><?= $model->progCode ?></td>
                            <td><?= $model->projCode ?></td>
                            <td><?= $model->objCode ?></td>
                            <td><?= $model->voteCode ?></td>
                            <td><?= $model->voteSub ?></td>
                            <td><?= $model->voteVote ?></td>
                            <td><?= $model->voteDesc ?></td>
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