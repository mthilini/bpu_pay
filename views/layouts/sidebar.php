<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">

        <nav class="mt-2">
            <?php

            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Monthly Reports', 'header' => true],
                    ['label' => 'Final Summaries', 'header' => true],
                    ['label' => 'Reconciliations', 'header' => true],
                    [
                        'label' => 'University',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/university.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'University Reconciliations', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-ipr/university-recon-report']],
                        ]
                    ],
                    [
                        'label' => 'Program Project',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/project.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Program Project Reconciliations', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-ipr/ppr-recon-report']],
                        ]
                    ],
                    [
                        'label' => 'Individual Detail',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/individual.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Individual Detail Reconciliations', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-ipr/individual-detail-recon-report']],
                        ]
                    ],
                    [
                        'label' => '',
                        'template' => '<a class="nav-link">{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => '',
                        'template' => '<a class="nav-link">{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    ['label' => 'Annual Reports', 'header' => true],
                    [
                        'label' => 'Individual',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/indiv.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Individual Pay Records', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-iprmst/pay-indi-annual-report']],
                            ['label' => 'Emolument List - Individual', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-iprmst/emolu-indi-annual-report']],
                            ['label' => 'Deduction List - Individual', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-iprmst/deduct-indi-annual-report']],
                        ]
                    ],
                    [
                        'label' => 'Annual',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/indiv.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Annual Emolument Summary', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-iprmst/pay-indi-annual-report']],
                        ]
                    ],
                    [
                        'label' => '',
                        'template' => '<a class="nav-link">{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => '',
                        'template' => '<a class="nav-link">{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    ['label' => 'Payee Tax', 'header' => true],
                    [
                        'label' => '',
                        'template' => '<a href="{url}" class="nav-link">{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => '',
                        'template' => '<a class="nav-link">{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => 'Information',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/info-main.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'header' => true
                    ],
                    [
                        'label' => 'Basic Salary',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/salary.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        // 'items' => [
                        //     ['label' => 'Payments', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-paycash/report']],
                        //     ['label' => 'Receipts', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-rcts-cash/report']],
                        //     ['label' => 'Payments & Receipts', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-maincash/report']],
                        // ]
                    ],
                    [
                        'label' => 'Emoluments',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/emo.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Emolument List', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/emolunment-report']],
                        ]
                    ],
                    [
                        'label' => 'Deductions',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/tax-deduct.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Deduction List', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/deduction-report']],
                        ]
                    ],
                    [
                        'label' => 'Bank Standing Orders',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/order.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Bank Standing Order List', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/sbnk-report']],
                        ]
                    ],
                    [
                        'label' => 'Other Allowances',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/allowance.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'A5 List', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/sa5-report']],
                            ['label' => 'A13 List', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/sa13-report']],
                            ['label' => 'A14 List', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/sa14-report']],
                        ]
                    ],
                    [
                        'label' => 'Tax Deductions',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/tax1.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Tax Deduction List', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/tax-deduction-report']],
                        ]
                    ],
                    [
                        'label' => 'Loans',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/loan.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => 'Other Income Received',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/income.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => 'Temporary Employee Date',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/date.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => 'EPF and ETF Arreares',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/arrears.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => '......................................................................',
                        'template' => '<a class="nav-link">{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                    ],
                    [
                        'label' => 'Personal Information',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/personal-information.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Personal Information', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/employee-detail-report']],
                        ]
                    ],
                    [
                        'label' => 'All Personal Information (to Excel)',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/excel.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Generate Excel File', 'icon' => 'fas fa-file-excel', 'url' => ['/excel/personal-info-report']],
                        ]
                    ],
                    [
                        'label' => 'Employee (Dept. Wise)',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/connection.png" width="23" height="23" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        // 'items' => [
                        //     ['label' => 'Data Log', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-zlog/report']],
                        //     ['label' => 'User Log', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-zloguser/report']],
                        //     ['label' => 'Payments Log', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-payhdr/report']],
                        //     ['label' => 'Receipts Log', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-rctshdr/report']],
                        //     ['label' => 'Journals Log', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-jnlhdr/report']],
                        // ]
                    ],
                    [
                        'label' => 'Employee Details',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/emp-details.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        // 'items' => [
                        //     ['label' => 'Employee Detail', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/employee-detail-report']],
                        // ]
                    ],
                    [
                        'label' => 'Employee Remarks',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/remarks.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Employee Remark', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-payhd/employee-remark-report']],
                        ]
                    ],
                    [
                        'label' => 'Field Information',
                        'template' => '<a href="{url}" class="nav-link"><img src="../assets/sidebar/info.png" width="25" height="25" style="margin-right: 10px;" >{label} <span class="d-block font-weight-normal opacity-50"></span> </a>',
                        'items' => [
                            ['label' => 'Field Information List', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-fields/report']],
                        ]
                    ],
                ],
            ]);
            ?>
        </nav>

    </div>

</aside>