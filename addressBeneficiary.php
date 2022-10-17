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
            include "modals/new-address.php";
    
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>New Address Entry</h2>
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
                                <!-- <li><button class="triggerCardForm btn btn-primary form-control" href="#newAddress"> Add New Address</button></li>-->
                                <li><button class="triggerAddressForm btn btn-primary form-control" data-toggle="modal" data-target="#newAddress">Add New Address</button></li>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <table>
                                <tr>
                                    <th>Source</th>
                                    <th>Address</th>
                                    <th>Country of Origin</th>
                                    <th>Weight Charge(per kg)</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                <?php
                            $sql = "SELECT * FROM address_beneficiary ORDER BY id DESC";
                            $result  = $conn->query($sql);
                            echo "<tbody>";
                            while ($row = $result->fetch_assoc()) {  
                            ?>
                            <tr> 
                                <td><?php echo dataDecrypt($row['sourcing'])?></td> 
                                <td><?php echo dataDecrypt($row['address'])?></td> 
                                <td><?php echo  dataDecrypt($row['country_of_origin'])?></td>
                                <td><?php echo dataDecrypt($row['weight_charge']) ?></td>
                                <td class="text-center">
                                    <a class="icons edit-icon editAddressInfo" 
                                    data-toggle="modal" data-target="#editAddress"
                                    data-addressID="<?php echo $row['id']; ?>"  
                                    data-sourcing="<?php echo dataDecrypt($row['sourcing']); ?>"
                                    data-addressDetails="<?php echo dataDecrypt($row['address']); ?>"
                                    data-countryOfOrigin="<?php echo dataDecrypt($row['country_of_origin']); ?>"
                                    data-weightCharge="<?php echo dataDecrypt($row['weight_charge']); ?>"
                                    href="javascript:void(0)">
                                    <span class="es-edit">Edit</span>
                                    </a>
                                </td>
                                <td class="text-center"><a class="icons delete-icon btn-delete" href="javascript:void(0)" data-url="delete-action/delete-address.php" data-key="<?php echo dataEncrypt($row['id']); ?>"><span class="es-delete"></span>Delete</a></td>
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
include "popup-edit/edit-addressInfo.php";
?> 
</body>

</html>