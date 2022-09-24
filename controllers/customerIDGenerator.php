<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $sql = "SELECT serial_no FROM id_serial ORDER BY id DESC LIMIT 1";
    $result  = $conn->query($sql);

    if(mysqli_num_rows($result) > 0){
        $row = $result->fetch_assoc();
        $serial = $row['serial_no'] + 1;
    }else{
        $serial = 1;   
    }

    
    $serial = "PFU2-" . $serial . "-" .  date("y");
    echo $serial;
?>