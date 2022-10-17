
<div id="newPurchase" class="pfu2-modal">
    <a class="closeModal" href="javascript:void(0)"><span class="icon-close"></span></a>
    <form id="new-purchase" action="#" method="POST">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2>New Purchase</h2>
                    <div id="newPurchaseSuccess" class="success"></div>
                    <div id="newPurchaseError" class="error"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="tile">
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Customer ID</label>
                                        <input type="text" id="customerID" name="customer_id" class="form-control" readonly> 
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
                                            echo "<option>" . dataDecrypt($row['sourcing']) .' - '.dataDecrypt($row['country_of_origin']). "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Card Used</label>
                                    <select name="card_used" id="card" class="form-control">
                                        <option disabled selected>Select Card</option>
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
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input type="text" name="selling" class="form-control" id="selling" autocomplete="off" value="<?php 
                                        $id = $_POST['orderID'];
                                        $sql = "SELECT * FROM orders WHERE order_id = '$id' GROUP BY order_id ORDER BY id";
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
                                    <select type="text" name="currency_amount" id="currency" class="form-control">
                                        <option>Select Currency</option>
                                        <!-- <option class="form-control" value="usd">USD ($)</option>
                                        <option class="form-control" value="bgp">BGP (£)</option> -->
                                    </select>
                                </div>     
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Buying Price (in USD/BGP)</label>
                                    <input type="text" name="buying_UP" id="buying" class="form-control">
                                </div>     
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                    <label>Buying Price (in BDT)</label>
                                    <input type="text" name="buying_BDT" id="buyingBDT" class="form-control" readonly>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                <label>Advance</label>
                                <input type="text" name="advance" id="advance" class="form-control" autocomplete="off" value="<?php 
                                        $id = $_POST['orderID'];
                                        $sql = "SELECT * FROM orders WHERE order_id = '$id' GROUP BY order_id ORDER BY id";
                                        $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()){
                                            echo $row['advance'];
                                        }
                                    ?>" readonly> 
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label>Gross Profit</label>
                                    <input type="text" name="gross_profit" id="grossProfit" class="form-control" readonly>
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
                                    <input type="text" name="note" class="form-control">
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
    </form>
</div>




