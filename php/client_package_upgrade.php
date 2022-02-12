<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/clientService.php');
    
    if(isset($_REQUEST['basic'])){
        
        $package = "Basic";
        $price = 0;
        
        if(checkClientPackage($_COOKIE['username'], $package)==false){
            
            if(buyClientPackage($_COOKIE['username'], $package, $price)){
                
                transaction($_COOKIE['username'], "P-Basic", "Basic Package", $price);
                echo "Package upgraded";
                
            }else{echo "Failed to upgrade";}
            
        }else{echo "Package already active";}
        
    }

    elseif(isset($_REQUEST['pro'])){
        
        $package = "Pro";
        $price = 500;
        
        if(checkClientPackage($_COOKIE['username'], $package)==false){
            
            if(buyClientPackage($_COOKIE['username'], $package, $price)){
                
                transaction($_COOKIE['username'], "P-Pro", "Pro Package", $price);
                echo "Package upgraded";
                
            }else{echo "Failed to upgrade";}
            
        }else{echo "Package already active";}
        
    }

    elseif(isset($_REQUEST['ultimate'])){
        
        $package = "Ultimate";
        $price = 1000;
        
        if(checkClientPackage($_COOKIE['username'], $package)==false){
            
            if(buyClientPackage($_COOKIE['username'], $package, $price)){
                
                transaction($_COOKIE['username'], "P-Ultimate", "Ultimate Package", $price);
                echo "Package upgraded";
                
            }else{echo "Failed to upgrade";}
            
        }else{echo "Package already active";}
        
    }

    

?>