<?php
include "controllers/coreFunctions/connect.php";
// include "modals/new-purchase.php";


$html = "";
$cardId = $_POST['cardID'];
$sql = "SELECT * FROM card_beneficairy WHERE id = '$cardId' ORDER BY exchange_rateD,exchange_rateP ";
$result = $conn->query($sql);
$html .='<option value="" disabled selected>Select Currency</option>';
while ($row = $result->fetch_assoc()) {
    $usd = "USD - ";
    $bgp = "BGP - ";
    $amount = " TK";
    $html = $html.'<option value="USD'.$row["id"].'">'.$usd.$row["exchange_rateD"].$amount.'</option>'.
     '<option value="BGP'.$row["id"].'">'.$bgp.$row["exchange_rateP"].$amount.'</option>';
}
echo $html;
?>