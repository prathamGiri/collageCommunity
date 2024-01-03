var indexAjax = function (postType) {
    $.ajax({
        url: 'pages/back/latest_posts.php',
        method: 'POST',
        data: {
            postType : postType
        },
        success: function (data) {
            $(".posts").html(data)
        }
    })
}

$(document).ready(function () {
    $('#latest-posts').on('click', function() {
        indexAjax('latest')
        $('.ind-tag').removeClass('current')
        $(this).addClass('current')
    })

    $('#announcements').on('click', function() {
        indexAjax('announcements')
        $('.ind-tag').removeClass('current')
        $(this).addClass('current')
    })

    $('#achievements').on('click', function() {
        indexAjax('achievements')
        $('.ind-tag').removeClass('current')
        $(this).addClass('current')
    })

    // $('#events').on('click', function() {
    //     indexAjax('events')
    //     $('.ind-tag').removeClass('current')
    //     $(this).addClass('current')
    // })
})