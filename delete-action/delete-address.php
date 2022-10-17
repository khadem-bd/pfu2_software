<?php

include "controllers/coreFunctions/connect.php";
include "controllers/coreFunctions/coreFunction.php";
    if(isset($_GET['key'])){
        $id = dataDecrypt($_GET['key']);
        if(delete("address_beneficiary", "id", $id, "data", "", "")){
            header("location:addressBeneficiary.php");
        }
    }else{
        header("location:addressBeneficiary.php");
    }
?>