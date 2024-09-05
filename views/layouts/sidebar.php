<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    // [
                    //     'label' => 'Starter Pages',
                    //     'icon' => 'tachometer-alt',
                    //     'badge' => '<span class="right badge badge-info">2</span>',
                    //     'items' => [
                    //         ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                    //         ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                    //     ]
                    // ],
                    // ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    // ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'MENU', 'header' => true],
                    [
                        'label' => 'Cash Book',
                        'icon' => 'fas fa-book',
                        'items' => [
                            ['label' => 'Cashbook Details', 'icon' => 'fas fa-book-open', 'url' => ['acct-bankaccts/index']],
                            ['label' => 'Payments', 'icon' => 'fa-regular fa-credit-card', 'url' => ['cash-book/payment']],
                            ['label' => 'Receipts', 'icon' => 'fa-regular fa-file-invoice-dollar', 'url' => ['cash-book/receipt']],
                            ['label' => 'Journal', 'icon' => 'fa-regular fa-file-invoice-dollar', 'url' => ['cash-book/journal']]
                        ]
                    ],
                    [
                        'label' => 'General Ledger',
                        'icon' => 'fas fa-file-alt',
                        'items' => [
                            ['label' => 'Main Ledgers', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-ledgmain']],
                            ['label' => 'Sub Ledgers', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-ledgsub']],
                            ['label' => 'Account Ledgers', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-ledger']],
                            ['label' => 'Account Program', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-prog']],
                            ['label' => 'Account Project', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-proj']],
                            ['label' => 'Account Votes', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-votes']],
                            ['label' => 'Payment Ledger', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-payledg']],
                            ['label' => 'Receipt Ledger', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-rctsledg']],
                        ]
                    ],
                    [
                        'label' => 'Payroll',
                        'icon' => 'fas fa-cash-register',
                        'items' => [
                            ['label' => 'Employee Details', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-fin-details']],
                            ['label' => 'Standing Order Allowances', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-seml']],
                            ['label' => 'SA-5 Allowances', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-ledger']],
                            ['label' => 'Standing Order Deductions', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-prog']],
                            ['label' => 'Banks', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-prog']],
                            ['label' => 'Fixed Salary Fields', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-prog']],
                            ['label' => 'Bank Standing Orders', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-prog']],
                            ['label' => 'Pay Income', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-prog']],
                        ]
                    ],
                    [
                        'label' => 'Fund Management',
                        'icon' => 'fas fa-donate',
                        'items' => [
                            ['label' => 'Fund Types', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-fm-funds']],
                            ['label' => 'Opening EPF Balances (2022)', 'icon' => 'fas fa-caret-right', 'url' => ['/acct-fm-epf-contr']],
                        ]
                    ],
                    [
                        'label' => 'System Data',
                        'icon' => 'fas fa-server',
                        'items' => [
                            ['label' => 'Users', 'icon' => 'fas fa-caret-right', 'url' => ['/tbl-user/index']],
                            ['label' => 'Pay Fields', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-fields/index']],
                            ['label' => 'Pay A5 Types', 'icon' => 'fas fa-caret-right', 'url' => ['/pay-a5type/index']],
                        ]
                    ],
                    // ['label' => 'LABELS', 'header' => true],
                    // ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    // ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    // ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>