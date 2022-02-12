<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location: ../index.php');
    }
    
    require_once('../models/co_clientService.php'); 
    
    
       
    if(isset($_REQUEST['submit']))
    {  
        echo "<center><fieldset><legend>Messeges</legend>";
        
        if(show($_REQUEST['name'], $_REQUEST['product']))
        {
            if(delete($_REQUEST['name'], $_REQUEST['product']))
            {   
                echo "Promotion Deleted Successfully !";
            }
            else
            {
                echo "Failed to Delete";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>