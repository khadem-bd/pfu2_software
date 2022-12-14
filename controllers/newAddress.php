<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $source = sterilizeValue($_POST['sourcing']);
    $address = sterilizeValue($_POST['address']);
    $counrtryOfOrigin = sterilizeValue($_POST['country_of_origin']);
    $weightCharge = sterilizeValue($_POST['weight_charge']);
    

   

    if(empty($source) || empty($address) || empty($counrtryOfOrigin) || empty($weightCharge)){
        echo "Please fill up all the input fields";
    }else{
        $source = dataEncrypt($source);
        $address = dataEncrypt($address);
        $counrtryOfOrigin = dataEncrypt($counrtryOfOrigin);
        $weightCharge = dataEncrypt($weightCharge);
        
        
        
        if(checkDataExistance("address_beneficiary", array("sourcing","address", "country_of_origin"), array($source,$address,$counrtryOfOrigin))){
            echo "This address already exists";
        }else{
            if(insert("address_beneficiary", array("sourcing","address","country_of_origin", "weight_charge"), array($source,$address,$counrtryOfOrigin,$weightCharge))){
                echo "New address added successfully";
            }
        }
    }
?>