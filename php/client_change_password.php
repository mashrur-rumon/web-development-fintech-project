<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/clientService.php');
    $userInformation = getUserInformation($_COOKIE['username']);

    $data = $_REQUEST['data'];
	$json = json_decode($data);

    $updatePassword = $json->updatePassword;
    $currentPassword = $json->currentPassword;
    $newPassword = $json->newPassword;
    $re_typeNewPassword = $json->re_typeNewPassword;

    if(isset($updatePassword)){

        if(!empty($currentPassword) and !empty($newPassword) and !empty($re_typeNewPassword)){
            
            if($currentPassword == $userInformation[0]['c_password']){
                
                if($newPassword == $re_typeNewPassword){
                    
                    if(updateClientPassword($_COOKIE['username'], $newPassword)){
                        
                        echo "Password Updated Successfully!";
                        
                    }else{echo "Failed to update Password!";}
                    
                }else{echo "new re-type password does not match!";}
                
            }else{echo "Current Password does not match!";}
            
        }else{echo "Missing Information";}
        
        
        
    }

    

?>