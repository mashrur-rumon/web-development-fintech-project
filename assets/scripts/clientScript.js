'use strict'

function productInfo(){
    
    var productId = document.getElementById('productName');
    
    productId = productId.options[productId.selectedIndex].value;
    
    if(productId == "Select"){
        
        document.getElementById("productId").value = "";
        document.getElementById("productPrice").value = "";
        document.querySelector("#productQtyBought").value = "";
        
        
    }else{
        
        var productInfo = productId.split("|");
    
        document.getElementById("productId").value = productInfo[0];
        document.getElementById("productPrice").value = productInfo[1];
        document.querySelector("#productQtyBought").value = productInfo[2];
        
    }
    
}

function nameValidation(name){
    
    var error;
           
           if (name === "") {
        
            error = "Name field is empty";
            alert(error);
            return false;
            
        
    }
    
    else {
        
        let name_word = name.split(" ");
        
        if (name_word.length < 2) {
            
            error = "Name has less than two words!";
            alert(error);
            return false;
            
        }
        
        else {
            
            let pattern = ['<', ',', '>', '/', '?', '"', "'", ';', ':', ']', '[', '|', '}', '{', '=', '+',
                            '_', ')', '(', '*', '&', '^', '%', '$', '#', '@', '!', '`', '~', '0', '1', '2', '3', 
                            '4', '5', '6', '7', '8', '9'];
            
            
            for (var i = 0; i < pattern.length; i++) {
                
                if (name.includes(pattern[i])) {
                    
                    error = "Invalid Name!";
                    alert(error);
                    return false;
                    break;
                    
                    
                }
 
            }
            
            
            
        }return true;
        
    }
           
       
    
}

function emailValidation(email){
 
    if(email.includes("@")){
        
        return true;
  
    }else{
        alert("Invalid Email");
        return false;}
    
}

function updateUserInformation(){
    
    var submit = document.querySelector("#usersubmit").value;
    var name = document.querySelector("#username").value;
    var email = document.querySelector("#useremail").value;
    var dob = document.querySelector("#userdob").value;
    
    if(nameValidation(name)){
        
        if(emailValidation(email)){
            
            var xhttp = new XMLHttpRequest();
	        xhttp.open('POST', '../php/client_edit_profile.php', true);
	        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            var json = {
		      'name' : name,
		      'email'  : email,
		      'dob' : dob,
              'submit': submit
	       }

	       var data = JSON.stringify(json);
            
	        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "User information updated!"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('data='+data);
            
        }else{
            
            var result = "Invalid email!";
            document.querySelector("#response").innerHTML = result.fontcolor("red");
            
        }
        
    }else{
        
            var result = "Invalid name!";
            document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }
    
}

function addBillingAccount(){
    
    var submit = document.querySelector("#Submit").value;
    var accountName = document.querySelector("#AccountName").value;
    var accountNo = document.querySelector("#accountNumber").value;
    
    if(accountNo === ""){
        
        var result = "Please Enter account Number";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        if(accountNo.length != 10){
        
        var result = "Invalid account number";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_billing_account.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        var json = {
		      'accountName'  : accountName,
		      'accountNo' : accountNo,
              'submit': submit
	       }

	   var data = JSON.stringify(json);
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Billing Account Added"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('data='+data);
        
    }
        
    }
    
    
    
}

function upgradeBasicPackage(){
    
    var basic = document.querySelector("#Basic").value;
    
    var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_package_upgrade.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Package upgraded"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('basic='+basic);
    
}

function upgradeProPackage(){
    
    var pro = document.querySelector("#Pro").value;
    
    var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_package_upgrade.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Package upgraded"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('pro='+pro);
    
}

function upgradeUltimatePackage(){
    
    var ultimate = document.querySelector("#Ultimate").value;
    
    var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_package_upgrade.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Package upgraded"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('ultimate='+ultimate);
    
}

function buyStockProduct(){
    
    var productQty = parseInt(document.querySelector("#productQuantity").value);
    var sp_id = document.querySelector("#productId").value;
    var sp_price = document.querySelector("#productPrice").value;
    var submit = document.querySelector("#Submit").value;
    
    if(productQty <= 0){
        
        var result = "Invalid quantity";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        var json = {
		      'productQty' : productQty,
              'sp_id' : sp_id,
              'sp_price' : sp_price,
              'submit': submit
	       }

	   var data = JSON.stringify(json);
        
        var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_stock_products.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Transaction successful"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('data='+data);
        
    }
    
}

function withdrawMoney(){
    
    var withdraw = document.querySelector("#Withdraw").value;
    var withdraw_amount = document.querySelector("#WithdrawAmount").value;
    
    if(withdraw_amount === ""){
        
        var result = "Amount is empty!";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        withdraw_amount = parseInt(withdraw_amount);
        
        if(withdraw_amount <= 0){
        
        var result = "Can not be negative!";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_withdraw_deposit.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Successfully withdrawn"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('withdraw='+withdraw+'&withdraw_amount='+withdraw_amount);
        
    }
        
    }
    
    
    
}

function depositMoney(){
    
    var deposit = document.querySelector("#Deposit").value;
    var deposit_amount = document.querySelector("#DepositAmount").value;
    
    if(deposit_amount === ""){
        
        var result = "Amount is empty!";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        deposit_amount = parseInt(deposit_amount);
        
        if(deposit_amount <= 0){
        
        var result = "Can not be negative!";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_withdraw_deposit.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Deposited successfully"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('deposit='+deposit+'&deposit_amount='+deposit_amount);
        
    }
        
    }
    
    
    
}

function flexiLoad(){
    
    var phoneNumber = document.querySelector("#PhoneNo").value;
    var flexiAmount = document.querySelector("#FlexiAmount").value;
    var flexiload = document.querySelector("#Submit").value;
    
    if(phoneNumber === "" || flexiAmount === ""){
        
        var result = "Missing information";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        if(phoneNumber.length != 11){
            
            var result = "Invalid phone number!";
            document.querySelector("#response").innerHTML = result.fontcolor("red");
            
        }else{
            
            flexiAmount = parseInt(flexiAmount);
            
            if(flexiAmount <= 0){
                
                var result = "Invalid amount!";
                document.querySelector("#response").innerHTML = result.fontcolor("red");
                
            }else{
                
                var json = {
		      'phoneNumber' : phoneNumber,
              'flexiAmount' : flexiAmount,
              'flexiload' : flexiload
	       }

	   var data = JSON.stringify(json);
        
        var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_flexiload.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Flexiload Successful"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('data='+data);
                
            }
            
        }
        
    }
    
}

function buyOfferedProduct(){
    
    var p_id = document.querySelector("#productId").value;
    var p_price = document.querySelector("#productPrice").value;
    var checkbox;
    var submit = document.querySelector("#Submit").value;
    var checked = document.getElementsByName("checkbox");
    
    if(checked[0].checked){
        
        if(p_id === "" || p_price === ""){
            
            var result = "Please select a product";
            result = result.fontcolor("red");      
            document.querySelector("#response").innerHTML = result;
            
        } else {
            
            checkbox = document.querySelector("#Checkbox").value;
        
        var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_offered_products.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Transaction Successful"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('p_id='+p_id+'&p_price='+p_price+'&checkbox='+checkbox+'&submit='+submit);
            
        } 
        
         
        
    }else{
        
        if(p_id === "" || p_price === ""){
            
            var result = "Please select a product";
            result = result.fontcolor("red");      
            document.querySelector("#response").innerHTML = result;
            
        }else{
            
            var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_offered_products.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Transaction Successful"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('p_id='+p_id+'&p_price='+p_price+'&submit='+submit);
            
        }
        
         
        
    }
    
   
    
}

function manageStock(){
    
    var submit = document.querySelector("#Submit").value;
    var p_qty_sell = document.querySelector("#productQtySell").value;
    var p_qty_bought = document.querySelector("#productQtyBought").value;
    var p_price = document.querySelector("#productPrice").value;
    var p_id = document.querySelector("#productId").value;
    
    if(p_qty_sell === ""){
        
        var result = "Input is empty!";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        p_qty_sell = parseInt(p_qty_sell);
        p_qty_bought = parseInt(p_qty_bought);
        
        if(p_qty_sell <= 0 || p_qty_sell > p_qty_bought){
            
        var result = "Invalid quantity!";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
            
        }else{
            
            var json = {
		      'p_qty_sell' : p_qty_sell,
              'p_qty_bought' : p_qty_bought,
              'p_price' : p_price,
              'p_id' : p_id,
              'submit' : submit
	       }

	   var data = JSON.stringify(json);
        
        var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_manage_stock_products.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Transaction successful"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('data='+data);
            
        }
        
    }
    
}

function changePassword(){
    
    var updatePassword = document.querySelector("#Submit").value;
    var currentPassword = document.querySelector("#CurrentPassword").value;
    var newPassword = document.querySelector("#NewPassword").value;
    var re_typeNewPassword = document.querySelector("#reNewPassword").value;
    
    if(currentPassword === "" || newPassword === "" || re_typeNewPassword === ""){
        
        var result = "Missing information!";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
        
    }else{
        
        if(newPassword != re_typeNewPassword){
            
        var result = "new and retype password did not match";
        document.querySelector("#response").innerHTML = result.fontcolor("red");
            
        }else{
            
            var json = {
              're_typeNewPassword' : re_typeNewPassword,
              'newPassword' : newPassword,
              'currentPassword' : currentPassword,
              'updatePassword' : updatePassword
	       }

	   var data = JSON.stringify(json);
        
        var xhttp = new XMLHttpRequest();
	    xhttp.open('POST', '../php/client_change_password.php', true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function(){
		
		          if (this.readyState == 4 && this.status == 200) {
            
                        if(this.responseText == "Password Updated Successfully!"){
                                    
                            var result = this.responseText;
                            result = result.fontcolor("green");      
                            document.querySelector("#response").innerHTML = result;
                                    
                        }
                            else{
                                var result = this.responseText;
                                result = result.fontcolor("red");
                                document.querySelector("#response").innerHTML = result;
                                }
            
	    	
	                           }
	                       }
 
            xhttp.send('data='+data);
            
        }
        
    }
}


