<?php 
    session_start();
    include_once "config.php";
    if(isset($_SESSION['unique_id'])){
        
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        
        $sql = "SELECT * from messages 
                left join users on users.unique_id = messages.outgoing_msg_id
                where (incoming_msg_id = {$incoming_id} and outgoing_msg_id = {$outgoing_id})
                or (incoming_msg_id = {$outgoing_id} and outgoing_msg_id = {$incoming_id}) order by msg_id";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                }
                else {
                    $output .= '<div class="chat incoming">
                                    <img src="/Real-Time-Chat-App/tmp/images/'. $row['img'] .'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
        else {

        }
    }
    else{
        header("/Real-Time-Chat-App/login.php");
    }
?>