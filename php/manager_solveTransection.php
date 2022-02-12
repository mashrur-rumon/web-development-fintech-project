<?php
//include manager functionality
include_once("../models/managerService.php");

if (isset($_REQUEST["c_transaction"])) {
    $transectionNo = $_REQUEST["c_transactionNumber"];
    $decision = $_REQUEST["decision"];
    transactionApproval($transectionNo,$decision);
   header("Location: ../view/transaction.php");

}
?>