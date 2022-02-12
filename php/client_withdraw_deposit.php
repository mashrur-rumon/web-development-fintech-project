<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/clientService.php');

    if(isset($_REQUEST['withdraw'])){
        
        if(!empty($_REQUEST['withdraw_amount'])){
            
            
            $withdrawAmount = intval($_REQUEST['withdraw_amount']);
            
            if($withdrawAmount <= 0){
                echo "Can not be negative amount";
                
            }
            
            else{
                
                if(withdrawMoney($_COOKIE['username'], $_REQUEST['withdraw_amount'])){
                    
                    transaction($_COOKIE['username'], "W", "Withdraw", $_REQUEST['withdraw_amount']);
                    
                    echo "Successfully withdrawn";
                    
                }
                
                else{
                    
                    
                    echo "Failed to withdraw";
                    
                }
                
            }
            
        }else{echo "amount is empty";}
        
        
        
    }


    if(isset($_REQUEST['deposit'])){
        
        if(!empty($_REQUEST['deposit_amount'])){
            
            $depositAmount = intval($_REQUEST['deposit_amount']);
            
            if($depositAmount <= 0){

                echo "Can not be negative amount";
                
            }
            
            else{
                
                if(depositMoney($_COOKIE['username'], $_REQUEST['deposit_amount'])){
                    
                    transaction($_COOKIE['username'], "D", "Deposite", $_REQUEST['deposit_amount']);
                    
                    echo "Deposited successfully";
                    
                    
                }else{

                    echo "Failed to deposit";
                    
                    
                }
                
            }
            
        }else{echo "amount is empty";}
        
        
        
    }

?>