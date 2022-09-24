<?php

include "coreFunctions/connect.php";
include "coreFunctions/coreFunction.php";

    //CUSTOMER DATABASE TABLE INFORMATION
    $customerId = $_POST['customer_id'];
    $customerName =$_POST['name'];
    $contactNo = $_POST['contact_no'];
    $emailAddress = $_POST['email_address'];
    $shippingAddress = $_POST['shipping_address'];

    //ORDER DATABASE TABLE INFORMATION
    $orderId = $_POST['order_id'];
    $productId = $_POST['product_id'];
    $productDesc = $_POST['product_desc'];
    $unitPrice = $_POST['unit_price'];
    $qty = $_POST['qty'];
    $totalPrice = $_POST['total_price'];
    $advance = $_POST['advance'];
    $remaining = $_POST['remaining'];
    $grandTotal = $_POST['grand_total'];
    $url = $_POST['product_url'];
    $orderDate = $_POST['order_date'];
    $countryOfOrigin = $_POST['country_of_origin'];
    //SERIAL NUMBER GENERATOR FOR CUSTOMER ID SERIAL TABLE 
    $sql = "SELECT serial_no FROM id_serial ORDER BY id DESC LIMIT 1";
        $result  = $conn->query($sql);

        if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_assoc();
            $serial = $row['serial_no'] + 1;
        }else{
            $serial = 1;   
        }

     //SERIAL NUMBER GENERATOR FOR PRODUCT ID SERIAL TABLE 
     $sql = "SELECT serial_no FROM product_serial ORDER BY id DESC LIMIT 1";
     $result  = $conn->query($sql);

     if(mysqli_num_rows($result) > 0){
         $row = $result->fetch_assoc();
         $productSerial = $row['serial_no'] + 1;
     }else{
         $productSerial = 1;   
     }
        
    //SERIAL NUMBER GENERATOR FOR ORDER ID SERIAL TABLE 
    $sql = "SELECT order_serial_no FROM order_serial ORDER BY id DESC LIMIT 1";
        $result  = $conn->query($sql);
    
    $customerExist = "SELECT * FROM CUSTOMERS WHERE contact_no = '$contactNo'";
        $customerExistResult = $conn->query($customerExist);

        if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_assoc();
            $order_serial = $row['order_serial_no'] + 1;
        }else{
            $order_serial = 1;   
        }

    //CHECKING WHETHER FILEDS ARE EMPTY OR NOT AND DATA INSERTION INTO DATABASE 
    if(empty($customerName) || empty($contactNo) || empty($emailAddress) || empty($shippingAddress) ||empty($productDesc) 
        ||empty($unitPrice) || empty($qty) || empty($totalPrice) || empty($advance) || empty($remaining) || empty($url) || empty($orderDate) 
        ||empty($countryOfOrigin)) {
        echo 'Please fill up all the fields';
    }else{
        $customerDetails = array('customer_id','name','contact_no','email_address','shipping_address');
        $customerValues = array($customerId,$customerName,$contactNo,$emailAddress,$shippingAddress);


        insert("id_serial", array("serial_no"), array($serial));
        insert("customers",$customerDetails,$customerValues);

        foreach($productDesc as $index => $desc){
            $multi_productDesc = $desc;
            $multi_unitPrice = $unitPrice[$index];
            $multi_qty = $qty[$index];
            $multi_totalPrice = $totalPrice[$index];
            $multi_advance = $advance[$index];
            $multi_remaining = $remaining[$index];
            $multi_url = $url[$index];
            $multi_orderDate = $orderDate[$index];
            $multi_countryOfOrigin = $countryOfOrigin[$index];

            $orderDetails = array('order_id','product_id','customer_id','product_desc','unit_price','qty','total_price','advance','remaining','grand_total','product_url', 'order_date','country_of_origin');
            $orderValues = array($orderId, $productId,$customerId,$multi_productDesc,$multi_unitPrice,$multi_qty,$multi_totalPrice,$multi_advance,$multi_remaining,$grandTotal,$multi_url,$multi_orderDate,$multi_countryOfOrigin);
            

            insert("order_serial", array("order_serial_no"), array($order_serial));
            insert("product_serial", array("serial_no"), array($productSerial));
            insert("orders",$orderDetails,$orderValues);
            
        }
        
        




        echo 'New order Created Successfully';    
    }
?>



 
