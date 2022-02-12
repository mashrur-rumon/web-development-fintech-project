<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
    }
    
    require_once('../models/adminService.php'); 
    
    $id = $_GET['id']; 
    $userInfoEdit = getClientInfoById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Info</title>
</head>
<link rel="stylesheet" href="../assets/css/admin/style.css">
<body>
    <table width="100%" id="table">
        <tr>
            <td align="center">
                <form action="../php/admin_clientInfo_update.php?id=<?=$userInfoEdit[0]['c_id']?>" method="post"> 
                    <table>
                        <tr>
                            <th>Name:</th>
                            <td><input type="text" name="name" value="<?=$userInfoEdit[0]['c_name']?>"></td>
                        </tr>
                        <tr>
                            <th>Username:</th>  
                            <td><input type="text" name="username" value="<?=$userInfoEdit[0]['c_username']?>"></td>      
                        </tr> 
                        <tr>
                            <th>Email:</th>  
                            <td><input type="text" name="email" value="<?=$userInfoEdit[0]['c_email']?>"></td>      
                        </tr>
                        <tr>
                            <th>Date of Birth:</th>  
                            <td><input type="date" name="dob" value="<?=$userInfoEdit[0]['c_dob']?>"></td>      
                        </tr>
                        <tr>
                            <th>Gender:</th>  
                            <td><input type="text" name="gender" value="<?=$userInfoEdit[0]['c_gender']?>"></td>      
                        </tr>                  
                    </table> <br> <br> 
                <input align="centre" type="submit" name="submit" value="Update" />                       
                </form>
            </td>
        </tr>
    </table>
</body>

</html>