<?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";

    $id = decrypt($_POST['key']);   
    
    if(delete("customers", "id", $id, "data", "", "")){
        header("location: customers.php");
    }
?>