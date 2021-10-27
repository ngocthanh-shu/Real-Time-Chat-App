<?php 
    while($row = mysqli_fetch_assoc($sql)){
        $output .= '<a href="/Real-Time-Chat-App/chat.php?user_id='. $row['unique_id'] .'">
                        <div class="content">
                            <img src="/Real-Time-Chat-App/tmp/images/'. $row['img'] .'" alt="">
                            <div class="details">
                                <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                                <p>Something</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>