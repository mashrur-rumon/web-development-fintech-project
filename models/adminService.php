<?php

require_once('databaseConnect.php');




// insert info in admin while registration used in registrationCheck.php
function adminRegistration($name, $password, $username, $email, $gender, $dob)
{
    
    $sql = "insert into admin (a_name, a_password, a_username, a_email, a_gender, a_dob) values ('$name', '$password', '$username', '$email', '$gender', '$dob')";
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    
    if(mysqli_query($conn, $sql))
    {
        
        return true;
            
    }
    else
    {
        
        return false;
        
    }
    
}

// select form admin while showing username in adminHome in admin_home.php
function getUsersInformation($username)
{

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from admin where a_username = '$username'";
    $result = mysqli_query($conn, $sql);

    $userInfo =[];

    while($data = mysqli_fetch_assoc($result))
    {
        array_push($userInfo, $data);
    }

    return $userInfo;
}

// select from client for getting client id,name and blocking client in admin_set_client.php 
function getClientname()
{

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client";
    $data = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($data))
    {
        echo "<tr><td>". $row["c_id"] . "</td><td>". $row["c_name"]."</td><td><a href='../view/admin_assign_manager.php?id=".$row['c_id']."'>Assign</a></td><td><a href='../php/admin_ClientblockService.php?id=".$row['c_id']."'>Block</a></td><td><a href='../php/admin_client_unblock.php?id=".$row['c_id']."'>Unblock</a></td></tr>";
    }
    
}

// select from client for showing client table in admin_check_clientInfo.php and for updating info in admin_update_client.php
function getClientInfo()
{

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client";
    $data = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($data))
    {
        echo "<tr><td>". $row["c_id"] . "</td><td>". $row["c_name"]. "</td><td>". $row["c_username"] ."</td><td>".  $row["c_email"] . "</td><td>". $row["c_dob"]. "</td><td>". $row["c_gender"].  "</td></tr>";
    }
    
}

// select from client while showing client info for updating in admin_edit_clientInfo.php
function updateClientInfo()
{

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client";
    $data = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($data))
    {
        echo "<tr><td>". $row["c_id"] . "</td><td>". $row["c_name"]. "</td><td>". $row["c_username"] ."</td><td>".  $row["c_email"] . "</td><td>". $row["c_dob"]. "</td><td>". $row["c_gender"].  "</td><td><a href='../view/admin_update_client.php?id=".$row['c_id']."'>Update</a></td><td><a href='../php/admin_clientinfo_delete.php?id=".$row['c_id']."'>Delete</a></td></tr>";
    }
    
}

// select from client while getting clintInfo by id for updating client info in admin_update_client
function getClientInfoById($id)
{
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client where c_id = $id";
    $result = mysqli_query($conn, $sql);

    $userInfo =[];
    while($data = mysqli_fetch_assoc($result))
    {
        array_push($userInfo, $data);
    }

    return $userInfo;
    
}
// update client info while updating in admin_clientInfo_update.php
function updateClient($name, $username, $email, $dob, $gender, $id)
{
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "update client SET c_name='$name',c_username='$username',c_email='$email',c_dob='$dob',c_gender='$gender' where c_id=$id";
    
    if(mysqli_query($conn, $sql))
    {
        return true;
    }
    else
    {   
        return false;   
    }
}

// select from package while getting packageInfo by id for updating package info in admin_update_package
function getPackageInfoById($id)
{
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from package where p_id = $id";
    $result = mysqli_query($conn, $sql);

    $userInfo =[];
    while($data = mysqli_fetch_assoc($result))
    {
        array_push($userInfo, $data);
    }

    return $userInfo;
    
}

// select from package while showing oackage info for updating in admin_upgrade_package.php
function updatePackageInfo()
{

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from package";
    $data = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($data))
    {
        echo "<tr><td>". $row["p_id"] . "</td><td>". $row["p_name"]. "</td><td>". $row["p_duration"] ."</td><td>".  $row["p_price"] .  "</td><td><a href='../view/admin_update_package.php?id=".$row['p_id']."'>Update</a></td><td><a href='../php/admin_packageInfo_delete.php?id=".$row['p_id']."'>Delete</a></td></tr>";
    }
    
}

// update package info while updating package in admin_packageInfo_update.php
function updatePackage($name, $duration, $price, $id)
{
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "UPDATE package SET p_name='$name',p_duration='$duration',p_price='$price' where p_id=$id";
   
    if(mysqli_query($conn, $sql))
    {
        return true;
    }
    else
    {   
        return false;   
    }
}

// select all from manager to show manager table in approval page used in admin_set_manager.php
function getManagername()
{

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from manager where is_approved='true'";
    $data = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($data))
    {
        echo "<tr><td>". $row["m_id"] . "</td><td>". $row["m_name"]."</td><td><a href='../php/admin_manager_blockService.php?id=".$row['m_id']."'>Block</a></td><td><a href='../php/admin_manager_unblock.php?id=".$row['m_id']."'>Unblock</a></td></tr>";
    }
    
}

// select all from manager for approval used in admin_set_manager.php
function showApprovalManagerInfo()
{

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from manager where is_approved='false'";
    $data = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($data))
    {
        echo "<tr><td>". $row["m_id"] . "</td><td>". $row["m_name"]. "</td><td><a href='../php/admin_manager_approve.php?id=".$row['m_id']."'>Approve</a></td><td><a href='../php/admin_manager_decline.php?id=".$row['m_id']."'>Decline</a></td></tr>";
    }
    
}


// insert into vouchar to publish vouchar in admin_limit_vouchar.php
function publishVouchar($name, $date, $start_time, $end_time)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into vouchar (v_name, v_date, v_startTime, v_endTime) values ('$name', '$date', '$start_time', '$end_time')";

    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}

// insert into notice to publish notice in admin_notice_publish.php
function publishNotice($name, $date, $star_time, $end_time)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into notice (n_name, n_date, n_startTime, n_endTime) values ('$name', '$date', '$star_time', '$end_time')";

    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}

// select from package while showing oackage info for updating in admin_upgrade_package.php
function updateNoticeInfo()
{

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from notice";
    $data = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($data))
    {
        echo "<tr><td>". $row["n_id"] . "</td><td>". $row["n_name"]. "</td><td>". $row["n_date"] ."</td><td>".  $row["n_startTime"] . "</td><td>". $row["n_endTime"] . "</td><td><a href='../view/admin_update_notice.php?id=".$row['n_id']."'>Update</a></td><td><a href='../php/admin_delete_notice.php?id=".$row['n_id']."'>Delete</a></td></tr>";
    }
    
}


// select from notice while getting packageInfo by id for updating package info in admin_update_notice.php
function getNoticeInfoById($id)
{
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from notice where n_id = $id";
    $result = mysqli_query($conn, $sql);

    $userInfo =[];
    while($data = mysqli_fetch_assoc($result))
    {
        array_push($userInfo, $data);
    }

    return $userInfo;
    
}

//update notice in admin_notice_update.php
function updateNotice($name, $date, $start_time,$end_time, $id)
{
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "UPDATE notice SET n_name='$name',n_date='$date',n_startTime='$start_time',n_endTime='$end_time' where n_id=$id";
   
    if(mysqli_query($conn, $sql))
    {
        return true;
    }
    else
    {   
        return false;   
    }
}

//to assign manager used in php/admin_assign_manager.php
function assignManager($manager,$id)
{
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "UPDATE client SET c_assigned_manager='$manager' where c_id=$id";
   
    if(mysqli_query($conn, $sql))
    {
        return true;
    }
    else
    {   
        return false;   
    }
}


    
