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
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3"></div>
                        <div class="col-sm-12 col-md-3 col-lg-3">

                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <li><button class="triggerCardForm btn btn-primary form-control" href="#newCard"> Add New Card</button></li>              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <table>
                                <tr>
                                    <th>Card Number</th>
                                    <th>Card Holder Name</th>
                                    <th>Exchange Rate (per Dollar)</th>
                                    <th>Exchange Rate (per Pound)</th>
                                    <th>Card Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                <?php
                            $sql = "SELECT * FROM card_beneficairy ORDER BY id DESC";
                            $result  = $conn->query($sql);
                            
                            while ($row = $result->fetch_assoc()) {  
                                echo "<tr> 
                                <td>" . dataDecrypt($row['card_number']) . "</td> 
                                <td>" . dataDecrypt($row['card_holder_name']). "</td>
                                <td>" . $row['exchange_rateD'] . "</td>
                                <td>" . $row['exchange_rateP'] . "</td>
                                <td>" . dataDecrypt($row['card_type']) . "</td>
                            </tr>";   
                        
                            }

                           
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
</body>

</html>