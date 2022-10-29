<?php
include "controllers/coreFunctions/connect.php";
include "controllers/coreFunctions/coreFunction.php";
include "modals/new-purchase.php";

$html = "";
$orderid = $_POST['orderID'];
$sql = "SELECT * FROM orders WHERE order_id = '$orderid'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
    if($_COOKIE['usertype'] == "Super Admin"){
        if($row['status'] == 'purchased'){
        $html = $html . "<tr>       
        <td class='text-center'>" . $row['product_desc'] . "</td>
        <td class='text-center'>" . $row['color'] . "</td>
        <td class='text-center'>" . $row['size'] . "</td>
        <td class='text-center'><a href='" . $row['product_url'] . "' target='_blank'>"."Click here"."</a></td>
        <td class='text-center'>" . $row['country_of_origin'] . "</td>
        <td class='text-center'>" . $row['unit_price'] . "</td>
        <td class='text-center'>" . $row['qty'] . "</td>
        <td class='text-center'>" . $row['total_price'] . "</td>
        <td class='text-center'>" . $row['advance'] . "</td>
        <td class='text-center'>" . $row['remaining'] . "</td>
        <td class='text-center'>" . $row['status']. "</td> 
        <td class='red-text text-center'> 
        <a href='javascript:void(0)'><span class='icon-close icon'></span></a>
        </td>

        <td class='text-center'>
        <span>Non Editable</span>
        </td>
    </tr>";
        }else{
        $html = $html ."<tr>       
        <td class='text-center'>" . $row['product_desc'] . "</td>
        <td class='text-center'>" . $row['color'] . "</td>
        <td class='text-center'>" . $row['size'] . "</td>
        <td class='text-center'><a href='" . $row['product_url'] . "' target='_blank'>"."Click here"."</a></td>
        <td class='text-center'>" . $row['country_of_origin'] . "</td>
        <td class='text-center'>" . $row['unit_price'] . "</td>
        <td class='text-center'>" . $row['qty'] . "</td>
        <td class='text-center'>" . $row['total_price'] . "</td>
        <td class='text-center'>" . $row['advance'] . "</td>
        <td class='text-center'>" . $row['remaining'] . "</td>
        <td class='text-center'>" . $row['status']. "</td> 
        <td class='red-text text-center'> 
        <a class='triggerPurchaseForm' href='#newPurchase' data-orderInfo='" .$row['id'] . "'><span class='icon-purchase icon'></span></a>
        <a href='javascript:void(0)'><span class='icon-close icon'></span></a>
        </td>
        <td class='text-center'>
        <a class='icons edit-icon'
        href='javascript:void(0)'>
        <span class='es-edit'>Edit</span>
        </a> 
        </td>
    </tr>";
        }
    }else{
        if($row['status'] == 'pending'){
        $html = $html . "<tr>       
        <td class='text-center'>" . $row['product_desc'] . "</td>
        <td class='text-center'>" . $row['color'] . "</td>
        <td class='text-center'>" . $row['size'] . "</td>
        <td class='text-center'><a href='" . $row['product_url'] . "' target='_blank'>"."Click here"."</a></td>
        <td class='text-center'>" . $row['country_of_origin'] . "</td>
        <td class='text-center'>" . $row['unit_price'] . "</td>
        <td class='text-center'>" . $row['qty'] . "</td>
        <td class='text-center'>" . $row['total_price'] . "</td>
        <td class='text-center'>" . $row['advance'] . "</td>
        <td class='text-center'>" . $row['remaining'] . "</td>
        <td class='text-center'>" . $row['status']. "</td> 
        <td class='text-center'>
        <a class='icons edit-icon'
        href='javascript:void(0)'>
        <span class='es-edit'>Edit</span>
        </a> 
        </td>
    </tr>";
        }else{
        $html = $html . "<tr>       
        <td class='text-center'>" . $row['product_desc'] . "</td>
        <td class='text-center'>" . $row['color'] . "</td>
        <td class='text-center'>" . $row['size'] . "</td>
        <td class='text-center'><a href='" . $row['product_url'] . "' target='_blank'>"."Click here"."</a></td>
        <td class='text-center'>" . $row['country_of_origin'] . "</td>
        <td class='text-center'>" . $row['unit_price'] . "</td>
        <td class='text-center'>" . $row['qty'] . "</td>
        <td class='text-center'>" . $row['total_price'] . "</td>
        <td class='text-center'>" . $row['advance'] . "</td>
        <td class='text-center'>" . $row['remaining'] . "</td>
        <td class='text-center'>" . $row['status']. "</td> 
        <td class='text-center'>
        <span>Non Ediable</span> 
        </td>
    </tr>";
        }
    }
}
echo $html;
?>
