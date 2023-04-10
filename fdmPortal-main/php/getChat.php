<?php

include_once("../connection.php");
session_start();



$outgoingid = $_SESSION['EmployeeID'];
$incomingid = mysqli_real_escape_string($dbconnect, $_POST['incomingid']);

// get message query
$getMsgQuery = "SELECT * FROM `messages` LEFT JOIN `employee` ON messages.outgoing = employee.employee_id WHERE outgoing = '{$outgoingid}' AND incoming = '{$incomingid}' OR outgoing = '{$incomingid}' AND incoming = '{$outgoingid}'";
$runGetMsgQuery = mysqli_query($dbconnect, $getMsgQuery);
if(!$runGetMsgQuery){
    
    echo "Query Failed";
}else{
    if(mysqli_num_rows($runGetMsgQuery) > 0){
        while($row = mysqli_fetch_assoc($runGetMsgQuery)){
            if($row['outgoing'] == $outgoingid){
                echo '<div class="responseCard outgoing">
                <div class="response">
                    <!-- name -->
                    <h3 class="name">You</h3>
                    <!-- outgoing message -->
                    <p class="messages">'.$row["messages"].'</p>
                </div>
            </div>';
            }else{
                echo '<div class="request incoming">
                <!-- name -->
                <h3 class="name">'.$row["firstname"]." ".$row["lastname"].'</h3>
                <!-- incoming -->
                <p class="messages">'.$row["messages"].'</p>
            </div>';
            }
        }
    }else{
        echo '<div id="errors">No messages are available</div>';
    }
}
?>