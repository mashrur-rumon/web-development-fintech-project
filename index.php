<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Pocket Banking System - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>


    <div class="navbar">
        <div class="nav-logo-section">
            <a href="index.php"><img src="assets/gallery/logo.jpg" alt="Logo" width="300px"></a>
        </div>
        <div class="nav-link-section">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="view/about.html">About</a></li>
            </ul>
        </div>
    </div>
    
    <br><br><br><br>




    <div class="form-section">

        <div class="form-area">
            <form>

              <h2 class="title">E Pocket Banking System</h2><br>
               
                <input type="text" name="username" id="userName" placeholder="Enter Username"><br><br>
                <input type="password" name="password" id="Password" placeholder="Enter Password"><br><br><br>
                <input type="button" name="submit" id="Submit" value="LOGIN" onclick="userValidate()">&nbsp;&nbsp;&nbsp;
                <a id="signUp" href="view/registration.php"><input type="button" name="signup" value="SIGNUP"></a>
            </form>
            
            <h2 style="color: red; margin-left: 33%;" id="response"></h2>
            
        </div>

   
    </div>
    
    

<script type="text/javascript" src="assets/scripts/script.js"></script>

</body>

</html>



