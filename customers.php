<!doctype html>
<html>
    <head>
    <?php
    include "bundling.php";
    ?>
    </head>

<body>

    <?php
    if(isset($_COOKIE['userid'])){
        $userid = $_COOKIE['userid'];
        if($userid != "unset_signOut"){
            include "header.php";
            include "sidebar.php";
    ?>

    <?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Customer Details</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group" id="search-bar">
                                <span class="icon-search icon"></span>
                                <input type="text" class="form-control" id="search-customer" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3"></div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <table id="customer-data">
                                <thead>
                                <tr>
                                    <th class="text-center">Customer ID</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Contact Number</th>
                                    <th class="text-center">Email Address</th>
                                    <th class="text-center">Shipping Address</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php
                                     $sql = 'SELECT * FROM customers ORDER BY id';
                                     $result = $conn->query($sql);
                                     if(mysqli_num_rows($result)>0){

                                    foreach($result as $row){
                                     //while($row = $result->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td class="text-center"><?php echo $row['customer_id']; ?></td>
                                    <td class="text-center"><?php echo $row['name']; ?></td>
                                    <td class="text-center"><?php echo $row['contact_no']; ?></td>
                                    <td class="text-center"><?php echo $row['email_address']; ?></td>
                                    <td class="text-center"><?php echo $row['shipping_address']; ?></td>
                                    <td class="text-center">
                                    <a class="icons edit-icon editCustomerInfo" 
                                    data-toggle="modal" data-target="#editCustomer"
                                    data-id="<?php echo $row['id']; ?>" 
                                    data-customerID="<?php echo $row['customer_id']; ?>" 
                                    data-name="<?php echo $row['name']; ?>"
                                    data-contactNo="<?php echo $row['contact_no']; ?>"
                                    data-email="<?php echo $row['email_address']; ?>"
                                    data-shipping="<?php echo $row['shipping_address']; ?>"
                                    href="javascript:void(0)">
                                        <span class="es-edit">Edit</span>
                                     </a>
                                    </td>
                                    <td class="text-center"><a class="icons delete-icon btn-delete" href="javascript:void(0)" data-url="#" data-key="<?php echo ($row['id']); ?>"><span class="es-delete"></span>Delete</a></td>
                                </tr>
                            <?php
                            }
                                }else{
                                    echo"<h4>No Customer Record Found</h4>";
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

    <?php
    }else{
        header("location:index.php");
    }
} else{
    header("location:index.php");

}
?>

<?php
        include "popup-edit/edit-customer.php";
       
    ?>
</body>

</html>