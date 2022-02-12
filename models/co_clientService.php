<?php
require_once('databaseConnect.php');



 function co_clientRegistration($name, $password, $username, $email, $gender, $dob)
 {
    
    $sql = "INSERT INTO `co-client` (name, password, username, email, gender,dob) values ('$name', '$password', '$username', '$email', '$gender', '$dob')";
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    
    if(mysqli_query($conn, $sql))
    {
        
        return true;
        
        
    }
    else{
        
        return false;
        
    }

 }

 
 

 


 function GetUserInformations($username){

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "SELECT * FROM `co-client` where username = '$username'";
    $result = mysqli_query($conn, $sql);

    $userInfo =[];

    while($data = mysqli_fetch_assoc($result)){
        array_push($userInfo, $data);
    }

    return $userInfo;
  
 
  function promotion_set_delete( $name,$product,$p_price)
  {
    $conn = getConnection('localhost', 'root',  'e_pocket_system');
    $sql ="insert into set_and_delete (name,product, p_price) values ('$name','$product', '$p_price')";
  }

  if(mysqli_query($conn, $sql))
  {
      
      return true;    
      
  }
  else
  {
      
      return false;
      
  }
  
 }

 function setTime($name, $date, $start_time, $end_time)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into timeset (v_name, v_date, v_startTime, v_endTime) values ('$name', '$date', '$start_time', '$end_time')";
 
    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}

function limit($number, $c_cat)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into co_limit (number, c_cat) values ('$number', '$c_cat')";
 
    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}

function stop_pro($name, $Promotion)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into co_stop (name, Promotion) values ('$name', '$Promotion')";
 
    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}

function highlight($text, $Promotion)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into co_highlight (text, Promotion) values ('$text', '$Promotion')";
 
    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}

function Directbuy($product, $number)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into co_direct_buy (product, number) values ('$product', '$number')";
 
    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}


function Hide($Promotion)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into co_hide (Promotion) values ('$Promotion')";
 
    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }

}

function pro_notice($text, $Promotion)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into co_notice (text, Promotion) values ('$text', '$Promotion')";
 
    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}

function set($name, $product,$p_price)
{
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into co_delete (name, product,p_price) values ('$name','$product','$p_price')";
 
    if(mysqli_query($conn, $sql))
    {
        
        return true;    
        
    }
    else
    {
        
        return false;
        
    }
    
}





?>