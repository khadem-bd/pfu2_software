<!doctype html>
<html>
<?php
include "bundling.php";
?>
<body>
    <?php
    if(isset($_COOKIE['userid'])){
        $userid = $_COOKIE['userid'];
        if($userid != "unset_signOut"){
            include "modals/order-history.php";
            include "modals/new-customers.php";
            include "header.php";
            include "sidebar.php";
    ?>

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <a class="drilldown-summary" href="#orderHistory">
                    <h2>
                        <?php 
                        include "controllers/coreFunctions/connect.php";
                        $sql = 'SELECT count(distinct order_serial_no) FROM order_serial GROUP BY order_serial_no';
                        $result = $conn->query($sql);
                        $row = mysqli_num_rows($result);
                        echo $row;
                        ?>
                    </h2>
                    <p>Orders Recieved This Month</p>
                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <a class="drilldown-summary" href="#">
                    <h2>
                    <?php 
                        include "controllers/coreFunctions/connect.php";
                        $sql = 'SELECT sum(distinct grand_total) FROM orders';
                        $result = $conn->query($sql);
                        $row = mysqli_num_rows($result);
                        echo $row;
                    ?>   
                    </h2>
                    <p>Total Revenue/Sales</p>
                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <a class="drilldown-summary" href="#newCustomers">
                    <h2>
                    <?php 
                        include "controllers/coreFunctions/connect.php";
                        $sql = 'SELECT id FROM customers ORDER BY id';
                        $result = $conn->query($sql);
                        $row = mysqli_num_rows($result);
                        echo $row;
                        ?>
                    </h2>
                    <p>New Customer Joined this month</p>
                </a>
            </div> 
        </div>

        

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <h2 class="section-title">Monthly revenue chart</h2>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <span class="icon-calander icon"></span>
                                <input type="text" class="form-control" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <span class="icon-calander icon"></span>
                                <input type="text" class="form-control" placeholder="End Date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <img width="100%" src="images/graph.png">
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