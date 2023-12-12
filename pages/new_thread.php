<div id="closediv">
    <a id="closeblock"><i class="ri-close-line"></i></a>
</div>
<div>
    <form id="thread_form" method="post">
        
        
        <p>Circle: <?php echo $row4['circleName']; ?> </p>
        <div id="thread_name">
            <label for="thread_name">Thread Name:</label>
            <input type="text" id="thread_name" name="thread_name" required>
        </div>
        <div class="radio_btn">
            <input type="radio" class="rb" id="anyone" name="status" value="0">
            <label for="anyone">Anyone Can Join</label><br>
        </div>
        <div class="radio_btn">
            <input type="radio" class="rb" id="invite" name="status" value="1">
            <label for="invite">Invite Only</label><br>
        </div>
        <div>
            <button type="submit" name="crt_thread">Submit</button>
        </div>
    </form>
</div>
