<?php
//include manager functionality
include_once("../models/managerService.php");

if (isset($_REQUEST[""])) {
    $clientList = $_REQUEST[""];
    getClientList($transectionNo,$decision);
   header("Location: ../view/view_client_list.php");

}
?>