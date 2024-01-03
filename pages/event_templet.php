<?php

echo '<div class="event-main">
    <div class="event-in">';
        if ($row['eventImg'] != -1) {
            echo '<div class="event-img">
                <img src="/collageCommunity/images/post_images/'; echo $row['eventImg']; echo '">
            </div>';
         }
        echo '<div class="event-info">
            <div class="list-wrapper">
                <ul class="list-main">
                    <li class="ind-list" id="event-name">'; echo $row['eventName']; echo '</li>
                    <li class="ind-list" id="event-disc">'; echo $row['eventDisc']; echo '</li>
                    <li class="ind-list" id="event-mode">Mode: '; echo $row['mode']; echo '</li>';
                     if ($row['mode'] == 'offline') { 
                        echo '<li class="ind-list" id="event-venue">Venue: '; echo $row['venue']; echo '</li>';
                     }elseif ($row['mode'] == 'online') { 
                        
                     } 
                    
                    echo '<li class="ind-list" id="event-date">Date: '; echo $row['date']; echo '</li>
                    <li class="ind-list" id="event-time">Time: '; echo $row['time']; echo '</li>';
                    if ($row['regFees'] != -1) { 
                        echo '<li class="ind-list" id="event-regFees">Registration Fees:'; echo $row['regFees']; echo '</li>';
                    }
                echo '</ul>
            </div>';
            if ($row['status'] == 'upcoming') {
                echo '<div class="reg-btn-wrapper">';
                    $eventId = $row['eventId'];
                    $check_res = mysqli_query($conn, "SELECT * FROM eventregestration
                                    WHERE userId = $userId AND eventId = $eventId");
                    if (mysqli_num_rows($check_res) > 0) {
                        echo '<div class="reg-btn" data="cancel" style="background-color:rgb(252, 186, 3);" id="'; echo $eventId; echo '">Cancel Registration</div>';
                    }else{
                        echo '<div class="reg-btn" data="register" style="background-color: #04AA6D;" id="'; echo $eventId; echo '">Register</div>';
                    }
                echo '</div>';
            }
            
        echo '</div>
    </div>
</div>';

?>