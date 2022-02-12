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
    
    <center>
        
        <u><h1>E-Pocket Banking System</h1></u>
        
        <table border="1" width="40%">
        
        <tr>
            
            <td>
                
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
                    
                    
                </ul>
                
            </td>
            
            <td align="center">
                
                
               
             <form action="../php/manager_solveTransection.php" method="post">
                    <table  border="1" width="100%">

                      <tr>
                        <td>
                             <u><h3>Client Transaction</h3></u>
                      
                             
                               Transaction No : <input type="number" name="c_transactionNumber"><br><br>
                               Decision : <input type="text" name="decision"><br><br>
                            <input type="submit" name="c_transaction" value="solve">
                        </td>

                      </tr>
                      <!-- <tr>
                        <td>
                    
                          <u><h3>Co-Client Transaction</h3></u>
                      
                              
                             Transaction No : <input type="number" name="co_transactionNumber"><br><br>
                             Account Id : <input type="number" name="co_decision"><br><br>
                                  <input type="submit" name="co_transaction" value="solve">
                           </td>       
                       </tr> -->
                    </table>
                </form>
                
            </td>
            
        </tr>
        
    </table>
        
    </center>
    
</body>
</html>