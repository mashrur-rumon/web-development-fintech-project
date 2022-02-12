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
        
        if(!empty($_REQUEST['product']) and !empty($_REQUEST['number']))
        {
            if(Directbuy($_REQUEST['product'], $_REQUEST['number']))
            {   
                echo "Ordered Successfully !";
            }
            else
            {
                echo "Failed to Order";
            }
        }
        else
        {
            echo "Missing Information";
        }
        echo "</fieldset></center>";
    } 
?>