var callAjax = function (circle_id) {
    $.ajax({
        url: 'back/get_threads.php',
        method: 'POST',
        data: {
            circle_id : circle_id
        },
        success: function (data) {
            console.log('received')
            $('#options').html(data);
        }
    })
}

$(document).ready(function () {
    console.log("page loaded")
    $('.p_img').on('click', function () {
        var circleId = $(this).attr("id");
        if (circleId != "") {
            callAjax(circleId)
        }
    })
})