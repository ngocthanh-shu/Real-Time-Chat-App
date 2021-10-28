<?php
    session_start();
    include_once "config.php";
    if(isset($_SESSION['unique_id'])){
        
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT into messages(incoming_msg_id, outgoing_msg_id, msg)
                                values ({$incoming_id},{$outgoing_id},'{$message}')") or die();
        }
    }
    else{
        header("/Real-Time-Chat-App/login.php");
    }
?>