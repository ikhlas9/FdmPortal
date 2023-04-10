<?php
include_once("../connection.php");

session_start();
$searchValue = mysqli_real_escape_string($dbconnect, $_POST['search']);

$sql = "SELECT * FROM `employee` WHERE NOT employee_id = '{$_SESSION["EmployeeID"]}' AND (firstName LIKE '%$searchValue%' OR lastName LIKE '%$searchValue%')";
$query = mysqli_query($dbconnect, $sql);

if(mysqli_num_rows($query) > 0){
    include_once("data.php");
}else{
    echo '<div id="errors">User Not Found</div>';
}
?>