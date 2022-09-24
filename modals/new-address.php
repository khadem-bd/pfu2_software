<div id="newAddress" class="pfu2-modal">
    <a class="closeModal" href="javascript:void(0)"><span class="icon-close"></span></a>
    <form id="new-address" action="#" method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>New Address</h2>
                <div id="newAddressSuccess" class="success"></div>
                <div id="newAddressError" class="error"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name= "address" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label>Country of Origin</label>
                                <input type="text" name= "country_of_origin" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label>Weight (in gm)</label>
                                <input type="number" name= "weight" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label>Weight Charge(in BDT)</label>
                                <input type="number" name= "weight_charge" class="form-control">
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