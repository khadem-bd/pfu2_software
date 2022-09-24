$(document).ready(function() {
    var i = 0;
    var qty = "#qty-" + i;
    var unitprice = "#unitPrice-" + i;
    var advance = "#adv-" + i;
    var remaining = "#remaining-" + i;


    $("body").on("change", qty, function() {
        showDetails(i);
    });
    $("body").on("change", unitprice, function() {
        showDetails(i);
    });
    $("body").on("change", advance, function() {
        showDetails(i);
    });
    $("body").on("change", remaining, function() {
        showDetails(i);
    });

    //ADD NEW FORM CODE

    $('#addForm').click(function() {
        ++i;
        $('#add-another-form').append('<div class="gray-section append_item" id="gray-section' + i + '">\
        <div class="row ">\
        <div hidden class="col-sm-12 col-md-4 col-lg-4">\
            <div class="form-group">\
                <label>Product ID</label>\
                    <input type="hidden" id="productIDSerial" name="product_id[]" class="form-control">\
                    </div>\
            </div>\
            <div class="col-sm-12 col-md-6 col-lg-6">\
                <div class="form-group">\
                    <label>Product Url <a class="red-link removeForm" href="#addNew" id="' + i + '">Remove</a></label>\
                    <input type="text" name="product_url[]" class="form-control">\
                </div>\
            </div>\
            <div class="col-sm-12 col-md-3 col-lg-3">\
                <div class="form-group">\
                    <label>Quantity</label>\
                    <input type="number" min="0" name="qty[]" id="qty-' + i + '" class="form-control">\
                     </div>\
            </div>\
            <div class="col-sm-12 col-md-3 col-lg-3">\
                <div class="form-group">\
                    <label>Order Date</label>\
                    <input type="date" name="order_date[]" class="form-control">\</div>\
            </div>\
        </div>\
        <div class="row">\
            <div class="col-sm-9 col-md-9 col-lg-9">\
                <div class="form-group">\
                    <label>Product Description</label>\
                    <textarea class="form-control" name="product_desc[]"></textarea>\
                </div>\
            </div>\<div class="col-sm-3 col-md-3 col-lg-3">\
            <div class="form-group">\
                <label>Country of Origin</label>\
                <select name="country_of_origin[]" id="">\
                    <option class="form-control" value="country">Select Country</option>\
                    <option class="form-control" value="usa">USA</option>\
                    <option class="form-control" value="uk">UK</option>\
                </select>\
            </div>\
        </div>\
        </div>\
        <div class="row">\
        \
    </div>\
        <div class="row">\
            <div class="col-sm-12 col-md-3 col-lg-3">\
                <div class="form-group">\
                    <label>Unit Price (BDT)</label>\
                    <input type="number" min="0" name="unit_price[]" id="unitPrice-' + i + '" class="form-control">\
                </div>\
            </div>\
            <div class="col-sm-12 col-md-3 col-lg-3">\
                <div class="form-group">\
                    <label>Total Price (BDT)</label>\
                    <input type="number" min="0" name="total_price[]" id="totalPrice-' + i + '" class="form-control totalPrice" readonly>\
                </div>\
            </div>\
            <div class="col-sm-12 col-md-3 col-lg-3">\
                <div class="form-group">\
                    <label>Advance Payment (BDT)</label>\
                    <input type="number" min="0" name="advance[]" id="adv-' + i + '" class="form-control">\
                </div>\
            </div>\
            <div class="col-sm-12 col-md-3 col-lg-3">\
                <div class="form-group">\
                    <label>Remaining Amount (BDT)</label>\
                    <input type="number" min="0" name="remaining[]" id="remaining-' + i + '" class="form-control" readonly>\
                </div>\
            </div>\
        </div>\
    </div>');



        $("#qty-" + i).change(function() {
            showDetails(i)
        });
        $("#unitPrice-" + i).change(function() {
            showDetails(i)
        });
        $("#adv-" + i).change(function() {
            showDetails(i)
        });
        $("#remaining-" + i).change(function() {
            showDetails(i)
        });
    });


    //REMOVE THE FORM AND GRANDTOTAL CALCULATION AFTER FORM REMOVAL 

    $(document).on('click', '.removeForm', function() {
        var button_id = $(this).attr("id");
        $('#gray-section' + button_id).remove();
        $("#grandTotal").val(calculateGT());

    });

    $("body").on("keyup", ".form-control", function() {
        $("#grandTotal").val(calculateGT());
    })

    //DRILLDOWN PRESENTATION OF ORDER DETAILS OF PARTICULAR CUSTOMER

    $("body").on("click", "#drilldown-summary", function(event) {
        event.preventDefault();
        var orderID = $(this).attr("data-orderInfo");
       $.ajax({
            type: "POST",
            url: "OrderInfo.php",
            data: { orderID: orderID },
            success: (function(data) {
                $("#fetch-data").html(data);
                $("#orderHistory").addClass("open");
            })
        })
    })

    //AJAX REQUEST TO INSERT THE DATAS THROUGH FORM

    // $("#orderEntryForm").submit(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "controllers/newCustomer&OrderEntry.php",
    //         data: $(this).serialize(),
    //         success: (function(data) {
    //             $("#orderEntryForm")[0].reset();
    //             $(".append_item").remove();
    //             $("#show-alert").html(`<div class="alert alert-success" role="alert">${data}</div>`);
    //         })
    //     })
    // })

    if ($('#customerIDSerial').length) {
        getIDGenerator();
    }


    if ($('#orderIDSerial').length) {
        getOrderIDGenerator();
    }


});





/* OUTSIDE THE ORDER FORM CODE STARTS HERE - ALL FUNCTIONAL CODE CONTAINS IN THIS SECTION*/

// REAL TIME CALCULATION OF ADD NEW ORDER DETAILS PAGE - SHOW DETAILS FUNCTION
function showDetails(i) {
    var qty = $('#qty-' + i).val();
    var unitPrice = $('#unitPrice-' + i).val();
    var adv = $('#adv-' + i).val();
    var totalPrice = (qty * unitPrice);
    var remaining = (totalPrice - adv);
    $('#totalPrice-' + i).val(totalPrice);
    $('#remaining-' + i).val(remaining);
}

//GRANDTOTAL CALCULATION FUNCTION
function calculateGT() {
    var grandTotal = 0;
    $('.totalPrice').each(function() {
        grandTotal = grandTotal + parseInt($(this).val());
        console.log(grandTotal);
    });
    return grandTotal;
}



//GET ID SERIAL

function getIDGenerator() {
    $.ajax({
        url: "controllers/customerIDGenerator.php",
        type: "POST",
        success: (function(data) {
            data = trim11(data);
            $("#customerIDSerial").val(data);
            
        })
    });
}



function getOrderIDGenerator() {
    $.ajax({
        url: "controllers/orderIDGenerator.php",
        type: "POST",
        success: (function(data) {
            data = trim11(data);
            $("#orderIDSerial").val(data);
        })
    });
}


