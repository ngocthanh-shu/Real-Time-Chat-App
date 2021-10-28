<?php 
    include_once "config.php";
    session_start();
    if(isset($_SESSION['unique_id'])){
        
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE users set status = '{$status}' where unique_id = {$logout_id}");
            if($sql) {
                session_unset();
                session_destroy();
                header("location: /Real-Time-Chat-App/login.php");
            }
        }
        else {
            header("location: /Real-Time-Chat-App/users.php");
        }
    }
    else {
        header("location: /Real-Time-Chat-App/login.php");
    }
?>