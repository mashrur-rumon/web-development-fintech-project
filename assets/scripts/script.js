'use strict'

function userValidate(){
    
    var submit = document.querySelector("#Submit").value;
    
    var username = document.querySelector("#userName").value;
    
    var password = document.querySelector("#Password").value;
    
    if(username === "" || password === ""){
        
        document.querySelector("#response").innerHTML = "Missing Information";
        
    }else{
            
    var xhttp = new XMLHttpRequest();
	xhttp.open('POST', 'php/loginValidate.php', true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.onreadystatechange = function(){
		
		if (this.readyState == 4 && this.status == 200) {
            
            if(this.responseText == "Client Valid"){
                
                window.location.href = "view/client_home.php";
                
            }
            
            else if(this.responseText == "Admin Valid"){
                
                window.location.href = "view/admin_home.php";
                
            }
            
            else if(this.responseText == "Manager Valid"){
                
                window.location.href = "view/manager_home.php";
                
            }
            
            else if(this.responseText == "Co-Client Valid"){
                
                window.location.href = "view/promotion_details.php";
                
            }
            
            else{document.querySelector("#response").innerHTML = this.responseText;}
            
	    	
	    }
	}
	
	xhttp.send('submit='+submit+'&username='+username+'&password='+password);
        
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

function passwordValidation(password, cpassword){
    
    
    
    if(password != cpassword){
        
        alert("password and confirm password does not match");
        return false;
        
    }else{return true;}
    
}

function usernameValidation(username){
    
    
    
    if(username.includes(" ")){
        
        alert("invalid username");
        return false;
        
    }else{return true;}
    
}


function registration(){
    
    var name = document.querySelector("#Name").value;
    var username = document.querySelector("#Username").value;
    var email = document.querySelector("#Email").value;
    var password = document.querySelector("#Password").value;
    var cpassword = document.querySelector("#CPassword").value;
    var dob = document.querySelector("#dob").value;
    var gender = document.getElementsByName("genderRadio");
    var userType = document.getElementsByName("userRadio");
    var submit = document.querySelector("#Submit").value;
    var genderValue = "";
    var userTypeValue = "";
    
    for(var i = 0; i < gender.length; i++){
        
        if(gender[i].checked){
            
            genderValue = gender[i].value;
            break;
        }
        
    }
    
    for(var i = 0; i < userType.length; i++){
        
        if(userType[i].checked){
            
            userTypeValue = userType[i].value;
            break;
        }
        
    }
    
    if(name === "" || username === "" || email === "" || password === "" || cpassword === "" || dob === "" || genderValue === "" || userTypeValue === ""){
       
       document.querySelector("#response").innerHTML = "Missing information";
       
       }else{
           
           if(nameValidation(name)){
               
               if(emailValidation(email)){
                   
                   if(passwordValidation(password, cpassword)){
                       
                       if(usernameValidation(username)){
                           
                           var xhttp = new XMLHttpRequest();
	                       xhttp.open('POST', '../php/registrationCheck.php', true);
	                       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	                       xhttp.onreadystatechange = function(){
		
		                      if (this.readyState == 4 && this.status == 200) {
            
                                if(this.responseText == "Registration Completed!"){
                                    
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
	
	                   xhttp.send('submit='+submit+'&username='+username+'&password='+password+'&confirmPassword='+cpassword+'&name='+name+'&email='+email+'&dateofBirth='+dob+'&genderRadio='+genderValue+'&userRadio='+userTypeValue);
                           
                       }else{document.querySelector("#response").innerHTML = "username error";}
                       
                   }else{document.querySelector("#response").innerHTML = "password error";}
                   
               }else{document.querySelector("#response").innerHTML = "email error";}
               
           }else{document.querySelector("#response").innerHTML = "name error";}
           
           
           
       }
    
    
    
    
}