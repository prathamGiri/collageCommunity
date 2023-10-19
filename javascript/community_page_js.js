var circleId;
var threadId;
var callAjax = function (circle_id, topic, dest) {
    circleId = circle_id;
    var postType;
    if (topic == 'generalPosts' || topic == 'about') {
        topic = 'post';
        postType = 0;//for general post
    }else if (topic == 'achievementPosts') {
        topic = 'post';
        postType = 2;//for achievements
    }else if (topic == 'announcementPosts') {
        topic = 'post';
        postType = 1;//for announcement
    }
    $.ajax({
        url: 'back/comm_content_fetch.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
            topic : topic,
            postType : postType
        },
        success: function (data) {
            $(dest).html(data);
            if (postType == 1) {
                $('.tags').css({
                    'display' : 'none'
                })
            }else{
                $('.tags').css({
                    'display' : 'flex'
                })
            }
            
        }
    })
}

var callThreadsAjax = function (circle_id, threadId, dest) {
    $.ajax({
        url: 'back/threads_content_fetch.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
            threadId : threadId
        },
        success: function (data) {
            $(dest).html(data);
            $('.tags').css({
                'display' : 'none'
            })
        }
    })
}

$(document).ready(function () {
    $('.p_img').on('click', function () {
        circleId = $(this).attr("id");
        console.log(circleId);
        if (circleId != "") {
            callAjax(circleId, 'threads', '#options')
            callAjax(circleId, 'about', '.posts')
        }
    })

    $('#about').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'about', '.posts')
        }
    })

    $('#posts-btn').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'generalPosts', '.posts')
        }
    })

    $('#achievements-btn').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'achievementPosts', '.posts')
        }
    })

    $('#announcement').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'announcementPosts', '.posts')
        }
    })

    $('#merch-btn').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'merch', '.posts')
        }
    })

    $('#about-us-btn').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'about_page', '.posts')
        }
    })
    
})

$(document).on('click', '.threadopt', function () {
    console.log("clicked");
    threadId = $(this).attr("id");
    if (circleId != "") {
        console.log("clicked");
        callThreadsAjax(circleId, threadId, '.posts');
    }
});