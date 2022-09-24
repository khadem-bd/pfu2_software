<?php
    include "controllers/coreFunctions/connect.php";
    include "controllers/coreFunctions/coreFunction.php";
    $key = sterilizeValue($_POST['key']);
    $searchKeyColName = sterilizeValue($_POST['searchKeyColName']);
    $columnName = sterilizeValue($_POST['columnName']);
    $tableName = sterilizeValue($_POST['tableName']);
    
    $value = getValue($tableName, $columnName, $searchKeyColName, $key);
    
    echo $value;
?>