<?php
//include manager functionality
include_once("../models/managerService.php");

//Warn Client


if (isset($_REQUEST["ban"])) {
    $accountNo = $_REQUEST["c_accountNo"];
    markBanClient($accountNo);
    header("Location: ../view/ban.php");
}
elseif (isset($_REQUEST["co_ban"])) {
    $accountNo = $_REQUEST["co_accountNo"];
    markBanCoClient($accountNo);
    header("Location: ../view/ban.php");
    
}



//Warn Co-client
?>