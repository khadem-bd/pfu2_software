<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $id = $_POST['id'];
    $name = sterilizeValue($_POST['user_name']);
    $contactNo = sterilizeValue($_POST['contact_no']);
    $emailAddress = sterilizeValue($_POST['email']);
    $userType = sterilizeValue($_POST['user_type']);
    $password = sterilizeValue($_POST['password']);
    
    if(empty($name) || empty($contactNo) || empty($emailAddress) || empty($userType) || empty($password)){
        echo "Please fill up all the input fields";
    }else if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
        echo "Please enter a valid email address";
    }else{
        $name = dataEncrypt($name);
        $contactNo = dataEncrypt($contactNo);
        $emailAddress = dataEncrypt($emailAddress);
        $password = encryptPassword($password);
        $userType = dataEncrypt($userType);

        $colNames = array("user_name", "contact_no", "email", "user_type","password");
        $colValues = array($name, $contactNo, $emailAddress, $userType,$password,$id);
        if(update("user", $colNames, $colValues, "id")){
            echo "User information updated successfully";
        }else{
            echo "Information update failed, try again";
        }
    }
?>