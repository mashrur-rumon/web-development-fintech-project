<?php

session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}

    require_once('../models/clientService.php');

    $data = $_REQUEST['data'];
	$json = json_decode($data);

    $submit = $json->submit;
    $p_id = $json->p_id;
    $p_qty_sell = $json->p_qty_sell;
    $p_qty_bought = $json->p_qty_bought;
    $p_price = $json->p_price;

if(isset($submit)){
    
    $productId = getStockProductInformation($p_id);
    
    
    if(!empty($p_qty_sell)){
        
        if(intval($p_qty_sell) <= 0 or intval($p_qty_sell) > intval($p_qty_bought)){
            
            echo "invalid selling quantity";
            
        }else{
            
            $revenue = intval($p_qty_sell)*intval($p_price);
            
            if(updateClientStockProduct($_COOKIE['username'], $p_id, intval($p_qty_sell), "sell", $revenue)){
                
                echo "Transaction successful";
                
            }else{
                
                echo "Transaction Failed";
                
            }
            
        }
        
    }else{echo "input is empty";}
}


?>