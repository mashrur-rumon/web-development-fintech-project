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
        
        if(!empty($_REQUEST['manager']))
        {
            if(assignManager($_REQUEST['manager'],$id))
            {   
                echo "Manager Assined!";
            }
            else
            {
                echo "Failed to Assign manager";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>
       
    



<!-- // if(isset($_REQUEST['submit']))
    // {  
    //     echo "<center><fieldset><legend>Messeges</legend>";
        
    //     if(!empty($_REQUEST['manager']))
    //     {
    //         if(assignManager($_REQUEST['manager']))
    //         {   
    //             echo "Manager Assigned!";
    //         }
    //         else
    //         {
    //             echo "Failed to Assign Manager";
    //         }
    //     }
    //     else
    //     {
    //         echo "Missing Information";
    //     }
    //     echo "</fieldset></center>";
    // }  -->