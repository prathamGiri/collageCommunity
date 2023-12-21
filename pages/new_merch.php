<?php 

echo '<div class="main-wrapper">
    <div id="closediv">
        <a id="closeblock"><i class="ri-close-line"></i></a>
    </div>
    <div id="er-msg" ></div>
    <div class="img-preview-wrapper">
        <div class="img-preview">
            <img id="image" src="/collageCommunity/images/shirt.png">
        </div>
    </div>
    <form id="merch-form" method="post">
    <input type="file" id="filec" name="merch-img" required>
    <div class="inputs">
        <label for="merch-name">Merch Name</label>
        <input type="text" id="merch-name" name="merch-name" required>
        <label for="merch-price">Price</label>
        <input type="text" id="merch-price" name="merch-price" required>
    </div>
    <div class="merch-submit">
        <button type="submit" name="submit" id="submit-btn">Submit</button>
    </div>
    </form>
</div>';

?>