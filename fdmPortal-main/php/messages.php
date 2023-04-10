<?php


include_once("../connection.php");




if(isset($_POST['send'])){
    $outgoing = mysqli_real_escape_string($dbconnect, $_POST['outgoing']);
    $incoming = mysqli_real_escape_string($dbconnect, $_POST['incoming']);
    $messages = mysqli_real_escape_string($dbconnect, $_POST['typingField']);

    $saveMsgQuery = "INSERT INTO `messages` (outgoing,incoming,messages)
    VALUES('$outgoing','$incoming', '$messages')";
    $runSaveQuery = mysqli_query($dbconnect, $saveMsgQuery);
    
    if(!$runSaveQuery){
        
        echo "query Failed";
        
    }

}
?>