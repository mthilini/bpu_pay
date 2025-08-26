<style>
    .emp-container {
        padding: 10px;
        margin-top: 10px;
    }

    h1 {
        text-align: center;
        font-size: 14px;
        /* margin-bottom: 0px; 
        margin-top: 0px; */
    }

    .fl-table {
        font-size: 12.5px;
        font-weight: normal;
        border: 1px solid black;
    }

    .fl-table,
    .fl-table th,
    .fl-table td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .fl-table td,
    .fl-table th {
        padding: 1px 5px 1px 5px;
    }

    .align-right {
        text-align: right !important;
    }

    .bt-none {
        border-top: none !important;
    }

    .bb-none {
        border-bottom: none !important;
    }

    .bl-none {
        border-left: none !important;
    }

    .br-none {
        border-right: none !important;
    }

    .details-header {
        padding-top: 3px !important;
        padding-bottom: 3px !important;
    }

    .details-footer {
        padding-left: 10px !important;
    }
    div.emp-container {
            page-break-after: always;
        }
</style>

<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0mm;
    }

    @media print {
        div.emp-container {
            page-break-after: always;
        }
    }
</style>

<?php
if ($empSummary != null) {
    $monthNum  = $request['month'];
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);

    foreach ($empSummary as $key => $emp) {
?>
        <div class="emp-container">
            <h1><u>Buddhist and Pali University - Pay Advice <?= ' ' . $dateObj->format('F') . ' ' . $request['year']; ?></u></h1>

            <table class="fl-table" style="margin-top: 15px; width: 100%; border: none;">
                <tbody>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none" width="15%"></td>
                        <td class="bb-none details-header" colspan="3"><?= $emp['empTitle'] . ' ' . $emp['empSurname'] . ', ' . $emp['empInitials'] . ' (EPF No. ' . $emp['empUPFNo'] . ')'; ?></td>
                        <td class="bb-none bt-none bl-none br-none" width="20%"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td class="bt-none details-header" colspan="3"><?= $emp['desigName']; ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">Basic Salary</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmA1'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Increments & Arrears</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmA2'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Arrears - Prv. Years</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmA3'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Research Allowance</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA4'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Other Allowances</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA5'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Cost of Living</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA6'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Dean/Head Allowance</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA7'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Monthly Comp. Allow.</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA8'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Addl. Monthly Allowance</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA9'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Academic Allowance</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA10'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Prop. Intr. Rcvd. Govt</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA11'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">10% Allowance</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA12'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none bb-none">Fuel & Vehicle Allowance</td>
                        <td class="align-right bt-none bb-none"><?= number_format($emp['iprmA13'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">Other Income</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmA14'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td width="6%" class="bb-none br-none">Less :</td>
                        <td class="bb-none bl-none">No Pay</td>
                        <td class="align-right bb-none "><?= number_format($emp['iprmNopay'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td class="bt-none br-none"></td>
                        <td class="bt-none bl-none">Over Payments</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmOPay'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2">TOTAL EPF</td>
                        <td class="align-right"><?= number_format($emp['iprmSubTot'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2">GROSS PAY</td>
                        <td class="align-right"><?= number_format($emp['iprmGross'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">EPF - 10%</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmD1'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Medical Fund (1%)</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD2'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Deduction</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD3'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Stamp Duty</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD4'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">Salary/Other Advance</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmD5'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">Festival Advance</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmD6'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Special Advance</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD7'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Provident Fund Loan</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD8'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Distress Loan</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD9'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">Distress Ln - Interest</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmD10'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">Bicycle Loan</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmD11'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Bicycle Ln - Interest</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD12'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Other Loans</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD13'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Union - JSS</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD14'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">Sub Warden Union</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmD15'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">Welfare Society</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmD16'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Academic Union</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD17'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Librarian Union</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD18'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Hostel Charges</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD19'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">Over Payments</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmD20'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">Union - Anthar</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmD21'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Water & Electricity</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD22'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Prepaid Other Income</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD23'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">PAYE Tax</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD24'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">SLNSS</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmD25'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">Bank Ln/Insure etc.</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmD26'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Spl Adv - Interest</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD27'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Tax - Other Income</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD28'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Telephone Charges</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmD29'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">Tax Adjustments</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmD30'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2">TOTAL DEDUCTIONS</td>
                        <td class="align-right"><?= number_format($emp['iprmTotDed'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">Bank</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmBalBank'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">Cash</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmBalCash'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">Bank Standing Order</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmBalBStd'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none">EPF 15%</td>
                        <td class="align-right bb-none"><?= number_format($emp['iprmUPF15'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bb-none bt-none">ETF 3%</td>
                        <td class="align-right bb-none bt-none"><?= number_format($emp['iprmETF3'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td colspan="2" class="bt-none">Medical 5%</td>
                        <td class="align-right bt-none"><?= number_format($emp['iprmUP8'], 2, '.', ','); ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none" colspan="5" style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none" width="15%"></td>
                        <td class="bb-none br-none details-footer" colspan="2" style="padding-top: 5px !important"><?= 'Receipt of Pay Slip ' . $dateObj->format('F') . ' ' . $request['year']; ?></td>
                        <td class="bb-none bl-none details-footer"></td>
                        <td class="bb-none bt-none bl-none br-none" width="20%"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td class="bt-none bb-none br-none details-footer" colspan="2"><?= $emp['empTitle'] . ' ' . $emp['empSurname'] . ', ' . $emp['empInitials'] . ' (EPF No. ' . $emp['empUPFNo'] . ')'; ?></td>
                        <td class="bt-none bb-none bl-none details-footer" style="text-align: center; width: 30%;">..........................................</td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                    <tr>
                        <td class="bb-none bt-none bl-none br-none"></td>
                        <td class="bt-none br-none details-footer" colspan="2"><?= 'Received Rs. ' . number_format($emp['iprmGross'], 2, '.', ',') . ' as Gross Pay due to me.'; ?></td>
                        <td class="bt-none bl-none details-footer" style="text-align: center; width: 30%; padding-bottom: 5px !important"><?= 'Signature & Date :'; ?></td>
                        <td class="bb-none bt-none bl-none br-none"></td>
                    </tr>
                </tbody>
            </table>

        </div>
<?php
    }
} ?>