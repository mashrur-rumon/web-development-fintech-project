<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/managerService.php');
    $managerInformation = getManagerInformation($_SESSION['username']);

    if(isset($_REQUEST['submit'])){
        
        echo "<center><fieldset><legend>Messeges</legend>";
        
        if(!empty($_REQUEST['name']) and !empty($_REQUEST['email']) and !empty($_REQUEST['dob'])){
            
            if(updateManagerInformation($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['dob'], $managerInformation[0]['m_id'])){
                
                echo "User information updated!";
                
            }else{echo "Failed to update user information";}
            
        }else{echo "Missing Information";}
        
        echo "</fieldset></center>";
        
    }

?>