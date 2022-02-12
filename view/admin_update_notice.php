<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
    }
    
    require_once('../models/adminService.php'); 
    
    $id = $_GET['id']; 
    $noticeInfoEdit = getNoticeInfoById($id);
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
                <form action="../php/admin_notice_update.php?id=<?=$noticeInfoEdit[0]['n_id']?>" method="post"> 
                <table>
                    <tr>
                        <th>Notice:</th>
                        <td><input type="text" name="name" value="<?=$noticeInfoEdit[0]['n_name']?>"></td>
                    </tr>
                    <tr>
                        <th>Date:</th>  
                        <td><input type="date" name="date" value="<?=$noticeInfoEdit[0]['n_date']?>"></td>      
                    </tr> 
                    <tr>
                        <th>Start Time:</th>  
                        <td><input type="time" name="start_time" value="<?=$noticeInfoEdit[0]['n_startTime']?>"></td>      
                    </tr>
                    <tr>
                        <th>End Time:</th>  
                        <td><input type="time" name="end_time" value="<?=$noticeInfoEdit[0]['n_endTime']?>"></td>      
                    </tr>
                    
                    
                </table> <br> <br> 
                <input align="centre" type="submit" name="submit" value="Update" />                       
                </form>
            </td>
        </tr>
    </table>
</body>

</html>