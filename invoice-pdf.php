<?php
    ob_start();
    require 'vendor-plugins/dompdf-plugin/autoload.php';
    use Dompdf\Dompdf;
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";

    $html = "";
    $html = $html . '<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
<style type="text/css">
body{
    font-family: "Montserrat", sans-serif;
    color:#000;
}
table{
    font-family: "Montserrat", sans-serif;
    border-collapse:collapse;
    width:100%;
}
table tr td{
    border:none;
    font-weight:600;
    font-size:12px;
}
.item-table tr:nth-child(odd){
    background-color: #F3F3F3;
}
.item-table tr th{
    text-align:center;
    color:#fff;
    padding:10px; 
    background-color:#D1202B; 
    font-size:14px; 
    font-weight:600;
}
.item-table tr td{
    padding:10px;
    font-size:12px;
    font-weight:600;
    text-align:center;
}
.text-right{
    text-align:right !important;
}

.text-left{
    text-align:left !important;
}
footer {
    position: fixed; 
    bottom: -100px; 
    left: 0cm; 
    right: 0cm;
    height: 100px;
    border-bottom:none !important;
    border-top:3px solid #D1202B;
    padding-top:5px;
}
@page {
    margin-top: 100px;
    margin-bottom: 100px;
}
</style>
</head>
<body>
<footer>
    <table align="center" style="width:700px;">
        <tr>
            <td style="color:#707071; font-size:12px;">
                House 33, Road 01, Block A, Niketan Society,  <br>
                Gulshan - 1, Dhaka 1212
            </td>
            <td style="color:#707071; font-size:12px; text-align:right;">
                Phone No: 09678-11-44-11, 01613-333-011 <br>
                Email: shop.pfu2@gmail.com   |   Website: www.pfu2.com
            </td>
        </tr>
    </table>
</footer>
<main>
    <table align="center" style="width:700px;">
        <tr>
            <td style="width:70%;"><img style="width:198px;" src="images/logo.png"></td>
            <td style="width"="30%">
                <table>
                    <tr>
                        <td style="font-size:12px; font-weight:800;">Invoice #</td>
                        <td style="font-size:12px; text-align:right; font-weight:600;">12345-01</td>
                    </tr>
                    <tr>
                        <td style="font-size:12px; font-weight:800;">Date</td>
                        <td style="font-size:12px; text-align:right; font-weight:600;">29/10/2022</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:20px 0px; font-size:0px;">
                <img style="width:100%;" src="images/invoice-bar.svg">
            </td>
        </tr>
        <tr>
            <td style="width:70%; padding-right:130px; vertical-align:top;">
                <h3 style="margin:0; font-size:16px;">Invoice to:</h3>
                <h2 style="margin:0; font-size:20px;">Monir Khan</h2>
                <p style="margin:5px 0px 0px 0px; font-size:14px; color:#686868;">
                    52/6/A, Ahmednagar,  Paikpara,
                    (opposite to chalantike housing gate - 1)
                    Mirpur -1, Dhaka - 1216.
                </p>
            </td>
            <td style="width:30%; vertical-align:bottom;">
                <table>
                    <tr>
                        <td style="font-size:12px; font-weight:800;">Order #:</td>
                        <td style="font-size:12px; text-align:right; font-weight:600;">123456</td>
                    </tr>
                    <tr>
                        <td style="font-size:12px; font-weight:800;">Customer ID</td>
                        <td style="font-size:12px; text-align:right; font-weight:600;">123456798</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top:20px; padding-bottom:30px;">
                <table class="item-table">
                    <tr>
                        <th>SL.</th>
                        <th class="text-left">Item Description</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th class="text-right">Advance</th>
                        <th class="text-right">Outstanding</th>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td class="text-left">Amazon Echo Dot Amazon Echo Dot Amazon Echo Dot Amazon Echo Dot Amazon Echo Dot</td>
                        <td>5000</td>
                        <td>01</td>
                        <td class="text-right">2500</td>
                        <td class="text-right">2500</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td class="text-left">Amazon Echo Dot</td>
                        <td>5000</td>
                        <td>01</td>
                        <td class="text-right">2500</td>
                        <td class="text-right">2500</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td class="text-left">Amazon Echo Dot</td>
                        <td>5000</td>
                        <td>01</td>
                        <td class="text-right">2500</td>
                        <td class="text-right">2500</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td class="text-left">Amazon Echo Dot</td>
                        <td>5000</td>
                        <td>01</td>
                        <td class="text-right">2500</td>
                        <td class="text-right">2500</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td class="text-left">Amazon Echo Dot</td>
                        <td>5000</td>
                        <td>01</td>
                        <td class="text-right">2500</td>
                        <td class="text-right">2500</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td class="text-left">Amazon Echo Dot</td>
                        <td>5000</td>
                        <td>01</td>
                        <td class="text-right">2500</td>
                        <td class="text-right">2500</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td class="text-left">Amazon Echo Dot</td>
                        <td>5000</td>
                        <td>01</td>
                        <td class="text-right">2500</td>
                        <td class="text-right">2500</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td class="text-left">Amazon Echo Dot</td>
                        <td>5000</td>
                        <td>01</td>
                        <td class="text-right">2500</td>
                        <td class="text-right">2500</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="vertical-align:top; width:50%; padding-right:50px;">
                <table style="width:100%;">
                    <tr>
                        <td style="font-size:18px; padding:20px 0px;">Thank you for your order</td>
                    </tr>
                </table>
                <table style="width:100%;">
                    <tr>
                        <td colspan="2" style="font-size:20px; font-weight:800; padding-bottom:10px;">Payment Info:</td>
                    </tr>
                    <tr>
                        <td>Account #</td>
                        <td class="text-right">123456798123456</td>
                    </tr>
                    <tr>
                        <td>A/C Name</td>
                        <td class="text-right">PFU2</td>
                    </tr>
                    <tr>
                        <td>Bank Name</td>
                        <td class="text-right">The City Bank Ltd.</td>
                    </tr>
                    <tr>
                        <td>Bank Address</td>
                        <td class="text-right">Gulshan avenue Branch
                        Dhaka 1213</td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align:top; width:50%; padding-top: 25px;">
                <table style="width:100%;">
                    <tr>
                        <td style="padding:10px;">Total</td>
                        <td class="text-right" style="padding:10px;">Tk 20000 /=</td>
                    </tr>
                    <tr>
                        <td style="padding:10px;">Advance</td>
                        <td class="text-right" style="padding:10px;">Tk 10000 /=</td>
                    </tr>
                    <tr style="background-color:#E8E8E8;">
                        <td style="padding:10px;">Outstanding</td>
                        <td class="text-right" style="padding:10px 10px 0px 10px;;">Tk 10000 /=</td>
                    </tr>
                    <tr style="background-color:#E8E8E8;">
                        <td colspan="2" style="color:#D1202B; text-align:right; font-size:9px; padding:0px 10px 5px 10px;">+ Weight Charge *</td>
                    </tr>
                </table>
                <table style="width:100%;">
                    <tr style="background-color:#E8E8E8;">
                        <td colspan="3" style="color:#D1202B; text-align:right; font-size:9px; padding:0px 10px;">
                            * Weight charge to be calculated once product reaches Dhaka.
                        </td>
                    </tr>
                    <tr style="background-color:#E8E8E8;">
                        <td style="font-size:10px; text-align:right; padding:10px;">
                            USA <br>
                            170 Tk / 100 gm
                        </td>
                        <td style="font-size:10px; text-align:right; padding:10px;">
                            UK <br>
                            120 Tk / 100 gm
                        </td>
                        <td style="font-size:10px; text-align:right; padding:10px;">
                            India <br>
                            110 Tk / 100 gm
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</main>
    
</body>';
    
$html = $html . "</body> </html>";
// echo $html;
ob_clean();
ob_end_flush();
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("monthly-bill.pdf");    
?>