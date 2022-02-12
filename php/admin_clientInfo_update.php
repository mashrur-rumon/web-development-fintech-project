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
        
        if(!empty($_REQUEST['name']) and !empty($_REQUEST['username']) and !empty($_REQUEST['email']) and !empty($_REQUEST['dob']) and !empty($_REQUEST['gender']))
        {
            if(updateClient($_REQUEST['name'], $_REQUEST['username'], $_REQUEST['email'],$_REQUEST['dob'],$_REQUEST['gender'],$id))
            {   
                echo "User information updated!";
            }
            else
            {
                echo "Failed to update user information";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>




