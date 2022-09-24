<?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";

    $email = $_POST['email'];
    $email = dataEncrypt($email);
    $password = $_POST['password'];
    $password = encryptPassword($password);

    if(login("user", array("email", "password"), array($email, $password))){
        $userid = getValue("user", "id", "email", $email);
        //$usertype = getValue("user", "usertype", "email_id", $email);
        //$usertype = dataDecrypt($usertype);
        setcookie('userid', $userid, time() + (86400 * 30), "/"); // 86400 = 1 day
        //setcookie('usertype', $usertype, time() + (86400 * 30), "/"); // 86400 = 1 day
        echo "Access Granted";
    }else{
        echo "Access Denied";
    }
?>