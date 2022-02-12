<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    if(!isset($_COOKIE['username'])){
        
        session_destroy();
        header('location: ../index.php');
    }

    require_once('../models/clientService.php');
    $userInformation = getUserInformation($_SESSION['username']);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Pocket Banking System - Client - Client Packages</title>
    <script src="https://kit.fontawesome.com/c3f4e46332.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/client/navigation.css">
    <link rel="stylesheet" href="../assets/css/client/package.css">
</head>
<body>
    
    <div class="navbar">
        <div class="nav-logo-section">
            <a href="client_home.php"><img src="../assets/gallery/logo.jpg" alt="Logo" width="300px"></a>
        </div>
        <div class="nav-link-section">
            <ul>
                <li><a href="../php/logout.php"><i class="fas fa-door-open">Logout</i></a></li>
            </ul>
        </div>
    </div>


    <div class="page-navigation">

        <div class="block" style="background-color: black; height: 30px;"></div>
        <a href="view_client_profile.php">View Profile <i class="fas fa-angle-double-right"></i></a>
        <a href="edit_client_profile.php">Edit Profile <i class="fas fa-angle-double-right"></i></a>
        <a href="client_billing_account.php">Add Billing Accounts <i class="fas fa-angle-double-right"></i></a>
        <a href="client_packages.php">Upgrade Package <i class="fas fa-angle-double-right"></i></a>
        <a href="client_products.php">Invest Product <i class="fas fa-angle-double-right"></i></a>
        <a href="client_withdraw_deposit.php">Withdraw/Deposit <i class="fas fa-angle-double-right"></i></a>
        <a href="client_transaction.php">Transaction History <i class="fas fa-angle-double-right"></i></a>
        <a href="client_flexiload.php">Flexiload <i class="fas fa-angle-double-right"></i></a>
        <a href="client_offers.php">Offers <i class="fas fa-angle-double-right"></i></a>
        <a href="client_manage_stock_products.php">Manage Stocks <i class="fas fa-angle-double-right"></i></a>
        <a href="client_change_password.php">Change Password <i class="fas fa-angle-double-right"></i></a>

    </div>

    <div class="page-content">

        <h1 id="page-title">Choose Package Plan</h1>

        <form>
           
           <div class="box">
               
               <div class="title">
                   
                   <h1>BASIC</h1>
                   
                   </div>
                   
                   <div class="info">
                       
                       <p>Voucher: 0/month</p>
                       <p>Price: 0 BDT</p>
                       <input type="button" name="basic" id="Basic" value="Upgrade" onclick="upgradeBasicPackage()">
                       
                   </div>
                   
               
               
           </div>
           
           <div class="box">
               
               <div class="title">
                   
                   <h1>PRO</h1>
                   
                   </div>
                   
                   <div class="info">
                       
                       <p>Voucher: 7/month</p>
                       <p>Price: 500 BDT</p>
                       <input type="button" name="pro" id="Pro" value="Upgrade" onclick="upgradeProPackage()">
                       
                   </div>
                   
               
               
           </div>
           
           <div class="box">
               
               <div class="title">
                   
                   <h1>ULTIMATE</h1>
                   
                   </div>
                   
                   <div class="info">
                       
                       <p>Voucher: 12/month</p>
                       <p>Price: 1000 BDT</p>
                       <input type="button" name="ultimate" id="Ultimate" value="Upgrade" onclick="upgradeUltimatePackage()">
                       
                   </div>
                   
               
               
           </div>
           
            <h2 id="response"></h2>
        </form>




    </div>
    
    <script type="text/javascript" src="../assets/scripts/clientScript.js"></script>
    
</body>
</html>