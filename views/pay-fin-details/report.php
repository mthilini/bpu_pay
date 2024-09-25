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
                    <th>NIC</th>
                    <th>Title</th>
                    <th>Employee Name</th>
                    <th>EPF No</th>
                    <th>Medical Fund Contributor</th>
                    <th>Salary Bank Code</th>
                    <th>Bank Account No</th>
                    <th>Bank Account Name</th>
                    <th>Tax Consent</th>
                    <th>Applicable Tax Table</th>
                    <th>Bank Loan Amount</th>
                    <th>Bank Loan Release Date</th>
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
                            <td><?= $model->nic; ?></td>
                            <td><?= $model->title; ?></td>
                            <td><?= $model->surname; ?></td>
                            <td><?= $model->epfNo; ?></td>
                            <td><?= ($model->medicalFundContributor == 1 ? 'Yes' : 'No'); ?></td>
                            <td><?= $model->salaryBankCode; ?></td>
                            <td><?= $model->bankAccountNo; ?></td>
                            <td><?= $model->bankAccountName; ?></td>
                            <td><?= ($model->taxConsent == 1 ? 'Yes' : 'No'); ?></td>
                            <td><?= $model->applicableTaxTable; ?></td>
                            <td><?= $model->bankLoanAmount; ?></td>
                            <td><?= date("d/m/Y", strtotime($model->bankLoanReleaseDate)); ?></td>
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