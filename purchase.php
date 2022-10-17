<!doctype html>
<html>
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
            include "modals/new-purchase.php";
            
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Purchase</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <table>
                                <tr>
                                    <th class="text-center">Order ID</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Product Description</th>
                                    <th class="text-center">Product URL</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">Buying Price</th>
                                    <th class="text-center">Selling Price</th>
                                    <th class="text-center">Gross Profit</th>
                                    <th class="text-center">Card Used</th>
                                    <th class="text-center">Source</th>
                                    <th class="text-center">Country</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Purchase Date</th>
                                </tr>
                                <?php
                                    //INNER JOIN QUERY TO FETCH DATA THROUGH CUSTOMER ID 
                                    $sql = 'SELECT * FROM purchased';
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr>
                                                
                                                
                                            </tr>";   
                                    }
                                    ?> 
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