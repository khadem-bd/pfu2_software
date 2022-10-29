<!doctype html>
<html lang="en">
<?php
include "bundling.php";
include "controllers/coreFunctions/connect.php";
include "controllers/coreFunctions/coreFunction.php";

?>
<body>
    <?php
    if(isset($_COOKIE['userid'])){
        $userid = $_COOKIE['userid'];
        if($userid != "unset_signOut"){
            include "header.php";
            include "sidebar.php";
            include "modals/new-cardBeneficiary.php";
    
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>New Card Entry</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <span class="icon-search icon"></span>
                                <input type="text" class="form-control" id="search-card" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3"></div>
                        <div class="col-sm-12 col-md-3 col-lg-3">

                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <!-- <li><button class="triggerCardForm btn btn-primary form-control" href="#newCard"> Add New Card</button></li>-->
                                <li><button class="triggerCardForm btn btn-primary form-control" data-toggle="modal" data-target="#newCard">Add New Card</button></li>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <table id="card-data">
                                <tr>
                                    <th class="text-center">Card Number</th>
                                    <th class="text-center">Card Holder Name</th>
                                    <th class="text-center">Exchange Rate(USD)</th>
                                    <th class="text-center">Exchange Rate (GBP)</th>
                                    <th class="text-center">Card Type</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                <tr>
                                <?php
                            $sql = "SELECT * FROM card_beneficairy ORDER BY id DESC";
                            $result  = $conn->query($sql);
                            echo "<tbody>";
                            
                            while ($row = $result->fetch_assoc()) {  
                                ?>
                            <tr> 
                                <td class="text-center"><?php echo dataDecrypt($row['card_number']) ?></td> 
                                <td class="text-center"><?php echo dataDecrypt($row['card_holder_name'])?></td>
                                <td class="text-center"><?php echo $row['exchange_rateD']?></td>
                                <td class="text-center"><?php echo $row['exchange_rateP'] ?></td>
                                <td class="text-center"><?php echo dataDecrypt($row['card_type'])?></td>
                                <td class="text-center">
                                <a class="icons edit-icon editCardInfo" 
                                data-toggle="modal" data-target="#editCard"
                                data-cardID="<?php echo $row['id']; ?>"  
                                data-cardNumber="<?php echo dataDecrypt($row['card_number']); ?>"
                                data-cardHolderName="<?php echo dataDecrypt($row['card_holder_name']); ?>"
                                data-exchangeRateUSD="<?php echo $row['exchange_rateD']; ?>"
                                data-exchangeRateGBP="<?php echo $row['exchange_rateP']; ?>"
                                data-cardType="<?php echo dataDecrypt($row['card_type']); ?>"
                                href="javascript:void(0)">
                                <span class="es-edit">Edit</span>
                                </a>
                            </td>
                            <td class="text-center"><a class="icons delete-icon btn-delete" href="javascript:void(0)" data-url="#" data-key="<?php echo ($row['id']); ?>"><span class="es-delete"></span>Delete</a></td>
                            </tr>   

                            <?php
                            }
                            echo "</tbody>";
                        ?>
                        
                        </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
     }else{
        header("location:index.php");

    } 
}else{
    header("location:index.php");
}
?> 
<?php
include "popup-edit/edit-cardInfo.php";
?>
</body>

</html>