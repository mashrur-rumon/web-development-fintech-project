<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
    }
    
    require_once('../models/adminService.php'); 
    
    $id = $_GET['id']; 
    $packageInfoEdit = getPackageInfoById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Package</title>
</head>
<link rel="stylesheet" href="../assets/css/admin/style.css">
<body>
    <table width="100%" id="table">
        <tr>
            <td align="center">
                <form action="../php/admin_packageInfo_update.php?id=<?=$packageInfoEdit[0]['p_id']?>" method="post"> 
                <table>
                    <tr>
                        <th>Package:</th>
                        <td><input type="text" name="name" value="<?=$packageInfoEdit[0]['p_name']?>"></td>
                    </tr>
                    <tr>
                        <th>Duration:</th>  
                        <td><input type="text" name="duration" value="<?=$packageInfoEdit[0]['p_duration']?>"></td>      
                    </tr> 
                    <tr>
                        <th>Price:</th>  
                        <td><input type="text" name="price" value="<?=$packageInfoEdit[0]['p_price']?>"></td>      
                    </tr>
                    
                    
                </table> <br> <br> 
                <input align="centre" type="submit" name="submit" value="Update" />                       
                </form>
            </td>
        </tr>
    </table>
</body>

</html>