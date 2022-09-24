<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $address = sterilizeValue($_POST['address']);
    $counrtryOfOrigin = sterilizeValue($_POST['country_of_origin']);
    $weight = sterilizeValue($_POST['weight']);
    $weightCharge = sterilizeValue($_POST['weight_charge']);
    

   

    if(empty($address) || empty($counrtryOfOrigin)){
        echo "Please fill up all the input fields";
    }else{
        $address = dataEncrypt($address);
        $counrtryOfOrigin = dataEncrypt($counrtryOfOrigin);
        
        
        if(checkDataExistance("address_beneficiary", array("address", "country_of_origin"), array($address,$counrtryOfOrigin))){
            echo "This address already exists";
        }else{
            if(insert("address_beneficiary", array("address","country_of_origin", "weight", "weight_charge"), array($address,$counrtryOfOrigin,$weight,$weightCharge))){
                echo "New address added successfully";
            }
        }
    }
?>