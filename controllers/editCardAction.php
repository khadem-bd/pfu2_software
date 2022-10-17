<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $id = $_POST['id'];
    $cardNumber = sterilizeValue($_POST['card_number']);
    $cardHolderName = sterilizeValue($_POST['card_holder_name']);
    $exchangeRateUSD = sterilizeValue($_POST['exchange_rateD']);
    $exchangeRateGBP = sterilizeValue($_POST['exchange_rateP']);
    $cardType = sterilizeValue($_POST['card_type']);
    
    if(empty($cardNumber) || empty($cardHolderName) || empty($exchangeRateUSD) || empty($exchangeRateGBP) || empty($cardType)){
        echo "Please fill up all the input fields";
    }else{
        $cardNumber = dataEncrypt($cardNumber);
        $cardHolderName = dataEncrypt($cardHolderName);
        // $exchangeRateUSD = dataEncrypt($exchangeRateUSD);
        // $exchangeRateGBP = encryptPassword($exchangeRateGBP);
        $cardType = dataEncrypt($cardType);

        $colNames = array("card_number", "card_holder_name", "exchange_rateD", "exchange_rateP","card_type");
        $colValues = array($cardNumber, $cardHolderName, $exchangeRateUSD, $exchangeRateGBP,$cardType,$id);
        if(update("card_beneficairy", $colNames, $colValues, "id")){
            echo "Card information updated successfully";
        }else{
            echo "Information update failed, try again";
        }
    }
?>