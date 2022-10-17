<?php
include "controllers/coreFunctions/connect.php";
?>
<div class="modal fade" id="editCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Customer Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="editCustomerForm" action="#" method="POST">      
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div id="editCustomerSuccess" class="success"></div>
                        <div id="editCustomerError" class="error"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Customer ID</label>
                            <input type="text" id="editCustomerID" name= "customer_id" class="form-control" readonly>
                            <input type="hidden" id="editId" name= "id" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" id="editCustomerName" name= "name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Contact No</label>
                            <input type="text" id="editContactNo" name= "contact_no" class="form-control">
                        </div>
                        

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>E-mail Address</label>
                            <input type="email" id="editCustomerEmail" name= "email_address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Shipping Address</label>
                            <input type="text" id="editCustomerShippingAddress" name= "shipping_address" class="form-control">  
                        </div>
                    </div>
                </div>          
            
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
        </form>

    </div>
  </div>
</div>