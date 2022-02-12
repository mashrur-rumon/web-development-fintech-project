<?php
//include manager functionality
include_once("../models/managerService.php");

if(isset($_REQUEST["c_voucher"])){
   $accountNumber=$_REQUEST["c_accountNumber"];
   $c_voucherAmount=$_REQUEST["c_voucherAmount"];
   $status = voucherClient($accountNumber, $c_voucherAmount);
   header("Location: ../view/voucher.php?status=" . $accountNumber);
   //echo "sucess";
  }

if(isset($_REQUEST["co_voucher"])){
   $accountNumber=$_REQUEST["co_accountNumber"];
   $co_voucherAmount=$_REQUEST["co_voucherAmount"];
   voucherCoClient($accountNumber, $co_voucherAmount);
   header("Location: ../view/voucher.php");
   //echo "sucess";
  }

?>