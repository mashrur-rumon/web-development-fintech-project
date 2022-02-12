<?php
	session_start();
    if(!isset($_SESSION['username']))
    {
		header('location: ../index.php');
    }
    
    require_once('../models/adminService.php'); 
    require_once('../models/clientService.php'); 
    
    $id = $_GET['id'];
       
    if(isset($_REQUEST['submit']))
    {  
        echo "<center><fieldset><legend>Messeges</legend>";
        
        if(!empty($_REQUEST['name']) and !empty($_REQUEST['duration']) and !empty($_REQUEST['price']))
        {
            if(updatePackage($_REQUEST['name'], $_REQUEST['duration'], $_REQUEST['price'],$id))
            {   
                echo "Package information updated!";
            }
            else
            {
                echo "Failed to update Package information";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>