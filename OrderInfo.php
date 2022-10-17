<?php
include "controllers/coreFunctions/connect.php";
include "controllers/coreFunctions/coreFunction.php";
include "modals/new-purchase.php";

$html = "";
$orderid = $_POST['orderID'];
$sql = "SELECT * FROM orders WHERE order_id = '$orderid'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    if($_COOKIE['usertype'] == "Super Admin"){
    
    $html = $html . "<tr>       
        <td>" . $row['product_desc'] . "</td>
        <td>" . $row['color'] . "</td>
        <td>" . $row['size'] . "</td>
        <td><a href='" . $row['product_url'] . "'>" . $row['product_url'] . "</a></td>
        <td>" . $row['country_of_origin'] . "</td>
        <td>" . $row['unit_price'] . "</td>
        <td>" . $row['qty'] . "</td>
        <td>" . $row['total_price'] . "</td>
        <td>" . $row['advance'] . "</td>
        <td>" . $row['remaining'] . "</td>
        <td>" . $row['status']. "</td> 
        <td class='red-text text-center'>
        <a class='triggerPurchaseForm' href='#newPurchase' data-orderInfo='" .$row['id'] . "'><span class='icon-purchase icon'></span>Purchase</a>
        <a href='javascript:void(0)'><span class='icon-close icon'></span>Cancel</a>
        </td>
        <td class='text-center'>
        <a class='icons edit-icon'
        href='javascript:void(0)'>
        <span class='es-edit'></span>
        </a> 
        </td>
    </tr>";
    }else{
        $html = $html . "<tr>       
        <td>" . $row['product_desc'] . "</td>
        <td>" . $row['color'] . "</td>
        <td>" . $row['size'] . "</td>
        <td><a href='" . $row['product_url'] . "'>" . $row['product_url'] . "</a></td>
        <td>" . $row['country_of_origin'] . "</td>
        <td>" . $row['unit_price'] . "</td>
        <td>" . $row['qty'] . "</td>
        <td>" . $row['total_price'] . "</td>
        <td>" . $row['advance'] . "</td>
        <td>" . $row['remaining'] . "</td>
        <td>" . $row['status']. "</td> 
        <td class='text-center'>
        <a class='icons edit-icon'
        href='javascript:void(0)'>
        <span class='es-edit'></span>
        </a> 
        </td>
    </tr>";

    }
}
echo $html;
?>
