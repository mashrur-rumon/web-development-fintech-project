<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/clientService.php');

    $data = $_REQUEST['data'];
	$json = json_decode($data);

    $submit = $json->submit;
    $accountName = $json->accountName;
    $accountNo = $json->accountNo;

    if(isset($submit)){
        
        
        
        if(!empty($accountNo)){
            
            if(strlen($accountNo) != 10){
                
                echo "Invalid Account Number";
                
            }else{
                
                if(checkBillingAccount($_COOKIE['username'], $accountName)){
                    
                    echo "Failed to add billing account";
                    
                }else{
                    
                    if(addBillingAccount($_COOKIE['username'], $accountNo, $accountName)){
                
                        echo "Billing Account Added";
                
                    }else{echo "Failed to add billing account";}
                    
                }
                
                
                
            }
    
            
        }else{echo "Missing Information";}
        
        
        
    }

?>