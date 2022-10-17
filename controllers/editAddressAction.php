<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $id = $_POST['id'];
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

        $colNames = array("sourcing", "address", "country_of_origin", "weight_charge");
        $colValues = array($source, $address, $counrtryOfOrigin, $weightCharge,$id);
        if(update("address_beneficiary", $colNames, $colValues, "id")){
            echo "Address information updated successfully";
        }else{
            echo "Information update failed, try again";
        }
    }
?>