<?php
session_start();
require "connection.php";


if (!isset($_SESSION['EmployeeID'])) {
    header("location:login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $password = md5($_POST['password']);
    $employee_id = $_SESSION['EmployeeID'];


    $updateQuery = "UPDATE Employee SET address = '$address', telephone = '$telephone', password = '$password' WHERE employee_id = $employee_id";
    $result = mysqli_query($dbconnect, $updateQuery);

    if ($result) {
        echo "<script>alert('Profile updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating profile');</script>";
    }
}
$employee_id = $_SESSION['EmployeeID'];


// Fetch user details again right before displaying them
$result = mysqli_query($dbconnect, "SELECT * FROM Employee WHERE employee_id = $employee_id");
$user = mysqli_fetch_assoc($result);




?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="profile.css">
    <script src="https://kit.fontawesome.com/c04efcf51c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                const passwordField = $('#password');
                const passwordFieldType = passwordField.attr('type');
                const newType = passwordFieldType === 'password' ? 'text' : 'password';
                passwordField.attr('type', newType);

                // Toggle eye icon between open and closed
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
        });
    </script>

</head>
<body>
<div class="profile-wrapper">
    <a href="index.php" class="back-link">
        <i class="fas fa-arrow-left"></i> Back to Home
    </a>

    <div class="profile-container">
        <h2>Profile Details</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" readonly value="<?php echo $user['firstname']; ?>">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" readonly value="<?php echo $user['lastname']; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" readonly value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label>Department</label>
                <input type="text" readonly value="<?php echo $user['department']; ?>">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" readonly value="<?php echo $user['location']; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="<?php echo $user['address']; ?>">
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" name="telephone" id="telephone" value="<?php echo $user['telephone']; ?>">
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password">
                <i class="fas fa-eye" id="togglePassword"></i>
            </div>

            <button type="submit">Update Profile</button>
        </form>
    </div>

 <?php include "footer.php" ?>
</body>
</html>
