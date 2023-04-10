<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FDM Employee Portal</title>
        <meta charset="UTF-8">
        <meta name="viewport" value="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="faqs.css">
    </head>
    <body>
        <!-- redirect user to login page if not logged in -->
        <?php if(!isset($_SESSION['EmployeeID'])) {
            header("location:login.php");
        } else { ?>
             <ul class="navbar">
            <li>
                <a href="index.php" class="company-link">
                    <img src="home/logo1.png" alt="FDM Logo" width="100" height="auto">
                    
                </a>
            </li>
            <li><a href="index.php" >Home</a></li>
            <li><a href="users.php">Chats</a></li>
            <li><a href="account.php" class="active">Self Service</a></li>
            <!-- display admin link -->
            <?php
            if ($_SESSION['Type'] == "admin") {
                ?>
                <li><a href="admin.php">Admin</a></li>
            <?php } ?>
            <li><a href="logout.php" id="logout">Logout?</a></li>
         </ul>
            
            <!-- get all news posts from the database -->
            <?php
                include "connection.php";
                $getFAQS = "SELECT * FROM Faq;";
                $FAQSResult = mysqli_query($dbconnect, $getFAQS);
            ?>
            
            <div class="info" >
                <div class="info-title">FAQs:</div>
                <?php
                    while($row = mysqli_fetch_array($FAQSResult)) {
                        echo "<div class='info-display'>";
                        echo "<span class='info-display-title'>" . strtoupper($row['question']) . "</span><br>";
                        echo "<span class='info-display-title'>" . $row['answer'] . "</span>";
                        echo "</div>";
                    }
                ?>
            </div>


        <?php } ?>
        <?php include "footer.php" ?>
    </body>
</html>

