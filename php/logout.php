<?php

    session_start();
	session_destroy();
    setcookie("username", $row['username'], time()-100, '/');
    header('location: ../index.php');

?>