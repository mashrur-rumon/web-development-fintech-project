<?php


require_once('databaseConnect.php');

function userRegistration($username, $password, $userType){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into login (username, password, user_type) values ('$username', '$password', '$userType')";
    
    if(mysqli_query($conn, $sql)){
        
        return true;
        
        
    }
    else{
        
        return false;
        
    }
    
}

function clientRegistration($name, $password, $username, $email, $gender, $dob){
    
    $sql = "insert into client (c_name, c_password, c_username, c_email, c_gender, c_dob) values ('$name', '$password', '$username', '$email', '$gender', '$dob')";
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    
    if(mysqli_query($conn, $sql)){
        
        return true;
        
        
    }
    else{
        
        return false;
        
    }
    
}

function getUserInformation($username){

		$conn = getConnection('localhost', 'root', '', 'e_pocket_system');
		$sql = "select * from client where c_username = '$username'";
		$result = mysqli_query($conn, $sql);

		$userInfo =[];

		while($data = mysqli_fetch_assoc($result)){
			array_push($userInfo, $data);
		}

		return $userInfo;
	}

function updateClientInformation($name, $email, $dob, $id){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "update client set c_name = '$name', c_email = '$email', c_dob = '$dob' where c_id = $id";
    
    if(mysqli_query($conn, $sql)){
        
        return true;
        
    }
    
    else{
        
        return false;
        
    }
    
}

function updateClientPassword($username, $password){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "update client set c_password = '$password' where c_username = '$username'";
    
    if(mysqli_query($conn, $sql)){
        
        $sql2 = "update login set password = '$password' where username = '$username'";
        mysqli_query($conn, $sql2);
        return true;
        
        
    }
    
    else{
        
        return false;
        
    }
}

function addBillingAccount($username, $accountNumber, $accountName){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "insert into client_billing_account (username, billing_account_name, billing_account_number) values ('$username', '$accountName', '$accountNumber')";
    
    if(mysqli_query($conn, $sql)){
        
        return true;
        
    }
    
    else{
        
        return false;
        
    }
    
}

function getBillingAccount($username){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client_billing_account where username = '$username'";
    
    $result = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_assoc($result)){
        
        echo "<option value=".$data['billing_account_name'].">".$data['billing_account_name']."</option>";
        
        
    }
    
}

function checkBillingAccount($username, $accountName){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client_billing_account where username = '$username' and billing_account_name = '$accountName'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if(!empty($row)){
        
        return true;
        
    }
    
    else{
        
        return false;
        
    }
    
}

function depositMoney($username, $amount){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client where c_username = '$username'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    
    $totalAmount = $amount + intval($data['c_credit']);
    
    $query = "update client set c_credit = '$totalAmount' where c_username = '$username'";
    
    if(mysqli_query($conn, $query)){
        
        return true;
        
    }
    
    else{
        
        return false;
        
    }
    
}

function withdrawMoney($username, $amount){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client where c_username = '$username'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    
    if(intval($data['c_credit']) > $amount){
        
        $totalAmount = intval($data['c_credit']) - $amount;
        
        $query = "update client set c_credit = '$totalAmount' where c_username = '$username'";
    
        if(mysqli_query($conn, $query)){
        
            return true;
        
        }
    
        else{
        
            return false;
        
        }
        
    }else{
        
            echo "<center><fieldset><legend>Messeges</legend>";
            echo "Insufficient balance";
            echo "</fieldset></center>";
        
    }
    
    
    
    
    
}


function checkClientPackage($username, $package){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client where c_username = '$username'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    
    if($data['c_package']==$package){
        
        return true;
        
    }else{return false;}
    
}

function buyClientPackage($username, $package, $price){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client where c_username = '$username'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $balance = intval($data['c_credit']);
    
    if($balance >= $price){
        
        $balance = $balance - $price;
        
        if($package=="Basic"){
            
            $query = "update client set c_credit = '$balance', c_package = '$package', vouchers = 0 where c_username = '$username'";
        
            if(mysqli_query($conn, $query)){
        
                return true;
        
            }
    
            else{
        
                return false;
        
            }
            
        }
        
        elseif($package=="Pro"){
            
            $query = "update client set c_credit = '$balance', c_package = '$package', vouchers = 7 where c_username = '$username'";
        
            if(mysqli_query($conn, $query)){
        
                return true;
        
            }
    
            else{
        
                return false;
        
            }
            
        }
        
        elseif($package=="Ultimate"){
            
            $query = "update client set c_credit = '$balance', c_package = '$package', vouchers = 12 where c_username = '$username'";
        
            if(mysqli_query($conn, $query)){
        
                return true;
        
            }
    
            else{
        
                return false;
        
            }
            
        }
        
        
        
    }else{
        
        echo "Insufficient Balance<br>";
        return false;
    }
    
    
}

function transaction($username, $productId, $productItem, $price, $stockAction = "null"){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    
    if($stockAction == "null"){
        
        if($productId=="D" or $productId=="F" or $productId=="W" or $productId=="P-Basic" or $productId=="P-Pro" or $productId=="P-Ultimate"){
        
        $sql = "insert into transaction (username, product_id, product_item, price, status) values ('$username', '$productId', '$productItem', '$price', 'Clear')";
        
        if(mysqli_query($conn, $sql)){
        
            return true;
        
        }
    
        else{
        
            return false;
        
        }
        
    }else{
        
        $sql = "insert into transaction (username, product_id, product_item, price) values ('$username', '$productId', '$productItem', '$price')";
    
        if(mysqli_query($conn, $sql)){
        
            return true;
        
        }
    
        else{
        
            return false;
        
        }
        
    }
        
    }else{
        
        $sql = "insert into transaction (username, product_id, product_item, price, stock_action) values ('$username', '$productId', '$productItem', '$price', '$stockAction')";
    
        if(mysqli_query($conn, $sql)){
        
            return true;
        
        }
    
        else{
        
            return false;
        
        }
        
    }
    
    
    
}

function getTransactionHistory($username){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from transaction where username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    while($data = mysqli_fetch_assoc($result)){
        
        echo "<tr>
            <td>".$data['t_id']."</td>
            <td>".$data['product_id']."</td>
            <td>".$data['product_item']."</td>
            <td>".$data['price']."</td>
            <td>".$data['stock_action']."</td>
            <td>".$data['status']."</td>
            <td>".$data['date']."</td>
         </tr>";
        
    }
    
    
    
}


function flexiload($username, $productId, $productItem, $amount){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client where c_username = '$username'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    
    $credit = intval($data['c_credit']);
    
    if($credit < $amount){
        
        return false;
        
    }else{
        
        $credit = $credit - $amount;
        
        $updateBalance = "update client set c_credit = '$credit' where c_username = '$username'";
        mysqli_query($conn, $updateBalance);
        
        if(transaction($username, $productId, $productItem, $amount)){
            
            return true;
            
        }else{
            
            return false;
            
        }
        
        
    }
}

function showAllStockProducts(){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from stock_products";
    $result = mysqli_query($conn, $sql);
    
    
    while($data = mysqli_fetch_assoc($result)){
        
        echo "<option value=".$data['sp_id']."|".$data['sp_price'].">".$data['sp_name']."</option>";
        //for javacript use an onclick event on a tag and the function must have a parameter for sp_id and product_quantity
        
        
    }
    
}

function getStockProductInformation($productId){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from stock_products where sp_id = '$productId'";
    $result = mysqli_query($conn, $sql);
    
    $stockProductInfo = [];
    
    $data = mysqli_fetch_assoc($result);
    array_push($stockProductInfo, $data);
		
    
    return $stockProductInfo;
    
}


function checkClientStockProduct($username, $productId){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client_stock_products where c_username = '$username' and sp_id = '$productId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if(!empty($row)){
        
            return true;
        
        }
    
        else{
        
            return false;
        
        }
    
}

function updateClientStockProduct($username, $productId, $productQty, $stockAction, $totalPrice){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client_stock_products where c_username = '$username' and sp_id = '$productId'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $totalQty = intval($data['sp_bought_qty']);
    
    $userQuery = "select * from client where c_username = '$username'";
    
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult); 
    $credit = intval($userData['c_credit']);
    
    
    
    if($stockAction=="buy"){
        
        if($credit >= $totalPrice){
            
            $credit = $credit - $totalPrice;
            $query2 = "update client set c_credit = '$credit' where c_username = '$username'";
            
            $totalQty = $totalQty + $productQty;
            $query = "update client_stock_products set sp_bought_qty = '$totalQty' where c_username = '$username' and sp_id = '$productId'";
        
            if(mysqli_query($conn, $query)){
        
                mysqli_query($conn, $query2);
                transaction($username, $productId, $data['sp_name']."-".$productQty, $totalPrice, $stockAction);
                return true;
        
            }
    
            else{
        
                return false;
        
            }
            
        }else{
            
            echo "Insufficient balance";
            return false;
            
        }
        
        
        
    }
    
    elseif($stockAction=="sell"){
        $totalQty = $totalQty - $productQty;
        $query = "update client_stock_products set sp_bought_qty = '$totalQty' where c_username = '$username' and sp_id = '$productId'";
        
        if(mysqli_query($conn, $query)){
        
            transaction($username, $productId, $data['sp_name']."-".$productQty, $totalPrice, $stockAction);
            return true;
        
        }
    
        else{
        
            return false;
        
        }
        
    }
    
}

function buyClientStockProduct($username, $productId, $productQty, $totalPrice, $stockAction = "buy"){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    
    $productQuery = "select * from stock_products where sp_id = '$productId'";
    $productResult = mysqli_query($conn, $productQuery);
    $productData = mysqli_fetch_assoc($productResult);
    
    $productName = $productData['sp_name'];
    $productPrice = $productData['sp_price'];
    
    $sql = "insert into client_stock_products (c_username, sp_id, sp_name, sp_price, sp_bought_qty) values ('$username', '$productId', '$productName', '$productPrice', '$productQty')";
    
    $userQuery = "select * from client where c_username = '$username'";
    
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult); 
    $credit = intval($userData['c_credit']);
    
    if($credit >= $totalPrice){
        
        $credit = $credit - $totalPrice;
        $query = "update client set c_credit = '$credit' where c_username = '$username'";
        
        if(mysqli_query($conn, $sql)){
        
            mysqli_query($conn, $query);
            transaction($username, $productId, $productName, $totalPrice, $stockAction);
            return true;
        
        }
    
        else{
        
            return false;
        
        }
        
        
    }else{
        
        echo "Insufficient balance";
        return false;
        
    }
    
}

function getAllOfferedProducts(){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from offered_products";
    $result = mysqli_query($conn, $sql);
    
    
    while($data = mysqli_fetch_assoc($result)){
        
        if(intval($data['stock']) > 0){
            
            $price = intval($data['p_price']) - intval($data['discount']);
        
            echo "<option value=".$data['p_id']."|".$price."|".$data['stock'].">".$data['p_name']."</option>";
            //for javacript use an onclick event on a tag and the function must have a parameter for p_id
            
        }
   
    }
    
}

function buyOfferedProduct($username, $productId, $productPrice){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $productQuery = "select * from offered_products where p_id = '$productId'";
    $productResult = mysqli_query($conn, $productQuery);
    $productData = mysqli_fetch_assoc($productResult);
    $productName = $productData['p_name'];
    $stock = intval($productData['stock']) - 1;
    
    $userQuery = "select * from client where c_username = '$username'";
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult); 
    $credit = intval($userData['c_credit']);
    
    if($credit >= $productPrice){
        
        $credit = $credit - $productPrice;
        
        $clientQuery = "update client set c_credit = '$credit' where c_username = '$username'";
        mysqli_query($conn, $clientQuery);
        
        $sql = "update offered_products set stock = '$stock' where p_id = '$productId'";
        mysqli_query($conn, $sql);
        
        transaction($username, $productId, $productName, $productPrice);
        return true;
        
    }else{
        
        return false;
        
    }
}

function voucher($username){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $userQuery = "select * from client where c_username = '$username'";
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult);
    $voucher = intval($userData['vouchers']);
    
    if($voucher > 0){
        
        $voucher = $voucher - 1;
        $sql = "update client set vouchers = '$voucher' where c_username = '$username'";
        mysqli_query($conn, $sql);
        return true;
        
    }else{
        
        return false;
        
    }
    
    
}

function getClientStockProductInformation($username){
    
    $conn = getConnection('localhost', 'root', '', 'e_pocket_system');
    $sql = "select * from client_stock_products where c_username = '$username' and sp_bought_qty > 0";
    $result = mysqli_query($conn, $sql);
    
    while($Data = mysqli_fetch_assoc($result)){
        
            echo "<option value=".$Data['sp_id']."|".$Data['sp_price']."|".$Data['sp_bought_qty'].">".$Data['sp_name']."</option>";

  
    }
    
}



?>