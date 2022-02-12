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
    $sql = "delete from notice where n_id = $id";

    if(mysqli_query($conn, $sql))
    {
    
        echo "Notice Deleted";
    }
    else
    {
        echo "Error Deleting notice"; 
    }

?>