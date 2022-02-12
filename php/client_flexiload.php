<?php

session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/clientService.php');

    $data = $_REQUEST['data'];
	$json = json_decode($data);

    $flexiload = $json->flexiload;
    $phoneNumber = $json->phoneNumber;
    $flexiAmount = $json->flexiAmount;

if(isset($flexiload)){
    
    if(!empty($phoneNumber) and !empty($flexiAmount)){
        
        if(strlen(strval($phoneNumber)) != 11){
            
            echo "Invalid phone number";
            
        }else{
            
            if(intval($flexiAmount) <= 0){
                
                echo "Invalid Amount";
                
            }else{
                
                if(flexiload($_COOKIE['username'], "F", strval($phoneNumber), intval($flexiAmount))){
                    
                    echo "Flexiload Successful";
                    
                }else{
                    
                    echo "Failed to flexiload";
                    
                }
                
            }
            
        }
        
    }
    
}


?>