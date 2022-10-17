<!doctype html>
<html>
<?php
include "bundling.php";
?>
<body>
    <?php
    if(isset($_COOKIE['userid']) && isset($_COOKIE['usertype'])){
        $userid = $_COOKIE['userid'];
        $userType = $_COOKIE['usertype'];
        if($userid != "unset_signOut" && $userType != "unset_signOut"){
            include "modals/order-history.php";
            include "modals/new-customers.php";
            include "header.php";
            include "sidebar.php";
    ?>

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <a class="drilldown-summary" href="javascript:void(0)">
                    <h2>
                        <?php 
                        include "controllers/coreFunctions/connect.php";
                        $sql = 'SELECT count(distinct order_id) FROM orders GROUP BY order_id';
                        $result = $conn->query($sql);
                        $row = mysqli_num_rows($result);
                        echo $row;
                        ?>
                    </h2>
                    <p>Total Order Received</p>
                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <a class="drilldown-summary" href="javascript:void(0)">
                    <h2>
                    <?php 
                        include "controllers/coreFunctions/connect.php";
                        $sql = 'SELECT * FROM orders GROUP BY order_id';
                        $result = $conn->query($sql);
                        $totalRevenue=0;
                        while($row=$result->fetch_assoc()){
                            $totalRevenue = $totalRevenue + $row['grand_total'];
                        }
                        echo $totalRevenue;
                    ?>   
                    </h2>
                    <p>Total Revenue/Sales</p>
                </a>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <a class="drilldown-summary" href="javascript:void(0)">
                    <h2>
                    <?php 
                        include "controllers/coreFunctions/connect.php";
                        $sql = 'SELECT id FROM customers ORDER BY id';
                        $result = $conn->query($sql);
                        $row = mysqli_num_rows($result);
                        echo $row;
                        ?>
                    </h2>
                    <p>Total Customer</p>
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