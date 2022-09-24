<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $cardNumber = sterilizeValue($_POST['card_number']);
    $cardHolderName = sterilizeValue($_POST['card_holder_name']);
    $exchangeRateD = sterilizeValue($_POST['exchange_rateD']);
    $exchangeRateP = sterilizeValue($_POST['exchange_rateP']);
    $cardType = sterilizeValue($_POST['card_type']);

   

    if(empty($cardNumber) || empty($cardHolderName) || empty($exchangeRateD) || empty($exchangeRateP || empty($cardType))){
        echo "Please fill up all the input fields";
    }else{
        $cardNumber = dataEncrypt($cardNumber);
        $cardHolderName = dataEncrypt($cardHolderName);
        $cardType = dataEncrypt($cardType);
        
        if(checkDataExistance("card_beneficairy", array("card_number", "card_holder_name"), array($cardNumber,$cardHolderName))){
            echo "This card already exists";
        }else{
            if(insert("card_beneficairy", array("card_number","card_holder_name", "exchange_rateD", "exchange_rateP","card_type"), array($cardNumber,$cardHolderName,$exchangeRateD,$exchangeRateP,$cardType))){
                echo "New card added successfully";
            }
        }
    }
?>