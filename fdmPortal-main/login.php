<?php
    // start the session
    session_start();

    // check if the user is already logged in
    if(isset($_SESSION['id'])) {
        header("location:index.php");
        exit;
    }

    // include the database connection file
    include "connection.php";

    // initialize variables
    $Username = $Password = "";
    $UE = $PE = "";

    // check if the login form has been submitted
    if(isset($_POST['login'])) {
        $Username = mysqli_real_escape_string($dbconnect, $_POST['Username']);
        $Password = mysqli_real_escape_string($dbconnect, $_POST['Password']);

        if(empty($Username)) {
            $UE = "please enter your username";
        }
        if(empty($Password)) {
            $PE = "please enter your password";
        }

        // hash the password
        $Password = md5($Password);

        // query the database for the user
        $query = "SELECT * FROM Employee WHERE username = '$Username' AND password = '$Password';";
        $result = mysqli_query($dbconnect, $query);

        // check if the user was found in the database
        if(mysqli_num_rows($result) == 1) {
            // get the user details
            $row = mysqli_fetch_assoc($result);

            // save the user details in session variables
            $_SESSION['EmployeeID'] = $row['employee_id'];
            $_SESSION['Type'] = $row['userType'];
            $_SESSION['Name'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['Email'] = $row['email'];
            $_SESSION['Username'] = $row['username'];

            // redirect the user to the index page
            header("location:index.php");
            exit;
        } else {
            // display an error message
            $UE = "incorrect username or password";
            $PE = "incorrect username or password";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   
    <link rel="stylesheet" href="login.css">

    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>
    


        <!-- form used by employees to login to the portal/system -->
        
        <div class="info">
            <div class="info-title"><span>Please login to access the FDM Employee Portal:</span></div>
            <form action="login.php" method="post">
                <div class="info-row">
                    <label for="username">Username:</label><span class="login-error"><?php echo $UE; ?></span>
                    <input type="text" id="username" name="Username" placeholder="Enter your username..." value="<?php echo $Username; ?>"><br>

                    <label for="password">Password:</label><span class="login-error"><?php echo $PE; ?></span>
                    <input type="password" id="password" name="Password" placeholder="Enter your password..."><br>

                    <input type="submit" id="login" name="login" value="LOGIN">
                </div>
            </form>
        </div>
      </div>

        
    </body>
</html>



