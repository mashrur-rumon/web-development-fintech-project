<?php

session_start();
if(!isset($_SESSION['username']))
{
    header('location: ../index.php');
}

require_once('../models/databaseConnect.php');
require_once('../models/adminService.php'); 

$id = $_GET['id']; 

$conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "update client set is_blocked = 'false' where c_id = $id";

    if(mysqli_query($conn, $sql))
    { 
        echo "Client Unblocked";
    }
    else
    {
        echo "Error Unblocking record"; 
    }

?>