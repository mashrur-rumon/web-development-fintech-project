<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Pocket Banking System - Registration</title>
    <link rel="stylesheet" href="../assets/css/registration.css">
</head>

<body>


    <div class="navbar">
        <div class="nav-logo-section">
            <a href="../index.php"><img src="../assets/gallery/logo.jpg" alt="Logo" width="300px"></a>
        </div>
        <div class="nav-link-section">
            <ul>
                <li><a href="../index.php">Login</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </div>
    
    <br><br><br>


    <div id="form-section">
        
        <div id="form-area">
            
            <h1 class="title">Registration</h1>
            
            <div class="field">
                <label for="Name">Name:</label>
            <input type="text" name="name" id="Name">
            </div>
            
            <div class="field">
                
            <label for="Username">Username:</label>
            <input type="text" name="username" id="Username">
                
            </div>
            
            <div class="field">
                
            <label for="Email">Email:</label>
            <input type="text" name="email" id="Email" placeholder="example@gmail.com">
                
            </div>
            
            <div class="field">
                
            <label for="Password">Password:</label>
            <input type="password" name="password" id="Password">
                
            </div>

            <div class="field">
                
            <label for="ConfirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword" id="CPassword">
                
            </div>
           
            <div class="field">
                
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dateofBirth" id="dob">
                
            </div>
            
            <div class="field">
                
            <label for="Gender">Gender:</label>
            <input type="radio" name="genderRadio" id="MaleLabel" value="Male"> Male
            <input type="radio" name="genderRadio" value="Female"> Female
            <input type="radio" name="genderRadio" value="Others"> Others 
                
            </div>
            
            <div class="field">
                
            <label for="UserType">User Type:</label>
            <input type="radio" name="userRadio" id="clientLabel" value="Client"> Client
            <input type="radio" name="userRadio" value="Co-Client"> Co-Client
            <input type="radio" name="userRadio" value="Manager"> Manager
            <input type="radio" name="userRadio" value="Admin"> Admin 
                
            </div>
            
            
            <input type="button" name="submit" id="Submit" value="Register" onclick="registration()">
            
            
        </div>
        
    </div>
    
    <h4 id="response"></h4>

<script type="text/javascript" src="../assets/scripts/script.js"></script>

</body>

</html>






