<?php
    include "coreFunctions/connect.php";
    include "coreFunctions/coreFunction.php";

    $userName = sterilizeValue($_POST['user_name']);
    $contactNumber = sterilizeValue($_POST['contact_no']);
    $email = sterilizeValue($_POST['email']);
    $userType = sterilizeValue($_POST['user_type']);
    $password = sterilizeValue($_POST['password']);
    
    

    if(empty($userName) || empty($contactNumber) || empty($email) || empty($userType) || empty($password)){
        echo "Please fill up all the input fields";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Please enter a valid email address";
    }else{
        $userName = dataEncrypt($userName);
        $contactNumber = dataEncrypt($contactNumber);
        $email = dataEncrypt($email);
        $password = encryptPassword($password);
        $userType = dataEncrypt($userType);
        
        if(checkDataExistance("user", array("user_name", "contact_no", "email", "user_type"), array($userName,$contactNumber, $email, $userType))){
            echo "This account already exists";
        }else{
            if(insert("user", array("user_name","contact_no", "email", "user_type", "password"), array($userName,$contactNumber, $email,$userType, $password))){
                echo "New User created successfully";
            }
        }
    }
?>