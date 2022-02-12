<?php

session_start();
	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}
    
	require_once('../models/co_clientService.php');
	

	
	if(isset($_REQUEST['submit'])){
		 echo "<center><fieldset><legend>Messeges</legend>";
		 if(!empty($_REQUEST['name']) and !empty($_REQUEST['product']) and !empty($_REQUEST['p_price']))
		 {
			if(set($_REQUEST['name'], $_REQUEST['product'], $_REQUEST['p_price'])) 
		 {
			 echo "Product Added !";
		 }
		 else{
			 echo"Product not Added";
		 }
		}
		else{
			echo "Missing Information";
		}
		echo "</fieldset></center>";
	}





?>