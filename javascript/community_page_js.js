var circleId;
var threadId;
// var setupWebSocket = function() {
//     var socket = new WebSocket('ws://localhost:8080');

//     socket.onopen = function (e) {
//         console.log("Connection established!");
//     };

//     socket.onmessage = function (e) {
//         console.log(e.data);
//     };

    // Optional: Handle other WebSocket events like onclose, onerror, etc.
    // conn.onclose = function (e) {
    //     console.log("Connection closed.");
    // };

    // conn.onerror = function (e) {
    //     console.error("WebSocket error:", e);
    // };

    // return conn;
// }



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
            $('.posts').css({
                'margin-bottom' : '80px'
            })
            $('.createpost').css({
                'position': 'fixed',
                'bottom': 0,
                'width': '60%'
            })
            $('.postblock').css({
                'position': 'fixed',
                'bottom': 0,
                'width': '60%'
            })


            // $('.ind-post').css({
            //     'background-color': 'white'
            // })
            // $('.inside').css({
            //     'background-color': '#e4f2e8',
            //     'padding': '5px'
            // })

            
            // $('.info-wrapper').css({
            //     'display': 'flex'
            // })

            // $('.info-img').css({
            //     'width': '5%',
            //     'margin-right': '2%'
            // })

            // $('.info-img img').css({
            //     'width': '100%',
            //     'border-radius': '50%'
            // })

            // $('.info-text').css({
            //     'font-size': '18px',
            //     'margin-top': 'auto',
            //     'margin-bottom': 'auto'
            // })

            // $('.rep-mes-text').css({
            //     'background-color': 'white',
            //     'padding' :'3px'
            // })

            // $('.media-block').css({
            //     'width': '100%',
            //     'padding': '5px',
            //     'display': 'flex',
            //     'justify-content': 'center'
            // })

            // $('.media-block img').css({
            //     'width': '60%'
            // })

            // $('.text-block').css({
            //     'padding': '5px'
            // })

            // $('.post-options').css({
            //     'display': 'flex',
            //     'justify-content': 'left',
            //     'font-size' : '20px'
            // })

            // $('.opt').css({
            //     'display': 'flex',
            //     'margin-left' : '10px'
            // })
            
            // setupWebSocket();
        }
    })
}

var createThreadsAjax = function (circle_id, dest) {
    $.ajax({
        url: '/collageCommunity/pages/back/create_new_thread.php',
        method: 'POST',
        data: {
            circle_id : circle_id
        },
        success: function (data) {

            $(dest).html(data);
            $('.floaters').css({
                "display" : "block",
                "background-color": "white",
                "position": "fixed",
                "left": "50%",
                "top": "50%",
                "transform": "translate(-50%, -50%)",
                "border" : "1px black solid"
            })

            $('.rb').css({
                "width":"auto",
                "vertical-align": "middle"
            })

            $('#closeblock').css({
                "font-size": "2rem",
                "cursor": "pointer",
                "margin-left": "92%"
            })
        }
    })
}

$(document).ready(function () {
    
    // $.getScript("thread_server_join.js")

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
    threadId = $(this).attr("id");
    if (circleId != "") {
        callThreadsAjax(circleId, threadId, '.posts');
    }
});

$(document).on('click', '#new_thread', function () {
    if (circleId != "") {
        createThreadsAjax(circleId, '.floaters');
    }
});

$(document).on('submit', '#thread_form', function (e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '/collageCommunity/pages/back/new_thread_back.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            $('.thread-list').append(data);
            $('#thread_name').val("");
            $('.floaters').css({
                "display" : "none"
            })
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$(document).on('click', '#closeblock', function () {
    $('#thread_name').val("");
    $('.floaters').css({
        "display" : "none"
    })
})