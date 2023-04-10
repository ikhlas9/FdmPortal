<?php
// Include the config file
include_once("../connection.php");
session_start();





$outgoingid = $_SESSION['EmployeeID'];

$sql = "SELECT e.* 
        FROM employee e
        JOIN messages m ON (m.outgoing = e.employee_id AND m.incoming = '$outgoingid') OR (m.incoming = e.employee_id AND m.outgoing = '$outgoingid')
        WHERE e.employee_id != '$outgoingid'
        GROUP BY e.employee_id
        ORDER BY MAX(m.messages_id) DESC";

$query = mysqli_query($dbconnect, $sql);

if (!$query) {
    echo "query failed";
} else {
    if (mysqli_num_rows($query) == 0) {
        echo '<div id="errors">No previous chats</div>';
    } elseif (mysqli_num_rows($query) > 0) {
        include_once("data.php");
    } else {
        echo "failed while finding users";
    }
}
?>



