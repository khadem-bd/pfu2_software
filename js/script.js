$(document).ready(function() {
    $("body").on("change", "#card", function() {
        var card_id = $(this).children("option:selected").attr("data-id");
        // var card_val =$(this).find("option:selected").text(); 
        console.log(card_id);
        $.ajax({
            type: "POST",
            url: "currencyAction.php",
            data: {card_id:card_id},
            success: (function(data) {
                $('#currency').html(data);
            })
        });
    });

    $("body").on("click", ".drilldown-summary", function(event) {
        event.preventDefault();
        var target = $(this).attr("href");
        $(target).addClass("open");
    })
    

    $("body").on("click", ".closeModal", function() {
        $(".pfu2-modal").removeClass("open");
    })

    $("body").on("click", ".tab-head li a", function(event) {
        event.preventDefault();
        var target = $(this).attr("href");
        $(".tab-head li").removeClass("active");
        $(this).parent().addClass("active");
        $(".tab-body li").removeClass("active");
        $(target).addClass("active");
    })



    // $("body").on("click", ".triggerPurchaseForm", function(event) {
    //     event.preventDefault();
    //     var purchaseInfo = $(this).attr("href");
    //     $(purchaseInfo).addClass("open");
        
    // })

    $("body").on("click", ".triggerPurchaseForm", function(event) {
        event.preventDefault();
        var targetElem = $(this);
        var id = $(this).attr("data-orderinfo");
        // alert(id);
        $.ajax({
            type: "POST",
            url: "controllers/purchaseInfo.php",
            data: {id:id },
            success: (function(data) {
                // console.log(data);
                var purchaseInfo = JSON.parse(data);
                $('#customerID').val(purchaseInfo.customer_id);
                $('#selling').val(purchaseInfo.total_price);
                $('#advance').val(purchaseInfo.advance);
                var purchaseInfo = targetElem.attr("href");
                $(purchaseInfo).addClass("open");
                
            })
        });    
    })


    //TRIGGER ADDRESS FORM TO OPEN THE POPUP MODAL 
    $("body").on("click", ".triggerAddressForm", function(event) {
        event.preventDefault();
        var target = $(this).attr("data-target");
        $(target).addClass("open");
    })
    //TRIGGER USER FORM TO OPEN THE POPUP MODAL 
    $("body").on("click", ".triggerUserForm", function(event) {
        event.preventDefault();
        var target = $(this).attr("data-target");
        $(target).addClass("open");
    })
    //TRIGGER CARD FORM TO OPEN THE POPUP MODAL 
    $("body").on("click", ".triggerCardForm", function(event) {
        event.preventDefault();
        var target = $(this).attr("data-target");
        $(target).addClass("open");
    })
    //SIGN IN REQUEST AND REDIRECT TO DASHBOARD.PHP PAGE 
    $("form#signinForm").submit(function(event) {
        event.preventDefault();
        ajaxSubmitForm("#signinForm", "signInAction.php", "Access Granted", "#signinSuccess", "#signinError", "relocate", "customers.php");
    });

    //NEW USER ADD REQUEST AND REDIRECT TO USER ACCOUNT.PHP PAGE 
    $("form#new-user").submit(function(event) {
        event.preventDefault();
        ajaxSubmitForm("#new-user", "controllers/newUser.php", "New User created successfully", "#newUserSuccess", "#newUserError", "relocate", "userAccount.php");
    });

    //NEW CARD ADD REQUEST AND REDIRECT TO CARD BENEFICIARY.PHP PAGE 
    $("form#new-card").submit(function(event) {
        event.preventDefault();
        ajaxSubmitForm("#new-card", "controllers/newCard.php", "New card added successfully", "#newCardSuccess", "#newCardError", "relocate", "cardBeneficiary.php");
    });

    //NEW ADDRESS ADD REQUEST AND REDIRECT TO CARD BENEFICIARY.PHP PAGE 
    $("form#new-address").submit(function(event) {
        event.preventDefault();
        ajaxSubmitForm("#new-address", "controllers/newAddress.php", "New address added successfully", "#newAddressSuccess", "#newAddressError", "relocate", "addressBeneficiary.php");
    });

    //AJAX REQUEST TO INSERT THE DATAS THROUGH FORM
    $("form#orderEntryForm").submit(function(event){
        event.preventDefault();
        ajaxSubmitForm("#orderEntryForm","controllers/newCustomer&OrderEntry.php","New order Created Successfully","#orderEntrySuccess","#orderEntryError","refresh","");
    });

    //AJAX REQUEST TO INSERT PURCHASE DATAS THROUGH FORM
    $("form#new-purchase").submit(function(event){
        event.preventDefault();
        ajaxSubmitForm("#new-purchase","controllers/newPurchase.php","Product Successfully Purchased","#newPurchaseSuccess","#newPurchaseError","refresh","orders.php");
        // alert('hello');
    });

     //AJAX REQUEST TO UPDATE USER DATAS THROUGH FORM
    $("form#editCustomerForm").submit(function(event) {
        event.preventDefault();
        ajaxSubmitForm("#editCustomerForm", "controllers/editCustomerAction.php", "Customer information updated successfully", "#editCustomerSuccess", "#editCustomerError", "refresh", "customers.php");
    });

    //AJAX REQUEST TO UPDATE CUSTOMER DATAS THROUGH FORM
    $("form#editUserForm").submit(function(event) {
    event.preventDefault();
    ajaxSubmitForm("#editUserForm", "controllers/editUserAction.php", "User information updated successfully", "#editUserSuccess", "#editUserError", "refresh", "userAccount.php");
    });

    //AJAX REQUEST TO UPDATE CARD DATAS THROUGH FORM
    $("form#editCardForm").submit(function(event) {
        event.preventDefault();
        ajaxSubmitForm("#editCardForm", "controllers/editCardAction.php", "Card information updated successfully", "#editCardSuccess", "#editCardError", "refresh", "cardBeneficiary.php");
    });

    //AJAX REQUEST TO UPDATE ADDRESS DETAILS THROUGH FORM
    $("form#editAddressForm").submit(function(event) {
        event.preventDefault();
        ajaxSubmitForm("#editAddressForm", "controllers/editAddressAction.php", "Address information updated successfully", "#editAddressSuccess", "#editAddressError", "refresh", "addressBeneficiary.php");
    });

     
    // CUSTOMER CONTACT NUMBER AUTO SUGGESTION
    $("body").on("keyup","#customerDetailsAutoSuggest", function() {
        var elem = $(this);
        var value = $(this).val();
        if (value != "") {
            elem.next(".autosuggestions").addClass("show");
            $.ajax({
                type: "post",
                url: "customerAutoSuggest.php",
                data: { value: value },
                success: (function(data) {
                    elem.next(".autosuggestions").children("ul").html(data);
                })
            })
        } else {
            elem.next(".autosuggestions").removeClass("show");
            elem.next(".autosuggestions").children("ul").html("");
        }
    });

    $("body").on("click", ".phoneNo ul li a", function() {
        var contactNo = $(this).html();
        getAutoEntryTableVal("#customerIDSerial", contactNo, "contact_no", "customer_id", "customers");
        getAutoEntryTableVal("#customerNameFinder", contactNo, "contact_no", "name", "customers");
        getAutoEntryTableVal("#emailFinder", contactNo, "contact_no", "email_address", "customers");
        getAutoEntryTableVal("#addressFinder", contactNo, "contact_no", "shipping_address", "customers");
        // getShippmentList(contactNo);
    });

    $("body").on("click", ".autosuggestions ul li a", function() {
        var option = $(this).html();
        $(".autoCompleteValue").val(option);
        $(".autosuggestions").removeClass("show");
    });

    //EDIT CUSTOMER DETAILS WITH POPUP MODAL 
    $("body").on("click", ".editCustomerInfo", function() {
        var id = $(this).attr("data-id");
        var customerID = $(this).attr("data-customerID");
        var name = $(this).attr("data-name");
        var contactNo = $(this).attr("data-contactNo");
        var email = $(this).attr("data-email");
        var address = $(this).attr("data-shipping");
        $("#editId").val(id);
        $("#editCustomerID").val(customerID);
        $("#editCustomerName").val(name);
        $("#editContactNo").val(contactNo);
        $("#editCustomerEmail").val(email);
        $("#editCustomerShippingAddress").val(address);
        var target = $(this).attr("data-target");
        $(target).addClass("open");
    });

    //EDIT USER DETAILS WITH POPUP MODAL
    $("body").on("click", ".editUserInfo", function() {
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var contactNo = $(this).attr("data-contactNo");
        var email = $(this).attr("data-email");
        var userType = $(this).attr("data-userType");
        // var password = $(this).attr("data-password");
        $("#editUserID").val(id);
        $("#editUserName").val(name);
        $("#editUserContactNo").val(contactNo);
        $("#editUserEmail").val(email);
        $("#userType").children("option").each(function() {
            if ($(this).html() == userType) {
                $(this).attr("selected", true);
            }
        });
        $("#editUserPassword").val("");
        var target = $(this).attr("data-target");
        $(target).addClass("open");
    });

    //EDIT CARD DETAILS WITH POPUP MODAL
    $("body").on("click", ".editCardInfo", function() {
        // alert ('Hello');
        var id = $(this).attr("data-cardID");
        var cardNo = $(this).attr("data-cardNumber");
        var cardHolder = $(this).attr("data-cardHolderName");
        var exchangeUSD = $(this).attr("data-exchangeRateUSD");
        var exchangeGBP = $(this).attr("data-exchangeRateGBP");
        var cardType = $(this).attr("data-cardType");
        $("#editCardID").val(id);
        $("#editCardNumber").val(cardNo);
        $("#editCardHolderName").val(cardHolder);
        $("#editExchangeRateUSD").val(exchangeUSD);
        $("#editExchangeRateGBP").val(exchangeGBP);
        $("#editCardType").val(cardType);
        var target = $(this).attr("data-target");
        $(target).addClass("open");
    });

    //EDIT ADDRESS DETAILS WITH POPUP MODAL 
    $("body").on("click", ".editAddressInfo", function() {
        var id = $(this).attr("data-addressID");
        var sourcing = $(this).attr("data-sourcing");
        var address = $(this).attr("data-addressDetails");
        var countryOfOrigin = $(this).attr("data-countryOfOrigin");
        var weightCharge = $(this).attr("data-weightCharge");
        $("#editAddressID").val(id);
        $("#editSource").val(sourcing);
        $("#editAddressDetails").val(address);
        $("#editCountryOfOrigin").val(countryOfOrigin);
        $("#editWeightCharge").val(weightCharge);
        var target = $(this).attr("data-target");
        $(target).addClass("open");
    });

    //DELETE FROM ADDRESS BENEFICIARY SCRIPT CODE
    $("body").on("click", ".btn-delete", function() {
        var url = $(this).attr("data-url");
        var key = $(this).attr("data-key");
        deletePopup(key, url);
    });

    //CUSTOMER LIVE SEARCH KEYUP EVENT SCRIPT CODE 
    $("body").on("keyup","#search-customer",function(){
        var searchItem = $(this).val();
        $.ajax({
            type: "post",
            url: "customerLiveSearch.php",
            data: { searchItem: searchItem },
            success: (function(data) {
                $("#customer-data").html(data);
            })
        })
    });

    //ORDER LIVE SEARCH KEYUP EVENT SCRIPT CODE
    $("body").on("keyup","#search-order",function(){
        var searchOrder = $(this).val();
        $.ajax({
            type: "post",
            url: "orderLiveSearch.php",
            data: { searchOrder: searchOrder },
            success: (function(data) {
                $("#order-data").html(data);
            })
        })
    });

})

//DELETE FUNCTIION FOR ADDRESS BENEFICIARY 
function deletePopup(key, url) {
    var html = "<div id='deletePopupHtml' class='semitransparent-bg'>\
        <div class='popup-msg'>\
            <div class='content'>\
                Are you sure you want to delete this information ?\
            </div>\
            <div class='btn-holder'>\
                <a id='cancelDeletePopup' class='btn btn-cancel' href='javascript:void(0)'>Cancel</a>\
                <a class='btn btn-danger' href='" + url + "?key=" + key + "'>Confirm Delete</a>\
            </div>\
        </div>\
    </div>";
    $("body").append(html);
    setTimeout(function() {
        $(".semitransparent-bg").addClass("open");
    }, 100);
    setTimeout(function() {
        $(".popup-msg").addClass("open");
    }, 600);

    $("body").on("click", ".btn-cancel", function() {
        $(".semitransparent-bg").removeClass("open");
        $(".popup-msg").removeClass("open");
        setTimeout(function() {
            $("#deletePopupHtml").remove();
        }, 500);
    });
}


function getAutoEntryTableVal(targetElem, key, searchKeyColName, columnName, tableName) {
    $.ajax({
        type: "POST",
        url: "getAutoEntryTableValue.php",
        data: { key: key, searchKeyColName: searchKeyColName, columnName: columnName, tableName: tableName },
        success: (function(data) {
            $(targetElem).val(data);
        })
    });
}
















   

