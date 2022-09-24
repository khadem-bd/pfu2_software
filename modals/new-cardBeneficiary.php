<div id="newCard" class="pfu2-modal">
    <a class="closeModal" href="javascript:void(0)"><span class="icon-close"></span></a>
    <form id="new-card" action="#" method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>New Card</h2>
                    <div id="newCardSuccess" class="success"></div>
                    <div id="newCardError" class="error"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Card Number</label>
                                <input type="text" name= "card_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Card Holder Name</label>
                                <input type="text" name= "card_holder_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Exchange Rate(per Dollar)</label>
                                <input type="text" name= "exchange_rateD" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Exchange Rate(per Pound)</label>
                                <input type="text" name= "exchange_rateP" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Card Type</label>
                                <input type="text" name= "card_type" class="form-control">
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