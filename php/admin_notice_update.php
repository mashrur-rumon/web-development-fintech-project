<?php
	session_start();
    if(!isset($_SESSION['username']))
    {
		header('location: ../index.php');
    }
    
    require_once('../models/adminService.php'); 
     
    
    $id = $_GET['id'];
       
    if(isset($_REQUEST['submit']))
    {  
        echo "<center><fieldset><legend>Messeges</legend>";
        
        if(!empty($_REQUEST['name']) and !empty($_REQUEST['date']) and !empty($_REQUEST['start_time']) and !empty($_REQUEST['end_time']))
        {
            if(updateNotice($_REQUEST['name'], $_REQUEST['date'], $_REQUEST['start_time'],$_REQUEST['end_time'],$id))
            {   
                echo "Notice updated!";
            }
            else
            {
                echo "Failed to update notice";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>