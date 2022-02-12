<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}
   require_once('../models/co_clientService.php');
   $userInformation = GetUserInformations($_SESSION['username']);
    

?>


<!DOCTYPE html>
<html>
<head>
    <meta>
    <title>E-Pocket Banking System - Co-Client - Promotional Details</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/co-client/promotion_details.css" />
</head>
<body>

<div id="container">
  
    
    <table width="100%">

        <tr>

            <td><a href="co_client_home.php"><img src="../assets/gallery/logo.jpg" alt="Logo" width="420px"></a></td>
            <td align="right"><a class="selected"  href="../php/logout.php">
                    Logout
                </a>&nbsp;&nbsp;
                <a href="about.html" target="_blank">
                    About
                </a></td>

        </tr>
      

    </table><br><br><br>
    
    <center>
 
    <div id="header">
    
		
        
        
        
      </div>
        <table border="1" width="40%">
        
        
        
        <tr>
            
            <td>
            
                <h3>Welcome,<?=$userInformation[0]['username']?></h3>
                <ul>
           
                    
                    <li><a href="promotion_details.php">All Promotions Details</a></li>
                    <li><a href="set_or_delete_product.php">Set or Delete Product</a></li>
                    <li><a href="set_number.php">Set The Number of product</a></li>
                    <li><a href="stop_promotion.php">Stop Promotion</a></li>
                    <li><a href="highlight_a_promotion.php">Highlight a Promotion</a></li>
                    <li><a href="direct_buy.php">Direct Buy</a></li>
                    <li><a href="hide_promotion.php">Hide a Promotion</a></li>
                    <li><a href="resize_promotion.php">Resize Promotion</a></li>
                    <li><a href="promotional_notice.php">Promotional Notice</a></li>
                    <li><a href="time_limit.php">Set a Time Limit</a></li>
                    
                </ul>
                
            </td>
            
            
            <td align="center">
                <div id="main">
                
            <p>Total Promotion : <?=$userInformation[0]['t_promotion']?> </p>
                <p>Active Promotions: <?=$userInformation[0]['a_promotion']?> </p>
                <p>Hided Promotions : <?=$userInformation[0]['h_promotion']?> </p>
                <p>Highlight Products : <?=$userInformation[0]['h_products']?> </p>
                <p>Deleted Promotions : <?=$userInformation[0]['del_promotion']?> </p>
                
            </td>
           </div>
        </tr>
        
    </table>
 
    </center>
    <div id="footer">

    </div>
</div>
</body>
</html>