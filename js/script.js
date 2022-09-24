$(document).ready(function() {

    $("body").on("change", "#card", function() {
        var card_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "currencyAction.php",
            data: {cardID:card_id },
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

    $("body").on("click", ".triggerPurchaseForm", function(event) {
        event.preventDefault();
        var target = $(this).attr("href");
        $(target).addClass("open");
    })

    $("body").on("click", ".triggerUserForm", function(event) {
        event.preventDefault();
        var target = $(this).attr("href");
        $(target).addClass("open");

    })

    $("body").on("click", ".triggerCardForm", function(event) {
        event.preventDefault();
        var target = $(this).attr("href");
        $(target).addClass("open");
    })
    //SIGN IN REQUEST AND REDIRECT TO DASHBOARD.PHP PAGE 
    $("form#signinForm").submit(function(event) {
        event.preventDefault();
        ajaxSubmitForm("#signinForm", "signInAction.php", "Access Granted", "#signinSuccess", "#signinError", "relocate", "dashboard.php");
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


})

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










   

