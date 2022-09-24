<?php
include "controllers/coreFunctions/connect.php";
include "controllers/coreFunctions/coreFunction.php";
include "modals/new-purchase.php";


$html = "";
$orderid = $_POST['orderID'];
$sql = "SELECT * FROM ORDERS WHERE order_id = '$orderid'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $html = $html . "<tr>
        <td>" . $row['product_desc'] . "</td>
        <td><a href='" . $row['product_url'] . "'>" . $row['product_url'] . "</a></td>
        <td>" . $row['order_date'] . "</td>
        <td>" . $row['unit_price'] . "</td>
        <td>" . $row['qty'] . "</td>
        <td>" . $row['total_price'] . "</td>
        <td>" . $row['advance'] . "</td>
        <td>" . $row['remaining'] . "</td>
        <td>" . $row['status']. "</td>
        <td class='red-text text-center'><a class='triggerPurchaseForm' href='#newPurchase'><span class='icon-purchase icon'></span>Purchase</a></td>
        <td class='red-text text-center'><a href='javascript:void(0)'><span class='icon-close icon'></span>Cancel</a></td>
        <td class='text-center'>
        <a class='icons edit-icon'
        href='javascript:void(0)'>
        <span class='es-edit'></span>
        </a> 
    </tr>";
}
echo $html;
?>