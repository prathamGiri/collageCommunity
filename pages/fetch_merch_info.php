<?php
echo '
    <div id="closediv">
        <a class="merch-closeblock"><i class="ri-close-line"></i></a>
    </div>
    <div id="o-msg"></div>
    <div class="merch-size">
        <div class="size-head">
            Size
        </div>
        <div class="size-bar">
            <div class="ind-bar" id="s-size">
                <input type="radio" id="type1" name="size" value="s">
                <label data-icon="S" for="type1">S</label>
            </div>
            <div class="ind-bar" id="m-size">
                <input type="radio" id="type2" name="size" value="m">
                <label data-icon="M" for="type2">M</label>
            </div>
            <div class="ind-bar" id="l-size">
                <input type="radio" id="type3" name="size" value="l">
                <label data-icon="L" for="type3">L</label>
            </div>
            <div class="ind-bar" id="xl-size">
                <input type="radio" id="type4" name="size" value="xl">
                <label data-icon="XL" for="type4">XL</label>
            </div>
            <div class="ind-bar" id="xxl-size">
                <input type="radio" id="type5" name="size" value="xxl">
                <label data-icon="XXL" for="type5">XXL</label>
            </div>
        </div>
    </div>
    <div class="merch-qty">
        <label for="mer-qty">Qty:</label>
        <select name="mer-qty" id="qty">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>
    <div class="place-order-btn" id="place">Place Order</div>
';
?>