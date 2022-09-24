<?php
include "controllers/coreFunctions/connect.php";
include "controllers/coreFunctions/coreFunction.php";
?>

<div id="orderHistory" class="pfu2-modal">
    <a class="closeModal" href="javascript:void(0)"><span class="icon-close"></span></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Order Details</h2>
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
                                    <th>Product Description</th>
                                    <th>Product URL</th>
                                    <th>Order Date</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Advance</th>
                                    <th>Remaining</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                              </thead>

                              <tbody id="fetch-data">
      
                              </tbody>
                              
                               </table>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

