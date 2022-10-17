<div class="modal fade" id="editCard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Card Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="editCardForm" action="#" method="POST">      
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div id="editCardSuccess" class="success"></div>
                        <div id="editCardError" class="error"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Card Number</label>
                            <input type="text" id="editCardNumber" name="card_number" class="form-control">
                            <input type="hidden" id="editCardID" name= "id" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Card Holder Name	</label>
                            <input type="text" id="editCardHolderName" name="card_holder_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Exchange Rate(USD)</label>
                            <input type="text" id="editExchangeRateUSD" name="exchange_rateD" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Exchange Rate(GBP)</label>
                            <input type="text" id="editExchangeRateGBP" name="exchange_rateP" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Card Type</label>
                            <input type="text" id="editCardType" name="card_type" class="form-control">
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