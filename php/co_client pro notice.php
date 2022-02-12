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
        
        if(!empty($_REQUEST['text']) and !empty($_REQUEST['Promotion']))
        {
            if(pro_notice($_REQUEST['text'], $_REQUEST['Promotion']))
            {   
                echo "Successfull!";
            }
            else
            {
                echo "Failed to sent Notice";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>