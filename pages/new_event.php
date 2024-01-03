<?php
echo '<div class="main-wrapper">
    <div id="closediv">
        <a id="closeblock"><i class="ri-close-line"></i></a>
    </div>
    <div id="er-msg" ></div>
    <form id="event-form" method="post">
    <div class="ind-wrapper" id="event-img-wrapper">
        <label for="event-img">Image(Optional):</label>
        <input type="file" name="event-img" id="event-img">
    </div>
    <div class="ind-wrapper" id="event-name-wrapper">
        <label for="event-name">Event Name:</label>
        <input type="text" name="event-name" id="event-name">
    </div>
    <div class="ind-wrapper" id="event-disc-wrapper">
        <label for="event-disc">Event Discription:</label>
        <input type="text" name="event-disc" id="event-disc">
    </div>
    <div class="ind-wrapper" id="event-mode-wrapper">
        <label for="event-mode">Event Mode:</label>
        <select name="event-mode" id="event-mode">
            <option value="Offline" selected>Offline</option>
            <option value="Online">Online</option>
        </select>
    </div>
    <div class="ind-wrapper" id="event-venue-wrapper">
        <label for="event-venue">Event Venue:</label>
        <input type="text" name="event-venue" id="event-venue">
    </div>
    <div class="ind-wrapper" id="event-gmeet-wrapper" style="display:none;">
        <label for="event-gmeet">Gmeet Link:</label>
        <input type="text" name="event-gmeet" id="event-gmeet">
    </div>
    <div class="ind-wrapper" id="event-date-wrapper">
        <label for="event-date">Event date:</label>
        <input type="date" name="event-date" id="event-date">
    </div>
    <div class="ind-wrapper" id="event-time-wrapper">
        <label for="event-time">Event Time:</label>
        <input type="time" name="event-time" id="event-time">
    </div>
    <div class="ind-wrapper" id="event-fees-wrapper">
        <label for="event-fees">Registration Fees:</label>
        <input type="number" name="event-fees" id="event-fees">
    </div>
    <div class="event-submit">
        <input type="hidden" name="button_clicked" id="button_clicked" value="false">
        <button type="submit" name="submit" id="submit-btn">Submit</button>
    </div>
    </form>
</div>';
?>