<?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";
    $searchResult = $_POST['searchCard'];

    $sql = "SELECT * FROM card_beneficairy WHERE card_number LIKE '%{$searchResult}%'
    OR card_holder_name LIKE '%{$searchResult}%'
    OR exchange_rateD LIKE '%{$searchResult}%'
    OR card_type like '%{$searchResult}%'"; 

    $result = $conn->query($sql);
    $html="";
    if(mysqli_num_rows($result)>0){
        $html = '<table>
        <thead>
        <tr>
            <th class="text-center">Card Number</th>
            <th class="text-center">Card Holder Name</th>
            <th class="text-center">Exchange Rate(USD)</th>
            <th class="text-center">Exchange Rate (GBP)</th>
            <th class="text-center">Card Type</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
        </thead>';
        while($row = $result->fetch_assoc()){
            $html.= '<tr>
            <td class="text-center">'.dataDecrypt($row["card_number"]).'</td>
            <td class="text-center">'.dataDecrypt($row["card_holder_name"]).'</td>
            <td class="text-center">'.$row["exchange_rateD"].'</td>
            <td class="text-center">'.$row["exchange_rateP"].'</td>
            <td class="text-center">'.dataDecrypt($row["card_type"]).'</td>
            <td class="text-center">
            <a class="icons edit-icon editCardInfo" 
            data-toggle="modal" data-target="#editCard"
            data-cardID="'.$row["id"].' " 
            data-cardNumber="'.dataDecrypt($row["card_number"]).'" 
            data-cardHolderName="'.dataDecrypt($row["card_holder_name"]).'"
            data-exchangeRateUSD="'. $row["exchange_rateD"].'"
            data-exchangeRateGBP="'.$row["exchange_rateP"].'"
            data-cardType="'.dataDecrypt($row["card_type"]).'"
            href="javascript:void(0)">
                <span class="es-edit">Edit</span>
             </a>
            </td>
            <td class="text-center"><a class="icons delete-icon btn-delete" href="javascript:void(0)" data-url="#" data-key="'.($row['id']).'"><span class="es-delete"></span>Delete</a></td>
        </tr>';
        }
        $html.= '</table>';
        echo $html;
    }else{
        echo "<h6 class='error-message'>No Card Record Found with the search. . .</h6>";
    }
?>
