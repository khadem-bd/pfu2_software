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
                <h2>Purchase Record</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <form action="purchase-export.php" method="POST">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <select name="card_used" id="card" class="form-control">
                                        <option disabled selected>Select Card Holder</option>
                                        <?php
                                            $sql = 'SELECT * FROM card_beneficairy ORDER BY id DESC';
                                            $result = $conn->query($sql);
                                            while($row = $result->fetch_assoc()){
                                            $cardHolderName = dataDecrypt($row['card_holder_name']);
                                            $cardType = dataDecrypt($row['card_type']);
                                            $id = $row['id'];
                                            echo "<option data-id=" . $id . ">" . $cardHolderName."- ".$cardType. "</option>";
                                            //echo "<option data-id=".$row['id']." value=" . dataDecrypt($row['card_holder_name']) . ">" . dataDecrypt($row['card_holder_name']) ." - ".dataDecrypt($row['card_type']). "</option>";
                                        }
                                        ?>    
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="from" name="from" placeholder="From Date">
                                </div> 
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="to" name="to" placeholder="To Date">
                                </div>
                            </div>
                            <!-- <div class="col-sm-12 col-md-2 col-lg-2">
                                <div class="form-group"> 
                                    <input type='submit' class="btn btn-primary form-control" value='filter' name="filter">
                                </div>
                            </div> -->
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <!-- <a href="purchase-export.php"><li><button class="btn btn-primary form-control">Export to CSV</button></li></a>  -->
                                    <input type='submit' class="btn btn-primary form-control" value='Export to Excel' name="Export">
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3"></div>
                            <div class="col-sm-12 col-md-3 col-lg-3"></div>
                            <div class="col-sm-12 col-md-3 col-lg-3"></div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group" id="search-bar">
                                    <span class="icon-search icon"></span>
                                    <input type="text" class="form-control" id="search-purchase" placeholder="Search">
                                </div>
                            </div>

                    
                        </div>
                    </form>
                    

                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table id="purchase-data">
                                    <thead>
                                        <?php
                                        if($_COOKIE['usertype'] == 'Super Admin'){
                                        ?>
                                        <tr>
                                            <th class="text-center">Order ID</th>
                                            <th class="text-center">Customer Name</th>
                                            <th class="text-center">Product Description</th>
                                            <th class="text-center">Size</th>
                                            <th class="text-center">Color</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Selling Price</th>
                                            <th class="text-center">Buying Price (in USD/GBP)</th>
                                            <th class="text-center">Buying Price (in BDT)</th>
                                            <th class="text-center">Gross Profit</th>
                                            <th class="text-center">Card Used</th>
                                            <th class="text-center">Source</th>
                                            <th class="text-center">Country</th>
                                            <th class="text-center">Order Date</th>
                                            <th class="text-center">Purchase Date</th>
                                        </tr>
                                        <?php }else{
                                        ?> 
                                        <tr>
                                            <th class="text-center">Order ID</th>
                                            <th class="text-center">Customer Name</th>
                                            <th class="text-center">Product Description</th>
                                            <th class="text-center">Size</th>
                                            <th class="text-center">Color</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Selling Price</th>
                                            <th class="text-center">Card Used</th>
                                            <th class="text-center">Source</th>
                                            <th class="text-center">Country</th>
                                            <th class="text-center">Order Date</th>
                                            <th class="text-center">Purchase Date</th>
                                        </tr>
                                        <?php } ?>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                            //INNER JOIN QUERY TO FETCH DATA THROUGH CUSTOMER ID 
                                            $sql = 'SELECT orders.order_id,customers.name,orders.product_desc,orders.qty, 
                                            orders.size,orders.color,orders.order_date, orders.country_of_origin,
                                            orders.total_price,purchased.destination,
                                            purchased.card_used,purchased.buying_UP,purchased.buying_BDT,purchased.gross_profit,
                                            purchased.purchase_date from ORDERS INNER JOIN customers
                                            ON orders.customer_id = customers.customer_id INNER JOIN purchased 
                                            ON orders.id=purchased.o_id ORDER BY purchase_date DESC';

                                            $result = $conn->query($sql);
                                            if(mysqli_num_rows($result)>0){
                                                foreach($result as $row){
                                                if($_COOKIE['usertype'] == 'Super Admin'){
                                            ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $row['order_id']; ?></td>
                                                <td class="text-center"><?php echo $row['name']; ?></td>
                                                <td class="text-center"><?php echo $row['product_desc']; ?></td>
                                                <td class="text-center"><?php echo $row['size']; ?></td>
                                                <td class="text-center"><?php echo $row['color']; ?></td>
                                                <td class="text-center"><?php echo $row['qty']; ?></td>
                                                <td class="text-center"><?php echo $row['total_price']; ?></td>
                                                <td class="text-center"><?php echo $row['buying_UP']; ?></td>
                                                <td class="text-center"><?php echo $row['buying_BDT']; ?></td>
                                                <td class="text-center"><?php echo $row['gross_profit']; ?></td>
                                                <td class="text-center"><?php echo $row['card_used']; ?></td>
                                                <td class="text-center"><?php echo $row['destination']; ?></td>
                                                <td class="text-center"><?php echo $row['country_of_origin']; ?></td>
                                                <td class="text-center"><?php echo $row['order_date']; ?></td>
                                                <td class="text-center"><?php echo $row['purchase_date']; ?></td>
                                            </tr>   
                                            <?php

                                                }else{
                                                    ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $row['order_id']; ?></td>
                                                <td class="text-center"><?php echo $row['name']; ?></td>
                                                <td class="text-center"><?php echo $row['product_desc']; ?></td>
                                                <td class="text-center"><?php echo $row['size']; ?></td>
                                                <td class="text-center"><?php echo $row['color']; ?></td>
                                                <td class="text-center"><?php echo $row['qty']; ?></td>
                                                <td class="text-center"><?php echo $row['total_price']; ?></td>
                                                <td class="text-center"><?php echo $row['card_used']; ?></td>
                                                <td class="text-center"><?php echo $row['destination']; ?></td>
                                                <td class="text-center"><?php echo $row['country_of_origin']; ?></td>
                                                <td class="text-center"><?php echo $row['order_date']; ?></td>
                                                <td class="text-center"><?php echo $row['purchase_date']; ?></td>
                                            </tr>   
                                            <?php
                                                }                                            
                                                }
                                            }else{
                                                echo"<h6 class='error-message'>No Purchase Record Found</h6>";
                                            }
                                            ?>   
                                    </tbody>
                                </table>
                            </div>
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