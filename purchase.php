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
            include "header.php";
            include "sidebar.php";
            // include "modals/new-purchase.php";
            
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
                                    <th>Product</th>
                                    <th>Selling Price</th>
                                    <th>Purchase</th>
                                    <th>Cancel</th>
                                </tr>
                                <tr>
                                    <td><a href="">Amazon Echo</a></td>
                                    <td>$59.99</td>
                                    <td class="red-text"><a class="triggerPurchaseForm" href="#newPurchase"><span class="icon-purchase icon"></span> Purchase</a></td>
                                    <td class="red-text"><a href=""><span class="icon-close icon"></span> <span class="txt">Cancel Order</span></a></td>
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