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
        
        if(!empty($_REQUEST['name']) and !empty($_REQUEST['Promotion']))
        {
            if(stop_pro($_REQUEST['name'], $_REQUEST['Promotion']))
            {   
                echo "Promotion Stopped !";
            }
            else
            {
                echo "Failed to Stop";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>