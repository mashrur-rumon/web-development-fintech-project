<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

require_once('../models/clientService.php');

    $data = $_REQUEST['data'];
	$json = json_decode($data);

    $submit = $json->submit;
    $productQty = $json->productQty;

if(isset($submit)){
    
    if(!empty($productQty)){
        
        $productQty = intval($productQty);
        
        if($productQty > 0){
            
            $productId = $json->sp_id;
            $productPrice = intval($json->sp_price);
            $totalPrice = ($productPrice*$productQty);
            
            if(checkClientStockProduct($_SESSION['username'], $productId)){
                
                if(updateClientStockProduct($_COOKIE['username'], $productId, $productQty, "buy", $totalPrice)){
                    
                    echo "Transaction successful";
                    
                }else{"Transaction failed";}
                
            }else{
                
                if(buyClientStockProduct($_COOKIE['username'], $productId, $productQty, $totalPrice)){
                    
                    
                    echo "Transaction successful";
                    
                }else{"Transaction failed";}
                
            }
            
        }else{echo "Invalid product quantity";}
        
    }else{
        
        echo "Product quantity is empty";
        
    }
    
}



?>