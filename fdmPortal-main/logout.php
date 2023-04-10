<?php
    session_start();
    if(isset($_SESSION['id'])) {
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['Username']);
        unset($_SESSION['Email']);
        unset($_SESSION['Name']);
        unset($_SESSION['EmployeeID']);
        unset($_SESSION['Type']);
        header("location:home/home.php");
    } else {
        header("location:home/home.php");
    }
?>