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
            include "modals/new-user.php";
    
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>New User Entry</h2>
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
                                <!-- <li><button class="triggerUserForm btn btn-primary form-control" href="#newUser"> Add New User</button></li>-->
                                <li><button class="triggerUserForm btn btn-primary form-control" data-toggle="modal" data-target="#newUser">Add New User</button></li>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <table>
                                <tr>
                                    <th>User Name</th>
                                    <th>Contact Number</th>
                                    <th>E-mail Address</th>
                                    <th>User Type</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                <tr>
                                <?php
                            $sql = "SELECT * FROM user ORDER BY id DESC";
                            $result  = $conn->query($sql);
                            echo "<tbody>";
                            while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo dataDecrypt($row['user_name']); ?></td>
                            <td><?php echo dataDecrypt($row['contact_no']); ?></td>
                            <td><?php echo dataDecrypt($row['email']); ?></td>
                            <td><?php echo dataDecrypt($row['user_type']); ?></td>
                            <td class="text-center">
                            <a class="icons edit-icon editUserInfo" 
                            data-toggle="modal" data-target="#editUser"
                            data-id="<?php echo $row['id']; ?>"  
                            data-name="<?php echo dataDecrypt($row['user_name']); ?>"
                            data-contactNo="<?php echo dataDecrypt($row['contact_no']); ?>"
                            data-email="<?php echo dataDecrypt($row['email']); ?>"
                            data-userType="<?php echo dataDecrypt($row['user_type']); ?>"
                            data-password="<?php echo $row['password']; ?>"
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
include "popup-edit/edit-user.php";
?> 
</body>

</html>