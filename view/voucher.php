<?php
     session_start();
    if(!isset($_SESSION['userType'])){
        header('location: ../index.php');
    }
if(!isset($_COOKIE['userName'])){
       
        session_destroy();
        header('location: ../index.php');
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Pocket Banking System - Manager - Home</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/manager/voucherStyle.css">
</head>
<body>
    
    <table width="100%">

        <tr>

            <td><a href="manager_home.php"><img src="../assets/gallery/logo.jpg" alt="Logo" width="320px"></a></td>
            <td align="right"><a href="../php/logout.php">
                    Logout
                </a>&nbsp;&nbsp;
                <a href="about.html" target="_blank">
                    About
                </a></td>

        </tr>

    </table><br><br><br>
    
   
        
       <!--  <div class="heading">
       
        </div> -->
        <div class="container">
             <u><h1>E-Pocket Banking System</h1></u>
             <div class="catagory">
                <h3>Welcome, Rabbi</h3>
                <ul>
                    
                    <li><a href="view_client_list.php">View  client list</a></li>
                    <li><a href="view_co-client_list.php">View  co-client list</a></li>
                    <li><a href="manager_edit_profile.php">edit profile</a></li>
                    <li><a href="warning.php">Warning </a></li>
                    <li><a href="ban.php">mark for ban</a></li>
                    <!-- <li><a href="transaction.php">solve transaction</a></li> -->
                    <li><a href="voucher.php">Voucher</a></li>
                    <li><a href="manager_bonous.php">Bonous</a></li>
                    <li><a href="manager_stopPromotion.php">Stop Promotion</a></li>
                    <li><a href="manager_changePassword.php">change password</a></li>
                    
                    
                    
                </ul>
            </div>
               
          
                
               
                 <form action="../php/client_voucher.php" method="post" class="my-form">
                    
                    <div class="form-group">
             
                         <u><h3>Client Voucher</h3></u>
                             <label for=""> Account Id :  </label>
                             <input type="text" name="c_accountNumber"><br><br>
                         </div>
                          <div class="form-group">
                                  <label for=""> Amount :  </label>
                             <input type="number" name="c_voucherAmount" > BDT <br><br>
                        </div>
                    <input type="submit" name="c_voucher" value="Proceed" class="button">
            

                    <div class="form-group">

                         <u><h3>Co-Client Voucher</h3></u>
                     <label for=""> Account Id :  </label>
                         <input type="text" name="co_accountNumber"><br><br>
                         </div>
                         <div class="form-group">
                          <label for=""> Amount :  </label>
                   <input type="number" name="co_voucherAmount" > BDT <br><br>
               </div>
                    <input type="submit" name="co_voucher" value="Proceed" class="button">
                

            



                
                </form>
        
       </div>  
    
        
   
</body>
</html>