<div class="modal fade" id="editAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Address Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="editAddressForm" action="#" method="POST">      
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div id="editAddressSuccess" class="success"></div>
                        <div id="editAddressError" class="error"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Source</label>
                            <input type="text" id="editSource" name="sourcing" class="form-control">
                            <input type="hidden" id="editAddressID" name= "id" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" id="editAddressDetails" name="address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Country of Origin</label>
                            <input type="text" id="editCountryOfOrigin" name="country_of_origin" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Weight Charge(per kg)</label>
                            <input type="text" id="editWeightCharge" name="weight_charge" class="form-control">
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