<?php
if (!empty($t10Format)) {
    $t10 = $t10Format[0];

    $ptTotNonMon = $t10['ptTotNonMon'];
    $ptTotGross = $t10['ptTotGross'];
    $ptTotOth = $t10['ptTotOth'];
    $ptTotLump = $t10['ptTotLump'];

    $ptTotDeductPAYE = $t10['ptTotDeductPAYE'];
    $ptTotPrvPAYE = $t10['ptTotPrvPAYE'];
    $ptTotAdjust = $t10['ptTotAdjustPAYE'];

    $ptD = $ptTotGross + $ptTotOth + $ptTotLump;
    $ptA = $ptD - $ptTotNonMon;
    $taxDed = $ptTotDeductPAYE + $ptTotPrvPAYE + $ptTotAdjust;

    if (isset($request['excel']) && $request['excel'] == true) {
        $file_name = "Tax T10 Form.xls";
        header("Content-Disposition: attachment; filename=\"$file_name\"");
        header("Content-Type: application/vnd.ms-excel");

?>
        <style>
            .square {
                height: 20px;
                width: 20px;
                border: 1px solid;
            }
        </style>

        <table>
            <tr>
                <td colspan="3">Prescribed under Section 87 of the Inland Revenue Act</td>
                <td colspan="3" style="text-align: center;">A.P.I.T. /T. 10 (new)</td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="6">SRI LANKA INLAND REVENUE</td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="6">Advance Personal Income Tax (APIT)</td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="6">CERTIFICATE OF INCOME TAX DEDUCTIONS</td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="4"><?= 'Year of Assessment : ' . $t10['ptFYear'] . '/' . $t10['ptTYear'] ?></td>
                <td></td>
                <td>Employer's TIN No : 409215203</td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td>Employment : </td>
                <td><input type="checkbox"></td>
                <td>Primary</td>
                <td><input type="checkbox"></td>
                <td>Secondary</td>
                <td>[ Tick the applicable employment ]</td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"><?= 'Full Name of Employee : ' . $t10['empTitle'] . ' ' . $t10['empNames'] . ' ' . $t10['empSurname']; ?></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="4"><?= "Serial Number of Employee 's Pay Sheet : " . $t10['empUPFNo']; ?></td>
                <td></td>
                <td><?= 'NIC Number : ' . $t10['empNIC']; ?></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"><?= 'Period of Service for which Remuneration was paid From : ' . (($t10['ptFMon'] < 10) ? '0' : '') . $t10['ptFMon'] . '/' . $t10['ptFYear'] . ' To : ' . (($t10['ptTMon'] < 10) ? '0' : '') . $t10['ptTMon'] . '/' . $t10['ptTYear']; ?></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"><?= 'Total value of cash benefits Liable for APIT (A) : LKR ' . number_format($ptA, 2, ".", ","); ?></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"><?= 'Total value of non-cash benefits Liable for APIT (B) : LKR ' . number_format($ptTotNonMon, 2, ".", ","); ?></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6">Tax - on - Tax benifit (C) : LKR - </td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"><?= 'Total Gross Remuneration Liable for APIT as per pay sheet (including Tax-on-tax) (D)=(A+B+C) : LKR ' . number_format($ptD, 2, ".", ","); ?></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6">Value of Benefits Exempted/ Excluded in calculating Tax (E) : LKR -</td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"><?= 'Total amount of tax deducted : LKR ' . number_format($taxDed, 2, ".", ","); ?></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"><?= 'Total amount remitted to the Inland Revenue Department : LKR ' . number_format($taxDed, 2, ".", ","); ?></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6">I certify that the above particulars are true and correct.</td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6">Name of the Employer : </td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6">Signature of the Employer : </td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6">Address : </td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="4">Date : </td>
                <td></td>
                <td>Frank : </td>
            </tr>
        </table>

    <?php } else { ?>

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title></title>

            <style type="text/css" media="print">
                @page {
                    size: auto;
                    margin: 0mm;
                }
            </style>
            <style class="shared-css" type="text/css">
                .t {
                    transform-origin: bottom left;
                    z-index: 2;
                    position: absolute;
                    white-space: pre;
                    overflow: visible;
                    line-height: 1.5;
                }

                .text-container {
                    white-space: pre;
                }

                @supports (-webkit-touch-callout: none) {
                    .text-container {
                        white-space: normal;
                    }
                }
            </style>
            <style type="text/css">
                body {
                    background-color: #444;
                    padding: 0 10px;
                    margin: 0;
                    min-width: fit-content;
                }

                .page-container {
                    margin: 10px auto;
                    width: fit-content;
                }

                .page {
                    overflow: hidden;
                    position: relative;
                    background-color: white;
                }

                .annotations-container {
                    position: absolute;
                    pointer-events: none;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    z-index: 3;
                }

                .annotations-container>div {
                    position: absolute;
                    pointer-events: auto;
                    -webkit-user-select: none;
                }

                .annotations-container>div:hover {
                    background-color: rgba(255, 255, 0, 0.25);
                    cursor: pointer;
                }

                .sv {
                    font-size: 14px;
                    font-family: sub_TimesNewRoman_lfr;
                    color: #000;
                }

                .si {
                    font-size: 15px;
                    font-family: sub_TimesNewRoman-Bold_lfb;
                    color: #000;
                }

                .sn {
                    font-size: 14px;
                    font-family: sub_TimesNewRoman-Bold_lfb;
                    color: #000;
                }

                .sh {
                    font-size: 17px;
                    font-family: sub_TimesNewRoman-Bold_lfb;
                    color: #000;
                }

                .s12 {
                    font-size: 12px;
                    font-family: TimesNewRoman_32;
                    color: #000;
                }

                .s11 {
                    font-size: 11px;
                    font-family: TimesNewRoman_32;
                    color: #000;
                }

                .square {
                    height: 20px;
                    width: 20px;
                    border: 1px solid;
                }
            </style>

        </head>

        <body>

            <div class="page-container">

                <div class="page" style="width: 909px; height: 1286px;">
                    <div class="text-container">
                        <span class="t s12" style="left:110px;bottom:1235px;letter-spacing:-0.13px;word-spacing:0.15px;">Prescribed under Section 87 of the Inland Revenue Act</span>
                        <span class="t s11" style="left:680px;bottom:1235px;letter-spacing:-0.13px;word-spacing:0.15px;">A.P.I.T. /T. 10 (new)</span>

                        <b class="t si" style="left:348px;bottom:1180px;letter-spacing:0.15px;word-spacing:0.02px;">SRI LANKA INLAND REVENUE </b>
                        <b class="t sn" style="left:352px;bottom:1150px;letter-spacing:-0.15px;word-spacing:0.07px;">Advance Personal Income Tax </b>
                        <b class="t sn" style="left:532px;bottom:1150px;letter-spacing:-0.11px;">(APIT) </b>
                        <b class="t sh" style="left:280px;bottom:1115px;letter-spacing:-0.13px;word-spacing:0.04px;">CERTIFICATE OF INCOME TAX DEDUCTIONS </b>

                        <span class="t sv" style="left:110px;bottom:1040px;letter-spacing:-0.13px;word-spacing:0.15px;">Year of Assessment : </span>
                        <span class="t sv" style="left:245px;bottom:1040px;letter-spacing:-0.07px;word-spacing:-0.07px;"><?= $t10['ptFYear'] . '/' . $t10['ptTYear'] ?></span>
                        <span class="t s12" style="left:233px;bottom:1036px;letter-spacing:-0.07px;word-spacing:-0.07px;">........................................................</span>
                        <span class="t s11" style="left:495px;bottom:1040px;letter-spacing:-0.14px;word-spacing:0.12px;">Employer’s TIN No : </span>
                        <span class="t sv" style="left:610px;bottom:1040px;letter-spacing:-0.07px;word-spacing:-0.07px">409215203</span>
                        <span class="t s12" style="left:595px;bottom:1036px;letter-spacing:-0.07px;word-spacing:-0.07px">................................................</span>

                        <span class="t sv" style="left:110px;bottom:985px;letter-spacing:-0.15px;">Employment : </span>
                        <span class="t s12" style="left:210px;bottom:948px;letter-spacing:-0.09px;">
                            <div class="square"></div>
                        </span>
                        <span class="t sv" style="left:240px;bottom:985px;letter-spacing:-0.09px;">Primary </span>
                        <span class="t s12" style="left:320px;bottom:948px;letter-spacing:-0.1px;">
                            <div class="square"></div>
                        </span>
                        <span class="t sv" style="left:350px;bottom:985px;letter-spacing:-0.1px;">Secondary </span>
                        <span class="t sv" style="left:495px;bottom:985px;letter-spacing:-0.11px;word-spacing:0.03px;">[ Tick the applicable employment ]</span>

                        <span class="t sv" style="left:110px;bottom:925px;letter-spacing:-0.13px;word-spacing:0.05px;">Full Name of Employee : </span>
                        <span class="t sv" style="left:265px;bottom:925px;"><?= $t10['empTitle'] . ' ' . $t10['empNames'] . ' ' . $t10['empSurname']; ?></span>
                        <span class="t s12" style="left:260px;bottom:919px;">.............................................................................................................................................................................</span>

                        <span class="t sv" style="left:110px;bottom:865px;letter-spacing:-0.12px;word-spacing:0.05px;">Serial Number of Employee ’s Pay Sheet : </span>
                        <span class="t sv" style="left:350px;bottom:865px;letter-spacing:0.06px;"><?= $t10['empUPFNo']; ?></span>
                        <span class="t s12" style="left:345px;bottom:860px;letter-spacing:0.06px;">..........................................</span>
                        <span class="t sv" style="left:540px;bottom:865px;letter-spacing:-0.15px;word-spacing:0.02px;">NIC Number : </span>
                        <span class="t sv" style="left:630px;bottom:865px;letter-spacing:0.06px;"><?= $t10['empNIC']; ?></span>
                        <span class="t s12" style="left:625px;bottom:860px;letter-spacing:0.06px;">....................................................</span>

                        <span class="t sv" style="left:110px;bottom:810px;letter-spacing:-0.11px;word-spacing:0.04px;">Period of Service for which Remuneration was paid </span>
                        <span class="t sv" style="left:415px;bottom:810px;letter-spacing:0.11px;">From : </span>
                        <span class="t sv" style="left:463px;bottom:810px;letter-spacing:0.05px;"><?= (($t10['ptFMon'] < 10) ? '0' : '') . $t10['ptFMon'] . '/' . $t10['ptFYear']; ?></span>
                        <span class="t s12" style="left:465px;bottom:805px;letter-spacing:0.05px;">...........................</span>
                        <span class="t sv" style="left:570px;bottom:810px;letter-spacing:0.12px;">To : </span>
                        <span class="t sv" style="left:605px;bottom:810px;letter-spacing:0.06px;"><?= (($t10['ptTMon'] < 10) ? '0' : '') . $t10['ptTMon'] . '/' . $t10['ptTYear']; ?></span>
                        <span class="t s12" style="left:597px;bottom:805px;letter-spacing:0.06px;">...........................</span>

                        <span class="t sv" style="left:110px;bottom:755px;letter-spacing:-0.12px;word-spacing:0.05px;">Total value of cash benefits Liable for APIT (A) : </span>
                        <span class="t sv" style="left:400px;bottom:755px;letter-spacing:0.11px;">LKR </span>
                        <span class="t sv" style="left:440px;bottom:755px;letter-spacing:0.06px;"><?= number_format($ptA, 2, ".", ","); ?></span>
                        <span class="t s12" style="left:390px;bottom:749px;letter-spacing:0.06px;">................................................</span>

                        <span class="t sv" style="left:110px;bottom:700px;letter-spacing:-0.12px;word-spacing:0.05px;">Total value of non-cash benefits Liable for APIT (B) : </span>
                        <span class="t sv" style="left:415px;bottom:700px;letter-spacing:0.11px;">LKR </span>
                        <span class="t sv" style="left:457px;bottom:700px;letter-spacing:0.06px;"><?= number_format($ptTotNonMon, 2, ".", ","); ?></span>
                        <span class="t s12" style="left:410px;bottom:695px;letter-spacing:0.06px;">..............................................................</span>

                        <span class="t sv" style="left:110px;bottom:645px;letter-spacing:-0.12px;word-spacing:0.05px;">Tax - on - Tax benifit (C) : </span>
                        <span class="t sv" style="left:280px;bottom:645px;letter-spacing:0.11px;">LKR </span>
                        <span class="t sv" style="left:362px;bottom:645px;letter-spacing:0.06px;">-</span>
                        <span class="t s12" style="left:265px;bottom:640px;letter-spacing:0.06px;">.................................................... </span>

                        <span class="t sv" style="left:110px;bottom:595px;letter-spacing:-0.12px;word-spacing:0.05px;">Total Gross Remuneration Liable for APIT as per pay sheet (including Tax-on-tax) (D)=(A+B+C) : </span>
                        <span class="t sv" style="left:665px;bottom:595px;letter-spacing:0.11px;">LKR </span>
                        <span class="t sv" style="left:703px;bottom:595px;letter-spacing:0.06px;"><?= number_format($ptD, 2, ".", ","); ?></span>
                        <span class="t s12" style="left:663px;bottom:590px;letter-spacing:0.06px;">...........................................................</span>

                        <span class="t sv" style="left:110px;bottom:545px;letter-spacing:-0.12px;word-spacing:0.05px;">Value of Benefits Exempted/ Excluded in calculating Tax (E) : </span>
                        <span class="t sv" style="left:465px;bottom:545px;letter-spacing:0.11px;">LKR </span>
                        <span class="t sv" style="left:562px;bottom:545px;letter-spacing:0.06px;">-</span>
                        <span class="t s12" style="left:458px;bottom:541px;letter-spacing:0.06px;">...................................................... </span>

                        <span class="t sv" style="left:110px;bottom:495px;letter-spacing:-0.12px;word-spacing:0.05px;">Total amount of tax deducted : </span>
                        <span class="t sv" style="left:290px;bottom:495px;letter-spacing:0.11px;">LKR </span>
                        <span class="t sv" style="left:330px;bottom:495px;letter-spacing:0.06px;"><?= number_format($taxDed, 2, ".", ","); ?></span>
                        <span class="t s12" style="left:283px;bottom:490px;letter-spacing:0.06px;">..........................................</span>

                        <span class="t sv" style="left:110px;bottom:450px;letter-spacing:-0.12px;word-spacing:0.05px;">Total amount remitted to the Inland Revenue Department : </span>
                        <span class="t sv" style="left:450px;bottom:450px;letter-spacing:0.11px;">LKR </span>
                        <span class="t sv" style="left:490px;bottom:450px;letter-spacing:0.06px;"><?= number_format($taxDed, 2, ".", ","); ?></span>
                        <span class="t s12" style="left:440px;bottom:445px;letter-spacing:0.06px;">.....................................................</span>

                        <span class="t sv" style="left:110px;bottom:390px;letter-spacing:-0.12px;word-spacing:0.05px;">I certify that the above particulars are true and correct.</span>
                        <span class="t sv" style="left:110px;bottom:345px;letter-spacing:-0.12px;word-spacing:0.05px;">Name of the Employer : </span>
                        <span class="t sv" style="left:255px;bottom:345px;letter-spacing:0.06px;">The Buddhist and Pali University of Sri Lanka</span>
                        <span class="t s12" style="left:250px;bottom:340px;letter-spacing:0.06px;">........................................................................................................................................................................................ </span>
                        <span class="t sv" style="left:110px;bottom:285px;letter-spacing:-0.12px;word-spacing:0.05px;">Signature of the Employer : </span>
                        <span class="t s12" style="left:270px;bottom:285px;letter-spacing:0.06px;">................................................................................................................................................................................ </span>
                        <span class="t sv" style="left:110px;bottom:240px;letter-spacing:-0.12px;word-spacing:0.05px;">Address : </span>
                        <span class="t sv" style="left:175px;bottom:240px;letter-spacing:0.06px;">No 37, Moragahahena Road, Pitipana Town, Homagama</span>
                        <span class="t s12" style="left:170px;bottom:235px;letter-spacing:0.06px;">.................................................................................................................................................................................................................. </span>

                        <span class="t sv" style="left:110px;bottom:160px;letter-spacing:0.11px;">Date : </span>
                        <span class="t s12" style="left:150px;bottom:160px;letter-spacing:0.05px;">.....................................................</span>
                        <span class="t sv" style="left:570px;bottom:160px;letter-spacing:0.12px;">Frank : </span>
                        <span class="t s12" style="left:620px;bottom:160px;letter-spacing:0.06px;">................................................................</span>

                    </div>

                </div>

            </div>
        </body>

        </html>

<?php
    }
}
?>