<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";
    $id = sterilizeValue($_POST['id']);
    $oID = sterilizeValue($_POST['o_id']);
    $customerID = sterilizeValue($_POST['customer_id']);
    $destination = sterilizeValue($_POST['destination']);
    $cardUsed = sterilizeValue($_POST['card_used']);
    $currencyAmount = sterilizeValue($_POST['currency_amount']);
    $buyingUP = sterilizeValue($_POST['buying_UP']);
    $buyingBDT = sterilizeValue($_POST['buying_BDT']);
    $grossProfit = sterilizeValue($_POST['gross_profit']);
    $purchaseDate = sterilizeValue($_POST['purchase_date']);
    $notes = sterilizeValue($_POST['note']);

    if(empty($customerID) || empty($destination) || empty($cardUsed) || empty($currencyAmount) || empty($buyingUP) || empty($buyingBDT) || empty($grossProfit) || empty($purchaseDate)){
        echo "Please fill up all the input fields";
    }else{
        // $oID = dataEncrypt($oID);
        // $customerID = dataEncrypt($customerID);
        // $destination = dataEncrypt($destination);
        // $cardUsed = dataEncrypt($cardUsed);
        // $currencyAmount = dataEncrypt($currencyAmount);
        // $buyingUP = dataEncrypt($buyingUP);
        // $buyingBDT = dataEncrypt($buyingBDT);
        // $grossProfit = dataEncrypt($grossProfit);
        // $purchaseDate = dataEncrypt($purchaseDate);
        // $notes = dataEncrypt($notes);

        if(insert("purchased", array("o_id","customer_id","destination","card_used", "currency_amount", "buying_UP", "buying_BDT","gross_profit","purchase_date","note"), array($oID,$customerID,$destination,$cardUsed,$currencyAmount,$buyingUP,$buyingBDT,$grossProfit,$purchaseDate,$notes))){
            update("orders",array("status"),array("purchased",$id),"id");
            echo "Product Successfully Purchased";
        }else{
            echo "Something Went Wrong";
        }
    }
?>
