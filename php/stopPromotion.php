<?php
//include manager functionality
include_once("../models/managerService.php");
  if(isset($_REQUEST["stopPromotion"])){

  	$accountNo = $_REQUEST["accountNumber"];
  	 stopPromotion($accountNo);
  	 header("Location: ../view/manager_stopPromotion.php");
  }
?>