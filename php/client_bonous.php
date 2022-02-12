<?php
//include manager functionality
include_once("../models/managerService.php");

if(isset($_REQUEST["c_bonous"])){
   $accountNumber=$_REQUEST["c_accountNumber"];
   $c_bonousAmount=$_REQUEST["c_bonousAmount"];
    bonousClient($accountNumber, $c_bonousAmount);
   header("Location: ../view/manager_bonous.php");
   //echo "sucess";
  }
  elseif(isset($_REQUEST["co_bonous"])){
   $accountNumber=$_REQUEST["co_accountNumber"];
   $co_bonousAmount=$_REQUEST["co_bonousAmount"];
    bonousCoClient($accountNumber, $co_bonousAmount);
   header("Location: ../view/manager_bonous.php");
   //echo "sucess";
  }
?>