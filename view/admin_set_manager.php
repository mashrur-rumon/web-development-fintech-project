<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/adminService.php');
    $userInformation = getUsersInformation($_SESSION['username']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Pocket Banking System - Admin - Home</title>
    <link rel="stylesheet" href="../assets/css/admin/style.css">
</head>
<body>
    
     <!-- Navbar -->
     <ul class="navbar">
        <li class="navbar-list">
            <a href="admin_home.php"><img src="../assets/gallery/logo.jpg" alt="Logo" class="logo"></a>
        </li>
        <li class="navbar-list right">
            <a href="../php/logout.php">Logout</a>
        </li>
        <li class="navbar-list right">
            <a href="about.html" target="_blank">About</a>
        </li>
    </ul>
    <!-- Navbar end -->

    <!-- Sidebar -->
    <ul class="sidebar" >
        <li class="sidebar-list"><a href="admin_home.php">Home</a></li>
        <li class="sidebar-list"><a class="active" href="admin_set_manager.php">Set Manager</a></li>
        <li class="sidebar-list"><a href="admin_set_client.php">Set Client</a></li>
        <li class="sidebar-list"><a href="admin_edit_clientInfo.php">Edit Client info</a></li>
        <li class="sidebar-list"><a href="admin_upgrade_package.php">Upgrade Package</a></li>
        <li class="sidebar-list"><a href="admin_check_clientInfo.php">Check Client info</a></li>
        <li class="sidebar-list"><a href="admin_limit_voucher.php">Limit Voucher</a></li>
        <li class="sidebar-list"><a href="admin_create_notice.php">Create Notice</a></li>
    </ul>
    <!-- Sidebar end -->
    
    <!-- container -->
    <div class="container">
        <p class="table-header">Manager Set</p>      
        <table border="1" width="100%" id="table">
            <th>Manager id</th>
            <th>Manager name</th>
            <th>Block</th>
            <th>Unblock</th>
                <?php getManagername(); ?>             
        </table><br> <br> 
        <p class="table-header">Manager Approval</p>
        <table border="1" width="100%" id="table">                                        
            <th>Manager id</th>
            <th>Manager name</th>
            <th>Approve</th>
            <th>Decline</th>                                          
                <?php showApprovalManagerInfo(); ?>                       
        </table>           
    </div>
    <!-- container end -->
    
</body>
</html>