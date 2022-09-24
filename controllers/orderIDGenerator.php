<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $query = "SELECT order_serial_no FROM order_serial ORDER BY id DESC LIMIT 1";
    $result  = $conn->query($query);

    if(mysqli_num_rows($result) > 0){
        $row = $result->fetch_assoc();
        $serial = $row['order_serial_no'] + 1;
    }else{
        $serial= 1;   
    }

    $randomNumber = rand(1,99999);

    $serial = "#CUSORD" . "-" . $randomNumber . "-" . date("m");
    echo $serial;
?>