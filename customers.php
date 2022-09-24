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
                <h2>New Customers</h2>
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
                            <table>
                                <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Contact Number</th>
                                    <th>Email Address</th>
                                    <th>Shipping Address</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php
                                     $sql = 'SELECT * FROM CUSTOMERS ORDER BY id';
                                     $result = $conn->query($sql);
                                     while($row = $result->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td><?php echo $row['customer_id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['contact_no']; ?></td>
                                    <td><?php echo $row['email_address']; ?></td>
                                    <td><?php echo $row['shipping_address']; ?></td>
                                    <td class="text-center">
                                    <a class="icons edit-icon" 
                                    data-id="<?php echo $row['id']; ?>" 
                                    data-name="<?php echo $row['customer_name']; ?>"
                                    data-contactNo="<?php echo $row['contact_no']; ?>"
                                    data-email="<?php echo $row['email_address']; ?>"
                                    data-shipping="<?php echo $row['shipping_address']; ?>" 
                                    href="javascript:void(0)">
                                        <span class="es-edit"></span>
                                    </a>
                                    </td>
                                    <td class="text-center"><a class="icons delete-icon btn-delete" href="javascript:void(0)" data-url="delete-buyer.php" data-key="<?php echo ($row['id']); ?>"><span class="es-delete"></span></a></td>
                                </tr>
                            <?php
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
</body>

</html>