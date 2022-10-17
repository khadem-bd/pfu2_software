<?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";

    $email = $_POST['email'];
    $email = dataEncrypt($email);
    $password = $_POST['password'];
    $password = encryptPassword($password);

    if(login("user", array("email", "password"), array($email, $password))){
        $userid = getValue("user", "id", "email", $email);
        $userType = getValue("user", "user_type", "email", $email);
        $userType = dataDecrypt($userType);
        setcookie('userid', $userid, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('usertype', $userType, time() + (86400 * 30), "/"); // 86400 = 1 day
        echo "Access Granted";
    }else{
        echo "Access Denied";
    }
?>