<?php
//include manager functionality
include_once("../models/managerService.php");

//Warn Client

if (isset($_REQUEST["warnClient"])) {
    $accountNo = $_REQUEST["c_accountNo"];
    warnClient($accountNo);
    header("Location: ../view/warning.php");
}


elseif (isset($_REQUEST["warnCoClient"])) {
    $accountNo = $_REQUEST["co_accountNo"];
     warnCoClient($accountNo);
    header("Location: ../view/warning.php");
}

?>