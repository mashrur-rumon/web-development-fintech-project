<?php

require_once('../models/clientService.php');
require_once('../models/managerService.php');
require_once('../models/adminService.php');
require_once('../models/co_clientService.php');


if(isset($_REQUEST['submit'])){
    
    
    
    if(!empty($_REQUEST['name']) and !empty($_REQUEST['username']) and !empty($_REQUEST['email']) and !empty($_REQUEST['password']) and !empty($_REQUEST['confirmPassword']) and !empty($_REQUEST['dateofBirth']) and !empty($_REQUEST['genderRadio']) and !empty($_REQUEST['userRadio'])){
        
        if($_REQUEST['password']==$_REQUEST['confirmPassword']){
            
            $test = explode(" ", $_REQUEST['name']);
            if(count($test) >= 2){
                
                $pattern = array('<', ',', '>', '/', '?', '"', "'", ';', ':', ']', '[', '|', '}', '{', '=', '+',
                            '_', ')', '(', '*', '&', '^', '%', '$', '#', '@', '!', '`', '~', '0', '1', '2', '3', 
                            '4', '5', '6', '7', '8', '9');
            
            for($i = 0; $i < count($pattern); $i++){
                
                if(strpos($_REQUEST['name'], $pattern[$i])==true){
                    echo "Invalid Name";
                    break;
                }
                
            }
              
                if(strpos($_REQUEST['username'], " ")){
                    echo "Invalid username";
                }
                
                else{
                    
                    if(strpos($_REQUEST['email'], "@")){
                        
                        if($_REQUEST['userRadio']=="Client"){
                        
                        if(userRegistration($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['userRadio'])){
                            
                            if(clientRegistration($_REQUEST['name'], $_REQUEST['password'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['genderRadio'], $_REQUEST['dateofBirth'])){
                                
                                echo "Registration Completed!";
                                
                            }else{echo "Registration Failed";}
                            
                        }else{echo "Username Taken";}
                        
                    }
                        
                        elseif($_REQUEST['userRadio']=="Manager"){
                        
                        if(userRegistration($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['userRadio'])){
                            
                            if(managerRegistration($_REQUEST['name'], $_REQUEST['password'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['genderRadio'], $_REQUEST['dateofBirth'])){
                                
                                echo "Registration Completed!";
                                
                            }else{echo "Registration Failed";}
                            
                        }else{echo "Username Taken";}
                        
                    }
                        
                        elseif($_REQUEST['userRadio']=="Admin") 
                    {
                        if(userRegistration($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['userRadio']))
                        {
                            
                            if(adminRegistration($_REQUEST['name'], $_REQUEST['password'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['genderRadio'], $_REQUEST['dateofBirth']))
                            {
                                echo "Registration Completed!";    
                            }
                            else
                            {
                                echo "Registration Failed";
                            }
                        }else{echo "Username Taken";}    
                    }
                        
                        elseif($_REQUEST['userRadio']=="Co-Client"){
                        
                        if(userRegistration($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['userRadio'])){
                            
                            if(co_clientRegistration($_REQUEST['name'], $_REQUEST['password'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['genderRadio'], $_REQUEST['dateofBirth'])){
                                
                                echo "Registration Completed!";
                                
                            }else{echo "Registration Failed";}
                            
                        }else{echo "Username Taken";}
                        
                    }
                        
                        
                        
                    }else{
                        
                        echo "Invalid Email";
                        
                    }
                    
                    
                    
                }
                
            }
            else{echo "Invalid Name";}
            
            
        }
        
        else{
            
            echo "Password did not match";
            
            
        }
        
    }
    
    else{
        
        echo "Missing information";
        
        
    }
    
}

else{
    
    header('location: ../view/registration.php');
    
}

?>
