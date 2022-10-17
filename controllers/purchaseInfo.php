<?php
include "coreFunctions/connect.php";
include "coreFunctions/coreFunction.php";

$id = sterilizeValue($_POST['id']);
$sql = "SELECT * FROM orders WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$arrayToSend = array('customer_id' => $row['customer_id'],
                     'total_price' => $row['total_price'],
                     'advance' => $row['advance']);
$purchaseData = json_encode($arrayToSend);
echo $purchaseData;
?>