
var followAjax = function (circle_id, type) {
    $.ajax({
        url: '/collageCommunity/pages/back/follow_circle.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
            type : type
        },
        success: function () {
            if (type == 0) {
                window.location.href = '/collageCommunity/pages/community_page.php?commid=' + circle_id
            }else{
                window.location.href = '/collageCommunity/pages/circles.php'
            }
        }
    })
}

$(document).ready(function () {

    $('.follow').on('click', function () {
        circleId = $(this).attr("id");
        if (circleId != "") {
            followAjax(circleId, 0);
        }
    })
    $('.unfollow').on('click', function () {
        circleId = $(this).attr("id");
        if (circleId != "") {
            followAjax(circleId, 1);
        }
    })

    $('.register_first').on('click', function () {
        window.location.href = '/collageCommunity/pages/login-form.php';
    })
})
