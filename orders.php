<!doctype html>
<html>
<?php
include "bundling.php";
include "controllers/coreFunctions/connect.php";
?>
<body>
    <?php
        if(isset($_COOKIE['userid']) && $_COOKIE['userid']!= "unset_signOut"){
            $userid = $_COOKIE['userid'];
                include "modals/new-customers.php";
                include "header.php";
                include "sidebar.php";    
             

    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Orders</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="tab">
                                <ul class="tab-head">
                                    <li class="active"><a href="#orderList">Order List</a></li>
                                    <li><a href="#addNew">Add New</a></li>
                                </ul>
                                <ul class="tab-body">
                                    <li class="active" id="orderList">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                        <div class="form-group">
                                                            <span class="icon-search icon"></span>
                                                            <input type="text" class="form-control" id="search-order" placeholder="Search">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3"></div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                        <div class="form-group">
                                                            <label>From Date</label>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                        <div class="form-group">
                                                            <label >To Date</label>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <table id="order-data">
                                                            <thead>
                                                                <tr>
                                                                    <th>Order ID</th>
                                                                    <th class="text-center">Order Date</th>
                                                                    <th class="text-center">Customer Name</th>
                                                                    <th class="text-center">Contact No</th>
                                                                    <th class="text-center">Order Value</th>
                                                            
                                                                </tr>

                                                            </thead>
                                                            
                                                            <tbody>
                                                                <?php
                                                                    //INNER JOIN QUERY TO FETCH DATA THROUGH CUSTOMER ID 
                                                                    $sql = 'SELECT orders.order_id,customers.customer_id,customers.name,customers.contact_no,orders.grand_total,
                                                                    orders.order_date,orders.status from ORDERS INNER JOIN 
                                                                    customers ON orders.customer_id = customers.customer_id GROUP BY order_id ORDER BY order_date DESC';
                                                                    $result = $conn->query($sql);
                                                                    if(mysqli_num_rows($result)>0){
                                                                        foreach($result as $row){
                                                                    ?>
                                                                        
                                                                    <tr>
                                                                        <td><a class='viewOrderInfo' id='drilldown-summary' href='#order-history' data-orderInfo=<?php echo $row['order_id']?> > <?php echo $row['order_id']?> </a></td>
                                                                        <td class='text-center'><?php echo $row['order_date'] ?></td> 
                                                                        <td class='text-center'><?php echo  $row['name']?></td> 
                                                                        <td class='text-center'><?php echo $row['contact_no'] ?></td>
                                                                        <td class='text-center'><?php echo $row['grand_total']?></td>
                                                                    </tr>   
                                                                    <?php
                                                                        }
                                                                    }else{
                                                                        echo"<h4>No Order Record Found</h4>";
                                                                    }
                                                                    ?>   
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                      
                                    <form id="orderEntryForm" action="#" method="POST">
                                        <div id="orderEntrySuccess" class="success"></div>
                                        <div id="orderEntryError" class="error"></div>
                                       
                                      <li id="addNew">
                                        <div class="row">
                                            <div hidden class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label>Customer ID</label>
                                                    <input type="hidden" name="customer_id" class="form-control">
                                                </div>
                                            </div>

                                            <div hidden class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label>Order ID</label>
                                                    <input type="hidden" id="orderIDSerial" name="order_id" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>Customer ID</label>
                                                    <input type="text" id="customerIDSerial" name="customer_id" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input id ="customerNameFinder" type="text" name="name" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input id="customerDetailsAutoSuggest" type="text" name = "contact_no" class="form-control autoCompleteValue" autocomplete="off">
                                                    <div class="autosuggestions phoneNo">
                                                        <ul></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>Email ID</label>
                                                    <input id ="emailFinder" type="text" name = "email_address" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Shipment Address</label>
                                                    <input id="addressFinder" type="text" name = "shipping_address" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>



                                    <div class="row" id="add-another-form">
                                        <div class="gray-section">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Product Url <a class="red-link" href="#addNew" id="addForm" >Add Another</a></label>
                                                        
                                                        <input type="text" name="product_url[]" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input type="number" min="0" name="qty[]" id="qty-0" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Order Date</label>
                                                        <input type="date" name="order_date[]" class="form-control" autocomplete="off"> 
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-sm-5 col-md-5 col-lg-5">
                                                    <div class="form-group">
                                                        <label>Product Description</label>
                                                        <textarea class="form-control" name="product_desc[]"autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    <div class="form-group">
                                                        <label>Color</label>
                                                        <input type="text" class="form-control" name="color[]"autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    <div class="form-group">
                                                        <label>Size</label>
                                                        <input type="text" class="form-control" name="size[]"autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Country of Origin</label>
                                                        <select name="country_of_origin[]" id="" class="form-control">
                                                            <option class="form-control" value="country">Select Country</option>
                                                            <option class="form-control" value="USA">USA</option>
                                                            <option class="form-control" value="UK">UK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                                
                                            

                                            <div class="row">
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Unit Price (BDT)</label>
                                                        <input type="number" min="0" name="unit_price[]" id="unitPrice-0" class="form-control" value="0" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Total Price (BDT)</label>
                                                        <input type="number" min="0" name="total_price[]" id="totalPrice-0" class="form-control totalPrice" value="0" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Advance Payment (BDT)</label>
                                                        <input type="number" min="0" name="advance[]"  id="adv-0" class="form-control" value="0" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Remaining Amount (BDT)</label>
                                                        <input type="number" min="0" name="remaining[]"  id="remaining-0" value="0" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Grand Total (BDT)</label>
                                                    <input type="number" min="0" class="form-control" name="grand_total" value="0" id="grandTotal" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 text-right">
                                                <input type="submit" name="submit_multiple_data" class="btn btn-primary" value="Save">
                                            </div>
                                        </div>
             
                                     </li>

                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
    include "modals/order-history.php";
    // include "modals/new-purchase.php";
        }
?>
</body>
</html>