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
                <form action="../php/admin_assign_manager.php?id=<?=$userInfoEdit[0]['c_id']?>" method="post"> 
                    <table>
                        <tr>
                            <th>Manager:</th>  
                            <td><input type="text" name="manager" value="<?=$userInfoEdit[0]['c_assigned_manager']?>"></td>      
                        </tr> 
                                         
                    </table> <br> <br> 
                <input align="centre" type="submit" name="submit" value="Submit" />                   
                </form>
            </td>
        </tr>
    </table>
</body>

</html>