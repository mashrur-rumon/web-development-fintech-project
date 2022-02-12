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
        
        if(!empty($_REQUEST['number']) and !empty($_REQUEST['c_cat']))
        {
            if(limit($_REQUEST['number'], $_REQUEST['c_cat']))
            {   
                echo "Limit Set !";
            }
            else
            {
                echo "Limit Set Failed";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>