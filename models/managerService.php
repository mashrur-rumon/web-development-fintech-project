<?php
require_once('databaseConnect.php');

function managerRegistration($name, $password, $username, $email, $gender, $dob){
    
    $sql = "insert into manager (m_name, m_password, m_userName, m_email, m_gender, m_dob) values ('$name', '$password', '$username', '$email', '$gender', '$dob')";
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    
    if(mysqli_query($conn, $sql)){
        
        return true;
        
        
    }
    else{
        
        return false;
        
    }
    
}

function getManagerInformation($username){

		$conn = getConnection('localhost', 'root', '', 'e_pocket_system');
		$sql = "select * from manager where m_userName = '$username'";
		$result = mysqli_query($conn, $sql);

		$userInfo =[];

		while($data = mysqli_fetch_assoc($result)){
			array_push($userInfo, $data);
		}

		return $userInfo;
	}

	function updateManagerInformation($name, $email, $dob, $id){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "update manager set m_name = '$name', m_email = '$email', m_dob = '$dob' where m_id = $id";
    
    if(mysqli_query($conn, $sql)){
        
        return true;
        
    }
    
    else{
        
        return false;
        
    }
    
}

function updateManagerPassword($username, $password){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "update manager set m_password = '$password' where m_userName = '$username'";
    
    if(mysqli_query($conn, $sql)){
        
        $sql2 = "update login set password = '$password' where userName = '$username'";
        mysqli_query($conn, $sql2);
        return true;
        
        
    }
    
    else{
        
        return false;
        
    }
}
function warnClient($c_username)
{
   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');

   $sql= "update client set warning='true' where c_username='$c_username'";
   mysqli_query($conn, $sql);
}

function warnCoClient($co_userName)
{
   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');

   $sql= "update coClient set co_warning='true' where co_userName='$co_userName'";
   mysqli_query($conn, $sql);
}

function markBanClient($c_username)
{
   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');

   $sql= "update client set markBan='true' where c_username='$c_username'";
   mysqli_query($conn, $sql);
}

function markBanCoClient($co_username)
{
   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');

   $sql= "update coClient set co_markBan='true' where co_userName='$co_username'";
   mysqli_query($conn, $sql);
}

function voucherClient($c_username,$c_voucher)
{
   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
  
  $userQuery = "select * from client where c_username = '$c_username'";
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult);
    $voucher = intval($userData['vouchers']);
    $totalVoucher = $voucher + intval($c_voucher);   
      $sql = "update client set vouchers='$totalVoucher' where c_username='$c_username'";
 mysqli_query($conn, $sql);
}

function voucherCoClient($co_username,$co_voucher)
{
   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
  $userQuery = "select * from coclient where co_userName = '$co_username'";
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult);
    $voucher = intval($userData['vouchers']);
    $totalVoucher = $voucher + intval($co_voucher);
    $sql = "update coclient set vouchers='$totalVoucher' where co_userName='$co_username'";
    
   mysqli_query($conn, $sql);
}
function bonousClient($c_username,$c_bonous)
{
   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
  
  $userQuery = "select * from client where c_username = '$c_username'";
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult);
    $bonous = intval($userData['c_credit']);
    $totalBonous = $bonous + intval($c_bonous);   
      $sql = "update client set c_credit='$totalBonous' where c_username='$c_username'";
 mysqli_query($conn, $sql);
}

function bonousCoClient($co_username,$co_bonous)
{
   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
  
  $userQuery = "select * from coclient where co_userName = '$co_username'";
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult);
    $bonous = intval($userData['co_credit']);
    $totalBonous = $bonous + intval($co_bonous);   
      $sql = "update coclient set co_credit='$totalBonous' where co_userName='$co_username'";
 mysqli_query($conn, $sql);
}
function stopPromotion($p_id)
{
  $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
  $sql="update offered_products set is_approved='stop' where p_id='$p_id'";
   mysqli_query($conn, $sql);
}

function transactionApproval($t_id, $decision){
    $transection_id=intval($t_id);
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $dataQuery = "select * from transaction where t_id = $transection_id";
    $dataResult = mysqli_query($conn, $dataQuery);
    $transactionData = mysqli_fetch_assoc($dataResult);
    $username = $transactionData['username'];
    $transactionAmount = intval($transactionData['price']);
    $productId = $transactionData['product_id'];
    $productid = explode("-", $productId);
    $productItem = $transactionData['product_item'];
    $stockProduct = explode("-", $productItem);
    $stockAction = $transactionData['stock_action'];
    
    
    $userDataQuery = "select * from client where c_username = '$username'";
    $userResult = mysqli_query($conn, $userDataQuery);
    $userData = mysqli_fetch_assoc($userResult);
    $userCredit = intval($userData['c_credit']);
    $refund = $userCredit + $transactionAmount;
    $deduct = $userCredit - $transactionAmount;
    $userStockDataQuery = "select * from client_stock_products where c_username = '$username' and sp_name = '$stockProduct[0]'";
    $userStockResult = mysqli_query($conn, $userStockDataQuery);
    $userStockData = mysqli_fetch_assoc($userStockResult);
    $userStockQty = intval($userStockData['sp_bought_qty']);
    
    if($decision == "Reject"){
        
        if($productid == "p"){
            
            $sql = "update client set c_credit = '$refund' where c_username = '$username'";
            $query = "update transaction set status = '$decision' where t_id = $transection_id";
            mysqli_query($conn, $sql);
            mysqli_query($conn, $query);
            
        }elseif($productid == "sp"){
            
            if($stockAction == "buy"){
                
                $newStockQty = $userStockQty - intval($stockProduct[1]);
                $updateStockQtyQuery = "update client_stock_products set sp_bought_qty = '$newStockQty' where c_username = '$username' and sp_name = '$stockProduct[0]'";
                
                $sql = "update client set c_credit = '$refund' where c_username = '$username'";
                $query = "update transaction set status = '$decision' where t_id = $transection_id";
                mysqli_query($conn, $sql);
                mysqli_query($conn, $query);
                mysqli_query($conn, $updateStockQtyQuery);
                
            }elseif($stockAction == "sell"){
                
                $newStockQty = $userStockQty + intval($stockProduct[1]);
                $updateStockQtyQuery = "update client_stock_products set sp_bought_qty = '$newStockQty' where c_username = '$username' and sp_name = '$stockProduct[0]'";
                mysqli_query($conn, $updateStockQtyQuery);
                
            }
            
        }
        
        
        
    }elseif($decision == "Clear"){
        
        if($stockAction == "sell"){
            
                $sql = "update client set c_credit = '$refund' where c_username = '$username'";
                $query = "update transaction set status = '$decision' where t_id =  $transection_id";
                mysqli_query($conn, $sql);
                mysqli_query($conn, $query);
            
        }
        
    }
    
}
function getClientList($username)
{

   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
   $sql = "select * from client where c_assigned_manager= '$username'";


  $result= mysqli_query($conn, $sql);
  while($data=mysqli_fetch_assoc($result))
  {
    echo $data['c_username']."<br>";
  }
  
}

function getCoClientList($username)
{

   $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
   $sql = "select * from coclient where co_assigned= '$username'";


  $result= mysqli_query($conn, $sql);
  while($data=mysqli_fetch_assoc($result))
  {
    echo $data['co_userName']."<br>";
  }
  
}

function getUserssInformation($username){

    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from manager where m_username = '$username'";
    $result = mysqli_query($conn, $sql);

    $userInfo =[];

    while($data = mysqli_fetch_assoc($result)){
        array_push($userInfo, $data);
    }

    return $userInfo;
}
?>