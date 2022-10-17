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
    $productDesc = $_POST['product_desc'];
    $color = $_POST['color'];
    $size = $_POST['size'];
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
    function customerSerialEntry(){
        include "coreFunctions/connect.php";
        $sql = "SELECT serial_no FROM id_serial ORDER BY id DESC LIMIT 1";
        $result  = $conn->query($sql);

        if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_assoc();
            $serial = $row['serial_no'] + 1;
        }else{
            $serial = 1;   
        }
        insert("id_serial", array("serial_no"), array($serial));
    }

        
    //SERIAL NUMBER GENERATOR FOR ORDER ID SERIAL TABLE 
    function orderSerialEntry(){
        include "coreFunctions/connect.php";
        $sql = "SELECT order_serial_no FROM order_serial ORDER BY id DESC LIMIT 1";
        $result  = $conn->query($sql);
    
        if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_assoc();
            $order_serial = $row['order_serial_no'] + 1;
        }else{
            $order_serial = 1;   
        }
        insert("order_serial", array("order_serial_no"), array($order_serial));
    }


    //CHECKING WHETHER FILEDS ARE EMPTY OR NOT AND DATA INSERTION INTO DATABASE 
    if(empty($customerName) || empty($contactNo) || empty($emailAddress) || empty($shippingAddress) ||empty($productDesc) || empty($color) || empty($size) 
        ||empty($unitPrice) || empty($qty) || empty($totalPrice) || empty($advance) || empty($remaining) || empty($url) || empty($orderDate) 
        ||empty($countryOfOrigin)) {
        echo 'Please fill up all the fields';
    }else{
        $customerDetails = array('customer_id','name','contact_no','email_address','shipping_address');
        $customerValues = array($customerId,$customerName,$contactNo,$emailAddress,$shippingAddress);
        

        
        $error = "";
        foreach($productDesc as $index => $desc){
            $multi_productDesc = $desc;
            $multi_color = $color[$index];
            $multi_size = $size[$index];
            $multi_unitPrice = $unitPrice[$index];
            $multi_qty = $qty[$index];
            $multi_totalPrice = $totalPrice[$index];
            $multi_advance = $advance[$index];
            $multi_remaining = $remaining[$index];
            $multi_url = $url[$index];
            $multi_orderDate = $orderDate[$index];
            $multi_countryOfOrigin = $countryOfOrigin[$index];

            if(empty($multi_productDesc) || empty($multi_color) || empty($multi_size) || empty($multi_unitPrice) || empty($multi_qty) || empty($multi_totalPrice) || empty($multi_advance) || empty($multi_remaining) || empty($multi_url) || empty($multi_orderDate) || empty($multi_countryOfOrigin)){
                $error = "Please fill up all the required fields";
                break;
            }
            
        }

        if($error == ""){
            foreach($productDesc as $index => $desc){
                $multi_productDesc = $desc;
                $multi_color = $color[$index];
                $multi_size = $size[$index];
                $multi_unitPrice = $unitPrice[$index];
                $multi_qty = $qty[$index];
                $multi_totalPrice = $totalPrice[$index];
                $multi_advance = $advance[$index];
                $multi_remaining = $remaining[$index];
                $multi_url = $url[$index];
                $multi_orderDate = $orderDate[$index];
                $multi_countryOfOrigin = $countryOfOrigin[$index];
    
    
                $orderDetails = array('order_id','customer_id','product_desc','color','size','unit_price','qty','total_price','advance','remaining','grand_total','product_url', 'order_date','country_of_origin');
                $orderValues = array($orderId,$customerId,$multi_productDesc,$multi_color,$multi_size,$multi_unitPrice,$multi_qty,$multi_totalPrice,$multi_advance,$multi_remaining,$grandTotal,$multi_url,$multi_orderDate,$multi_countryOfOrigin);
                
              
                if(insert("orders",$orderDetails,$orderValues)){
                    orderSerialEntry();
                }
    
            }
            if(!checkDataExistance("customers",array('customer_id','name','contact_no','email_address','shipping_address'),array($customerId,$customerName,$contactNo,$emailAddress,$shippingAddress))){
                if(insert("customers",$customerDetails,$customerValues)){
                    customerSerialEntry();
                }
            }
            echo 'New order Created Successfully'; 
        }else{
            echo $error;
        }
    }
?>




 
