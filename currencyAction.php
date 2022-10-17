<?php
include "controllers/coreFunctions/connect.php";
// include "modals/new-purchase.php";


$html = "";
$cardID = $_POST['card_id'];
$sql = "SELECT * FROM card_beneficairy WHERE id = '$cardID'";
$result = $conn->query($sql);
$html .='<option value="" disabled selected>Select Currency</option>';
while ($row = $result->fetch_assoc()) {
    $usd = "USD - ";
    $bgp = "GBP - ";
    $amount = " TK";
    $html = $html.'<option data-rate="'.$row["exchange_rateD"].'" value="USD'.$row["exchange_rateD"].'">'.$usd.$row["exchange_rateD"].$amount.'</option>'.
                  '<option data-rate="'.$row["exchange_rateP"].'" value="BGP'.$row["exchange_rateP"].'">'.$bgp.$row["exchange_rateP"].$amount.'</option>';
}
echo $html;
?>