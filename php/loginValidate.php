<?php

require_once('../models/databaseConnect.php');
require_once('../models/clientService.php');
require_once('../models/managerService.php');


if(isset($_REQUEST['submit'])){
    
    
    
    if(!empty($_REQUEST['username']) and !empty($_REQUEST['password'])){
     
        if(userValidate($_REQUEST['username'], $_REQUEST['password'])){
            
            if($_SESSION['userType']=="Client"){
                
                $userInformation = getUserInformation($_SESSION['username']);
                
                if($userInformation[0]['is_blocked'] == "true"){
                    
                    echo "Your account is blocked!";
                    
                }else{echo "Client Valid";}
                
                
            }
            
            elseif($_SESSION['userType']=="Admin")
                {
                    
                    echo "Admin Valid";
                    
                }

                elseif($_SESSION['userType']=="Manager")
                {
                    
                    $managerInformation = getUserssInformation($_REQUEST['username']);
                    
                    if($managerInformation[0]['is_approved'] == "false")
                    {
                        
                        echo "Your account is not approved!";
                        
                    }
                    elseif($managerInformation[0]['is_blocked'] == "true")
                    {
                        
                        echo "Your account is blocked!";
                        
                    }
                    else
                    {
    
                        echo "Manager Valid";                   
                    
                    }
                
                }
            elseif($_SESSION['userType']=="Co-Client"){
                
                echo "Co-Client Valid";
            }
            
        }else{echo "Invalid credentials";}
  
    }
    
    else{
        
        echo "Missing Information";
        
    }
    
}

else{
    
    header('location: ../index.php');
    
}



?>