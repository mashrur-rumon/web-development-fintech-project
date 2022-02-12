<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/clientService.php');
    $userInformation = getUserInformation($_COOKIE['username']);

    $data = $_REQUEST['data'];
	$json = json_decode($data);

    $submit = $json->submit;
    $name = $json->name;
    $email = $json->email;
    $dob = $json->dob;

    if(isset($submit)){
  
        if(!empty($name) and !empty($email) and !empty($dob)){
            
            $test = explode(" ", $name);
            if(count($test) >= 2){
                
                $pattern = array('<', ',', '>', '/', '?', '"', "'", ';', ':', ']', '[', '|', '}', '{', '=', '+',
                            '_', ')', '(', '*', '&', '^', '%', '$', '#', '@', '!', '`', '~', '0', '1', '2', '3', 
                            '4', '5', '6', '7', '8', '9');
            
            for($i = 0; $i < count($pattern); $i++){
                
                if(strpos($name, $pattern[$i])==true){
                    echo "Invalid Name";
                    break;
                }
                
            }
                if(strpos($email, "@")){
            
                    if(updateClientInformation($name, $email, $dob, $userInformation[0]['c_id'])){
                
                echo "User information updated!";
                
            }else{echo "Failed to update user information";}
                        
                    }else{
                        
                        echo "Invalid Email";
                        
                    }

            }
            else{echo "Invalid Name";}
            
            
            
        }else{echo "Missing Information";}
        
        
        
    }

?>