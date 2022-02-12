<?php

session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/clientService.php');

if(isset($_REQUEST['submit'])){

    $productId = $_REQUEST['p_id'];
    $productPrice = intval($_REQUEST['p_price']);
    
    if(isset($_REQUEST['checkbox'])){
        
        $productPrice = $productPrice - 50;
        
        if(voucher($_COOKIE['username'])==false)
        {echo "You don't have any voucher";
        $productPrice = intval($_REQUEST['p_price']);}
        
        if(buyOfferedProduct($_COOKIE['username'], $productId, $productPrice)){

            echo "Transaction Successful";
            
        }else{
            
            echo "Transaction Failed";
            
        }
        
    }else{
        
    
        if(buyOfferedProduct($_COOKIE['username'], $productId, $productPrice)){

            echo "Transaction Successful";
            
        }else{
            
            echo "Transaction Failed";
            
        }
        
    }
    
}

?>