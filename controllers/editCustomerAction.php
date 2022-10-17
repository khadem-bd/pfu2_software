<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $id = $_POST['id'];
    $customerId = sterilizeValue($_POST['customer_id']);
    $name = sterilizeValue($_POST['name']);
    $contactNo = sterilizeValue($_POST['contact_no']);
    $emailAddress = sterilizeValue($_POST['email_address']);
    $shippingAddress = sterilizeValue($_POST['shipping_address']);

    
    if(empty($name) || empty($contactNo) || empty($emailAddress) || empty($shippingAddress)){
        echo "Please fill up all the input fields";
    }else{
        $colNames = array("name", "contact_no", "email_address", "shipping_address");
        $colValues = array($name, $contactNo, $emailAddress, $shippingAddress,$id);
        if(update("customers", $colNames, $colValues, "id")){
            echo "Customer information updated successfully";
        }else{
            echo "Information update failed, try again";
        }
    }
?>