<?php
include "controllers/coreFunctions/connect.php";
?>
<div id="newPurchase" class="pfu2-modal">
    <a class="closeModal" href="javascript:void(0)"><span class="icon-close"></span></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>New Purchase</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Customer ID</label>
                                    <input type="text" name="customer_id" class="form-control" value="<?php 
                                     $orderId = $_POST['orderID'];
                                     $sql = "SELECT * FROM orders WHERE order_id = '$orderId' GROUP BY order_id";
                                     $result = $conn->query($sql);
                                     while($row = $result->fetch_assoc()){
                                        echo $row['customer_id'];
                                     }
                                   ?>"
                                     readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group">
                                <label>Destination</label>
                                <select name="destination" id="" class="form-control">
                                    <?php
                                    $sql = 'SELECT * FROM address_beneficiary ORDER BY id DESC';
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                        echo "<option>" . dataDecrypt($row['address']) .' - '.dataDecrypt($row['country_of_origin']). "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Card Used</label>
                                <select name="card" id="card" class="form-control">
                                    <option class="form-control" value="" disabled selected>Select Card</option>
                                    <?php
                                    $sql = 'SELECT * FROM card_beneficairy ORDER BY id DESC';
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                        // echo "<option>" . dataDecrypt($row['card_holder_name']) .' - '.dataDecrypt($row['card_type']). "</option>";
                                        ?>
                                        <option value="<?= $row['id'];?>"><?=dataDecrypt($row['card_holder_name'])?>- <?=dataDecrypt($row['card_type'])?> </option>
                                   <?php 
                                    }
                                   ?> 
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                                <label>Selling Price</label>
                                <input type="text" name="selling" class="form-control" autocomplete="off" value="<?php 
                                     $orderId = $_POST['orderID'];
                                     $sql = "SELECT total_price FROM orders WHERE order_id = '$orderId' GROUP BY order_id";
                                     $result = $conn->query($sql);
                                     while($row = $result->fetch_assoc()){
                                        echo $row['total_price'];
                                     }
                                   ?>" readonly> 
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label>Currency Amount</label>
                                <select name="currency" id="currency" class="form-control">
                                    <option class="form-control" value="country">Select Currency</option>
                                    <!-- <option class="form-control" value="usd">USD ($)</option>
                                    <option class="form-control" value="bgp">BGP (£)</option> -->
                                </select>
                            </div>     
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Buying Price (in USD/BGP)</label>
                                <input type="text" class="form-control">
                            </div>     
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                                <label>Buying Price (in BDT)</label>
                                <input type="text" class="form-control" readonly>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                            <label>Advance</label>
                            <input type="text" name="selling" class="form-control" autocomplete="off" readonly> 
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group">
                                <label>Gross Profit</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                                <label>Purchase Date</label>
                                <input type="date" name="purchase_date" class="form-control" autocomplete="off"> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Note/Remarks</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 text-right">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




