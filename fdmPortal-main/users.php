<?php

include_once("connection.php");
session_start();




if(!isset($_SESSION['EmployeeID'])){
    header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chating App</title>
    <!-- css linked -->
    <link rel="stylesheet" href="css/users.css">

    <!-- fontawesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<ul class="navbar">
        <li>
            <a href="index.php" class="company-link">
                <img src="home/logo1.png" alt="FDM Logo" width="100" height="auto">
                
            </a>
        </li>
        <li><a href="index.php" >Home</a></li>
        <li><a href="users.php" class="active">Chats</a></li>
        <li><a href="account.php">Self Service</a></li>
        <!-- display admin link -->
        <?php
        if ($_SESSION['Type'] == "admin") {
            ?>
            <li><a href="admin.php">Admin</a></li>
        <?php } ?>
        <li><a href="logout.php" id="logout">Logout?</a></li>
 </ul>

    <div class="circle"></div>
    <div class="circle circle2"></div>
    <div id="container">
        <!-- header -->
        <div id="header">
        <?php
        
        


        
       $headerQuery = "SELECT * FROM `employee` WHERE employee_id = '{$_SESSION["EmployeeID"]}'";

        $runHeaderQuery = mysqli_query($dbconnect, $headerQuery);

        if(!$runHeaderQuery){
            echo "connection failed";
        }else{
            $info = mysqli_fetch_assoc($runHeaderQuery);
            if ($info !== null && isset($info['firstName']) && isset($info['lastName']) && isset($info['status']))
             {
        ?>
           
            <div id="details">
                <!-- full name -->
                <h3 id="headerName"><?php echo $info['firstName']." ".$info['lastName']; ?></h3>
                <!-- status => Onine or Offline -->
                <h3 id="headerStatus"><?php echo $info['status']; ?></h3>

            </div>
            <?php
            }
        }
            ?>
            <!-- logout button -->
            
        </div>

        <!-- search box -->
        <div id="searchBox">
            <!-- Visit "fontawesome.com" for icons  -->
            <input type="text" id="search" placeholder="Find a Friend To Chat" autocomplete="OFF">
            <i class="fas fa-search searchButton"></i>
        </div>

        <!-- display online users -->
        <!-- uses list -->
        <div id="onlineUsers">
           
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/users.js"></script>
    
        <?php include "footer.php" ?>
    </body>
</html>