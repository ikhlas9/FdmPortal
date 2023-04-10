<?php
    session_start();
    require "connection.php";
    $RE = "";
    $ME = "";
    $SDE = "";
    $EDE = "";
    if (isset($_SESSION['EmployeeID'])) {
        $EmployeeID = $_SESSION['EmployeeID'];
    } else {
        echo "EmployeeID is not set in session. Please log in.";
        exit;
    }

    if(isset($_POST['makeRequest'])) {
        $Message = mysqli_real_escape_string($dbconnect, $_POST['Message']);
        $Type = mysqli_real_escape_string($dbconnect, $_POST['Type']);
        $error = false;

        // check if fields are empty
        if(empty($Type)) {
            $error = true;
            $RE = "please select the type of request";
        }
        if(empty($Message)) {
            $error = true;
            $ME = "please describe your request";
        }

        // query to insert employee request into database
        $requestQuery = "INSERT INTO Request(employee_id, message, type) 
        VALUES ('$EmployeeID', '$Message', '$Type');"; 

        if(!$error) {
            if(mysqli_query($dbconnect, $requestQuery)) {
                echo "<p class='confirmation'>REQUEST SUCCESSFULLY SUBMITTED!</p>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FDM : My Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" value="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="account.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            // hide divs by default
            $(document).ready(function(){
                $("#payslip-details").hide();
            });

            $(document).ready(function(){
                $("#account-details").hide();
            });

            $(document).ready(function(){
                $("#request-details").hide();
            });

            $(document).ready(function(){
                $("#time-details").hide();
            });

            $(document).ready(function(){
                $("#task-details").hide();
            });

            $(document).ready(function(){
                $("#document-details").hide();
            });

            $(document).ready(function(){
                $("#request-view-details").hide();
            });

            $(document).ready(function(){
                $("#time-view-details").hide();
            });

            // toggle info divs

            $(document).ready(function(){
            $("#payslip-button").click(function(){
                $("#payslip-details").slideToggle(500);
            });
            });

            $(document).ready(function(){
            $("#account-button").click(function(){
                $("#account-details").slideToggle(500);
            });
            });

            $(document).ready(function(){
            $("#request-button").click(function(){
                $("#request-details").slideToggle(500);
            });
            });

            $(document).ready(function(){
            $("#time-button").click(function(){
                $("#time-details").slideToggle(500);
            });
            });

            $(document).ready(function(){
            $("#task-button").click(function(){
                $("#task-details").slideToggle(500);
            });
            });

            $(document).ready(function(){
            $("#document-button").click(function(){
                $("#document-details").slideToggle(500);
            });
            });

            $(document).ready(function(){
            $("#request-view-button").click(function(){
                $("#request-view-details").slideToggle(500);
            });
            });

            $(document).ready(function(){
            $("#time-view-button").click(function(){
                $("#time-view-details").slideToggle(500);
            });
            });

        </script>
    </head>
    <body>
    <?php if (!isset($_SESSION['EmployeeID'])) {
        header("location:login.php");
                } else { ?>
        <!-- else, display the home page to the employee -->
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
            

            <!-- make a request -->
            <?php
                if(isset($_POST['makeRequest'])) {
                    $Message = mysqli_real_escape_string($dbconnect, $_POST['Message']);
                    $Type = mysqli_real_escape_string($dbconnect, $_POST['Type']);
                    $error = false;

                    // check if fields are empty
                    if(empty($Type)) {
                        $error = true;
                        $RE = "please select the type of request";
                    }
                    if(empty($Message)) {
                        $error = true;
                        $ME = "please describe your request";
                    }

                    // query to insert employee request into database
                    $requestQuery = "INSERT INTO Request(employee_id, message, type) 
                    VALUES ('$EmployeeID', '$Message', '$Type');"; 

                    if(!$error) {
                        if(mysqli_query($dbconnect, $requestQuery)) {
                            echo "<p class='confirmation'>REQUEST SUCCESSFULLY SUBMITTED!</p>";
                        }
                    }

                }
            ?>
            <!-- book time off -->
            <?php
                if(isset($_POST['requestTime'])) {
                    $startDate = mysqli_real_escape_string($dbconnect, $_POST['startDate']);
                    $endDate = mysqli_real_escape_string($dbconnect, $_POST['endDate']);
                    $currentDate = date('d-m-Y');
                    $error = false;

                    if(empty($startDate)) {
                        $error = true;
                        $SDE = "please enter the START date of your time off request";
                    }
                    if(empty($endDate)) {
                        $error = true;
                        $EDE = "please enter the END date of your time off request";
                    }
                    if($startDate > $endDate) {
                        $error = true;
                        $SDE = "please select a START date before END date!";
                        $EDE = "please select an END date after START date";
                    }
                    if($startDate <= $currentDate) {
                        $erorr = true;
                        $SDE = "please select a START date after today";
                    }
                    if($endDate <= $currentDate) {
                        $error = true;
                        $EDE = "please select an END date after today";
                    }

                    $requestTimeQuery = "INSERT INTO TimeOff(requester_id, startDate, endDate)
                    VALUES ('$EmployeeID', '$startDate', '$endDate');";

                    if(!$error) {
                        if(mysqli_query($dbconnect, $requestTimeQuery)) {
                            echo "<p class='confirmation'>TIME OFF REQUEST SUCCESSFULLY SENT!</p>";
                        }
                    }
                }
            ?>
        <div class="container">
        <div class="centered-grid">
            <div class="info">
            <!-- display payslips for employee -->
                <?php
                    $year = date('Y');
                    $selectPay = "SELECT * FROM Payslip WHERE employee_id = '$EmployeeID' AND year(period_start) = $year ORDER BY period_start ASC;";
                    $selectPayResults = mysqli_query($dbconnect, $selectPay);
                    $count = 0;
                ?>
                <div class="info-title"><button id="payslip-button"> My payslip(s):</button></div>
                <div class="info-row" id="payslip-details">
                    Payslip(s) for <?php echo date('Y') ?>:<br>
                        <?php
                        while($row = mysqli_fetch_array($selectPayResults)) {
                            $count++;
                            echo "Payslip #" . ($count);
                            echo "<div class='row'>";
                            echo "<b>Period start:</b> " . $row['period_start'] . "<br>";
                            echo "<b>Period end:</b> " . $row['period_end'] . "<br><hr>";
                            echo "<b>Basic pay:</b> £" . $row['basic_pay'] . "<br>";
                            echo "<b>Hours:</b> " . $row['totalHoursWorked'] . "<br><hr>";
                            echo "<span style='color:orange'><b>Allowances:</b> £" . $row['allowances'] . "</span><br>";
                            echo "<span style='color:red'><b>Deductions:</b> £" . $row['deductions'] . "</span><br><hr>";
                            echo "<span style='color:lightgreen'><b>Net pay:</b> £" . $row['net_pay'] . "</span><br>";
                            echo "</div>";
                        }
                        ?>
                </div>

            

            <!-- form for making requests -->
                <div class="info-title"><button id="request-button">Make a request:</button></div>
                <div class="info-row" id="request-details">
                <form action="account.php" method="POST">    
                    <label for="type"><span class="login-error"><?php echo $RE; ?></span>
                        What is the nature of your request?
                    </label>
                    <select id="type" name="Type">
                        <option value=""></option>
                        <option value="website">Website problem</option>
                        <option value="personal">Personal problem</option>
                        <option value="work">Work problem</option>
                        <option value="suggestion">Suggestion</option>
                    </select><br>

                    <span class="login-error"><?php echo $ME; ?></span>
                    <textarea id="message" name="Message" placeholder="Describe your request in detail..."></textarea>

                    <input type="submit" value="Request" name="makeRequest">
                </div>
                </form>

            <!-- form for making time off requests (display availableDays from database)-->
                <?php
                    // select available days from database
                    $selectDates = "SELECT * FROM AvailableDays";
                    $selectResult = mysqli_query($dbconnect, $selectDates);
                    $selectDates2 = "SELECT * FROM AvailableDays";
                    $selectResult2 = mysqli_query($dbconnect, $selectDates2);
                ?>
                <div class="info-title"><button id="time-button">Book time off:</button></div>
                <div class="info-row" id="time-details">
                <form action="account.php" method="POST">
                    <label for="startDate"><span class="login-error"><?php echo $SDE; ?></span>
                        Please select the <b>start</b> date:
                    </label>
                    <select id="startDate" name="startDate">
                        <option value=""></option>
                        <?php
                            while($row = mysqli_fetch_array($selectResult)) {
                                echo "<option value=" .$row['dayAvailable'] . ">" . $row['dayAvailable'] . "</option><br>";
                            }
                        ?>
                    </select><br>

                    <label for="endDate"><span class="login-error"><?php echo $EDE; ?></span>
                        Please select the <b>end</b> date:
                    </label>
                    <select id="endDate" name="endDate">
                        <option value=""></option>
                        <?php
                            while($row = mysqli_fetch_array($selectResult2)) {
                                echo "<option value=" .$row['dayAvailable'] . ">" . $row['dayAvailable'] . "</option><br>";
                            }
                        ?>
                    </select><br>

                    <input type="submit" value="Request" name="requestTime">
                </div>
                </form>
               
                            <!-- view my request(s) -->
                <?php
                    // select employee's requests from database
                    $selectRequests = "SELECT * FROM Request WHERE employee_id = '$EmployeeID';";
                    $selectRequestsResult = mysqli_query($dbconnect, $selectRequests);
                ?>
                <div class="info-title"><button id="request-view-button">My Request(s):</button></div>
                <div class="info-row" id="request-view-details">
                    <?php
                        while($row = mysqli_fetch_array($selectRequestsResult)) {
                            echo "Request #" . ($row['request_id']);
                            echo "<div class='row'>";
                            echo "<b>Request:</b> " . $row['message'] . "<br>";
                            echo "<b>Type:</b> " . $row['type'] . "<br>";
                            echo "<b>Date Requested:</b> " . $row['dateRequested'] . "<br><hr>";
                            if($row['status'] == 'requested') {
                                echo "<span style='color:orange'><b>REQUESTED</b></span><br>";
                            } else if($row['status'] == 'rejected') {
                                echo "<span style='color:red'><b>REJECTED</b></span><br>";
                            } else if($row['status'] == 'approved') {
                                echo "<span style='color:lightgreen'><b>APPROVED</b></span><br>";
                            }
                            echo "</div>";
                        }
                    ?>
                </div>
            <!-- view my time off request(s) -->
                <?php
                    // select employee's time off requests from database
                    $selectTimeRequests = "SELECT * FROM TimeOff WHERE requester_id = '$EmployeeID';";
                    $selectTimeResult = mysqli_query($dbconnect, $selectTimeRequests);
                ?>
                <div class="info-title"><button id="time-view-button">My Time Off Request(s):</button></div>
                <div class="info-row" id="time-view-details">
                    <?php
                        while($row = mysqli_fetch_array($selectTimeResult)) {
                            echo "Request #" . ($row['timeOff_id']);
                            echo "<div class='row'>";
                            echo "<b>Start:</b> " . $row['startDate'] . "<br>";
                            echo "<b>End:</b> " . $row['endDate'] . "<br><hr>";
                            if($row['status'] == 'requested') {
                                echo "<span style='color:orange'><b>REQUESTED</b></span><br>";
                            } else if($row['status'] == 'rejected') {
                                echo "<span style='color:red'><b>REJECTED</b></span><br>";
                            } else if($row['status'] == 'approved') {
                                echo "<span style='color:lightgreen'><b>APPROVED</b></span><br>";
                            }
                            echo "</div>";
                        }
                    ?>
                </div>

            </div>
        </div>
        </div>
        <!-- if user type is newHire, display training tasks -->
            <?php
                if($_SESSION['Type'] == "newHire") {
            ?>
                <div class="info">
                    <div class="info-title"><button id="task-button">My task(s):</button></div>
                    <div class="info-row" id="task-details">
                        <?php
                            // get trainee's task(s) from database
                            $getTasks = "SELECT * FROM Trainee T, TrainingTask TT WHERE T.task_id = TT.task_id AND T.trainee_id = '$EmployeeID';";
                            $getTasksResult = mysqli_query($dbconnect, $getTasks);
                            $count = 0;
                        
                        while($row = mysqli_fetch_array($getTasksResult)) {
                            $count++;
                            echo "Task #" . $count . "<br>";
                            echo "<div class='row'>";
                            echo "<b>Task:</b> " . $row['title'] . "<br>";
                            echo "<b>Category:</b> " . $row['category'] . "<br>";
                            echo "<b>Description:</b> " . $row['description'] . "<br>";
                            echo "<b>Duration:</b> " . $row['duration'] . " hours<br><hr>";
                            if($row['complete'] == 0) {
                                echo "<span style='color:red'><b>INCOMPLETE</b></span>";
                            } else {
                                echo "<span style='color:lightgreen;'><b>COMPLETE</b></span>";
                            }
                            echo "</div>";
                        }
                        ?>

                    </div>
                </div>


            <?php } ?>
        <?php } ?>
        <?php include "footer.php"; ?>
    </body>
</html>