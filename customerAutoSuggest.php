<?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";
    $value = sterilizeValue($_POST['value']);
    $html = "";
    $sql = "SELECT * FROM customers WHERE contact_no LIKE '%$value%' ORDER BY id DESC";
    $result  = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $html = $html . "<li><a href='javascript:void(0)'>" . $row['contact_no'] . "</a></li>";
    }
    echo $html;
?>