<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/managerService.php');
    $userInformation = getManagerInformation($_SESSION['username']);

    if(isset($_REQUEST['updatePassword'])){
        
        echo "<center><fieldset><legend>Messeges</legend>";
        
        if(!empty($_REQUEST['currentPassword']) and !empty($_REQUEST['newPassword']) and !empty($_REQUEST['re-typeNewPassword'])){
            
            if($_REQUEST['currentPassword'] == $userInformation[0]['m_password']){
                
                if($_REQUEST['newPassword'] == $_REQUEST['re-typeNewPassword']){
                    
                    if(updateManagerPassword($_SESSION['username'], $_REQUEST['newPassword'])){
                        
                        echo "Password Updated Successfully!";
                        
                    }else{echo "Failed to update Password!";}
                    
                }else{echo "new re-type password does not match!";}
                
            }else{echo "Current Password does not match!";}
            
        }else{echo "Missing Information";}
        
        echo "</fieldset></center>";
        
    }

    

?>