<?php


// include config file
include_once("../connection.php");


while($row = mysqli_fetch_assoc($query)){
// show last message send
$outgoing = isset($_SESSION['EmployeeID']) ? $_SESSION['EmployeeID'] : null;
$incoming = isset($row['employee_id']) ? $row['employee_id'] : null;

$sql = "SELECT * FROM `messages` WHERE (incoming = '{$incoming}' AND outgoing = '{$outgoing}') OR (incoming = '{$outgoing}' AND outgoing = '{$incoming}') ORDER BY messages_id DESC LIMIT 1";

$runSQL = mysqli_query($dbconnect, $sql);

if($runSQL){
    $row2 = mysqli_fetch_assoc($runSQL);
    if(mysqli_num_rows($runSQL) > 0){
        $lastMessage = $row2['messages'];
    }else{
        $lastMessage = "No messages available1";
    }
}else{
    echo "Query Failed";
}



// show Online users
    $onlineUsers = '<a href="messages.php?employeeid='.$row["employee_id"].'">
    <div class="profile">
    
        
        <!-- name -->
        <h2 class="name">'.$row["firstname"]." ".$row["lastname"].'</h2>
        <!-- last message -->
        <p class="lastMessage">'.$lastMessage.'</p>
       
       
    </div>
</a>';
echo $onlineUsers;
};
