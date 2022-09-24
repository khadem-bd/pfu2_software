<?php
    setcookie('userid', "unset_signOut", time() + (86400 * 30), "/"); // 86400 = 1 day
    //setcookie('usertype', "unset_signOut", time() + (86400 * 30), "/"); // 86400 = 1 day
    header('location:index.php'); // redirect
?>