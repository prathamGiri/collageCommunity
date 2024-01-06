var circleId;
var threadId;
var tag;

var callAjax = function (circle_id, topic, dest) {
    console.log(circle_id);
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

var callEventsAjax = function (circle_id, dest) {
    $.ajax({
        url: 'back/events_page.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
        },
        success: function (data) {
            $(dest).html(data);
            $('.head').css({
                'width' : '100%',
                'background-color' : 'white',
                'border-radius' : '5px',
                'padding' : '8px',
                'font-size' : '20px',
                'font-family' : 'poppins',
                'margin-bottom' : '10px'
            })
            $('.event-main').css({
                'width' : '100%',
                'background-color' : 'white',
                'border-radius' : '5px',
                'margin-bottom' : '10px'
            })
            $('.event-in').css({
                'padding' : '5px',
                'width' : '100%',
                'display' : 'flex',
                'justify-content' : 'flex-start'
            })
            $('.event-img img').css({
                'width' : '100%',
                'border-radius' : '5px',
            })
            $('.event-img').css({
                'width' : '40%',
            })
            $('.event-info').css({
                'width' : '60%',
            })
            $('.ind-list').css({
                'padding' : '3px',
                'font-family' : 'poppins',
                'font-size' : '18px',
                'width' : '100%',
                'user-select' : 'none'
            })
            $('.reg-btn-wrapper').css({
                'width' : '100%',
            })
            
                $('.reg-btn').css({
                    'width' : 'fit-content',
                    'margin' : 'auto',
                    'padding' : '4px',
                    'border-radius' : '5px',
                    'color' : 'white',
                    'font-family' : 'poppins',
                    'cursor' : 'pointer'
                }) 
        }
    })
}

var callCircleInfo = function (circle_id, dest) {
    console.log('inside')
    $.ajax({
        url: 'back/circle_info.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
        },
        success: function (data) {
            console.log('pp')
            console.log(data)
            if (data.status == 'already_follower') {
                console.log('already_follower')
                $(dest).html('')
                // $(dest).html(data.html);
                // $('#circle-name').css({
                //     'font-family': 'math',
                //     'font-size': 'x-large',
                //     'text-align': 'center',
                // })
                // $('.unfollow').css({
                //     'width': 'fit-content',
                //     'padding': '2px',
                //     'background-color': '#bcc1bf',
                //     'color': 'white',
                //     'font-family': 'Poppins',
                //     'border-radius': '5px',
                //     'cursor': 'pointer',
                //     'margin': 'auto',
                // }).on('click', function () {
                //     var type = 1
                //     $.ajax({
                //         url: '/collageCommunity/pages/back/follow_circle.php',
                //         method: 'POST',
                //         data: {
                //             circle_id : circle_id,
                //             type : type
                //         },
                //         success: function () {
                //             callCircleInfo(circleId, '.first-time-follow-btn')
                //         }
                //     })
                // })
            }else if (data.status == 'not_follower') {
                console.log('not_follower')
                $(dest).html(data.html);
                $('#circle-name').css({
                    'font-family': 'math',
                    'font-size': 'x-large',
                    'text-align': 'center',
                })
                $('.follow').css({
                    'width': 'fit-content',
                    'margin': 'auto',
                    'padding': '3px 4px',
                    'background-color': '#04AA6D',
                    'color': 'white',
                    'border-radius': '5px',
                    'font-family': 'Poppins',
                    'cursor': 'pointer',
                }).on('click', function () {
                    var type = 0
                    $.ajax({
                        url: '/collageCommunity/pages/back/follow_circle.php',
                        method: 'POST',
                        data: {
                            circle_id : circle_id,
                            type : type
                        },
                        success: function () {
                            callCircleInfo(circleId, '.first-time-follow-btn')
                        }
                    })
                })
            }else if (data.status == 'not_logged') {
                $(dest).html(data.html);
                console.log('not_logged')
                $('#circle-name').css({
                    'font-family': 'math',
                    'font-size': 'x-large',
                    'text-align': 'center',
                })
                $('.register_first').css({
                    'width': 'fit-content',
                    'margin': 'auto',
                    'padding': '0.5rem 1rem',
                    'background-color': '#04AA6D',
                    'color': 'white',
                    'border-radius': '5px',
                    'font-family': 'Poppins',
                    'cursor': 'pointer',
                }).on('click', function () {
                    window.location.href = "/collageCommunity/pages/login-form.php?type=loginfirst"
                })
            }
        }
    })
}

var callNewThreadBtn = function (circle_id, dest) {
    $.ajax({
        url: 'back/new_events_btn.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
        },
        success: function (data) {
            if (data.status == 'yes-prev') {
                $(dest).html('<div id="new_thread"><p><i class="ri-add-circle-line"></i>Create New Thread</p></div>')
            }else{
                $(dest).html('')
            }
        }
    })
}

var callNewEventsBtn = function (circle_id, dest) {
    $.ajax({
        url: 'back/new_events_btn.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
        },
        success: function (data) {
            if (data.status == 'yes-prev') {
                $(dest).html('<div id="new-event-btn">New Event</div>')
                $('#new-event-btn').css({
                    'width' : '100%',
                    'text-align' : 'center',
                    'padding' : '11px 0px',
                    'font-family': 'Poppins',
                    'background-color' : '#04AA6D',
                    'color' : 'white',
                    'border-radius' : '5px',
                    'cursor': 'pointer'
                })
            }else{
                $(dest).html('')
            }
        }
    })

}

var callNewMerchBtn = function (circle_id, dest) {
    $.ajax({
        url: 'back/new_events_btn.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
        },
        success: function (data) {
            if (data.status == 'yes-prev') {
                $(dest).html('<div id="new-merch-btn">Add Merch</div>')
                $('#new-merch-btn').css({
                    'width' : '100%',
                    'text-align' : 'center',
                    'padding' : '11px 0px',
                    'font-family': 'Poppins',
                    'background-color' : '#04AA6D',
                    'color' : 'white',
                    'border-radius' : '5px',
                    'cursor': 'pointer'
                })
            }else{
                $(dest).html('')
            }
        }
    })
}

var callNewMemBtn = function (circle_id, dest, tag) {
    $.ajax({
        url: 'back/new_events_btn.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
        },
        success: function (data) {
            if (data.status == 'yes-prev') {
                $(dest).html('<div id="new-mem-btn">Add Members</div>')
                $('#new-mem-btn').css({
                    'width' : '100%',
                    'text-align' : 'center',
                    'padding' : '11px 0px',
                    'font-family': 'Poppins',
                    'background-color' : '#04AA6D',
                    'color' : 'white',
                    'border-radius' : '5px',
                    'cursor': 'pointer'
                })
                $('#new-mem-btn').on('click', function() {
                    newMemberFloater(circleId, -1, tag);
                })
            }else{
                $(dest).html('')
            }
        }
    })
}

var callMemberList = function (circle_id, threadId, dest){
    $.ajax({
        url: 'back/member_list.php',
        method: 'POST',
        data: {
            circle_id : circle_id,
            threadId : threadId
        },
        success: function (data) {
            $(dest).html(data);
            $('.new-member').on('click', function () {
                newMemberFloater(circleId, threadId, tag)    
            })
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

            $('.unread-count').css({
                'display' : 'none'
            })
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
                "width" : "fit-content",
                "height" : "fit-content",
                "display" : "block",
                "background-color": "white",
                "position": "fixed",
                "left": "50%",
                "top": "50%",
                "transform": "translate(-50%, -50%)",
                "border" : "1px black solid"
            })
            $('.main-wrapper').css({
                'margin' : '10px'
            })
            $('#thread_name').css({
                'margin' : '5px 0px'
            })
            $('#thread_name input').css({
                'font-size' : '20px',
                'padding' : '2px',
                'background-color' : '#dbfff4'
            })
            $('.rb').css({
                "width":"auto",
                "vertical-align": "middle"
            })

            $('#closediv').css({
                'width' : 'fit-content',
                "font-size": "2rem",
                "cursor": "pointer",
                'position' : 'absolute',
                "right": "0px",
                'top' : '0px'
            })
        }
    })
}

var placeMerchOrder = function(selectedValue, qty, merchId) {
    $.ajax({
        url: '/collageCommunity/pages/back/place_merch_order.php',
        method: 'POST',
        data: {
            selectedValue : selectedValue,
            qty : qty,
            merchId : merchId
        },
        success: function (data) {
            if (data.status == 'success') {
                $('.place-order-btn').html('Check Status')
                $('.place-order-btn').attr('id', 'cancel')
                $('.place-order-btn').css({
                    'background-color' : '#fcba03',
                })
                $('#o-msg').html('Order Placed')
                $('#o-msg').css({
                    'display' : 'block',
                    'border' : '1px solid #04AA6D',
                    'color' : '#04AA6D',
                    'background-color' : '#dbfff4'
                })
            }else if(data.status == 'error'){
                console.log('error in uploading')
            }else if (data.status == 'login-first') {
                window.location.href = "/collageCommunity/pages/login-form.php?type=loginfirst"
            }
        }
    })

}

var memAddBtnFunction = function(circleId, threadId, tag) {
    $('.add-btn').on('click', function() {
    console.log(circleId)
        var self = $(this)
        console.log(self)
        var newUserId = self.closest('.new-mem-info').attr('id');
        console.log(newUserId)
        var icon = self.find('i').attr('class');
        var memReqType;
        if (icon == 'ri-user-add-fill') {
            memReqType = 0;
        }else if (icon == 'ri-close-circle-fill') {
            memReqType = 1;
        }
        $.ajax({
            url: '/collageCommunity/pages/back/add_new_member.php',
            method: 'POST',
            data: {
                circle_id : circleId,
                threadId : threadId,
                newUserId : newUserId,
                memReqType : memReqType,
                tag : tag
            },
            success: function (data) {
                if (data.status == 'success') {
                    console.log("success")
                    if (memReqType == 0) {
                        console.log("success2")
                        self.find('i').attr('class', 'ri-close-circle-fill')
                        self.css({'color' : 'black'})
                        if (tag == "thread") {
                            callMemberList(circleId, threadId, '.member-bar');
                        }else if (tag == "about") {
                            callAjax(circleId, 'about_page', '.posts')
                        }
                        
                    } else {
                        console.log("success3")
                        self.find('i').attr('class', 'ri-user-add-fill')
                        self.css({'color' : '#04AA6D'})
                        if (tag == "thread") {
                            callMemberList(circleId, threadId, '.member-bar');
                        }else if (tag == "about") {
                            callAjax(circleId, 'about_page', '.posts')
                        }
                    }
                }else if(data.status == 'error'){
                    console.log("error")
                }else if(data.status == 'already_member'){
                    console.log("already_member")
                }else{
                    console.log("blblblbl")
                }
            }
        })
    })
}

var newMemberFloater = function(circleId, threadId, tag) {
    $.ajax({
        url: '/collageCommunity/pages/back/add_new_member.php',
        method: 'POST',
        data: {
            circle_id : circleId,
            threadId : threadId,
            tag : tag
        },
        success: function (data) {
            $('.floaters').html(data)
            $('.floaters').css({
                "width" : "fit-content",
                "height" : "fit-content",
                "display" : "block",
                "background-color": "white",
                "position": "fixed",
                "left": "50%",
                "top": "50%",
                "transform": "translate(-50%, -50%)",
                "border" : "1px black solid"
            })
            $('.main-blk').css({
                'margin' : "40px 20px"
            })
            $('#closeblock').css({
                "font-size": "2rem",
                "cursor": "pointer",
                "position":"absolute",
                "right" : '0px'
            })
            $('.mem-input').css({
                'border' : '1px solid black',
                'margin-bottom' : '10px',
                'width': '250px'
            })
            $('.mem-list').css({
                'height': '200px',
                'overflow-y': 'auto'
            })
            $('.new-mem-info').css({
                'display' : 'flex',
                'position' : 'relative'
            })
            $('.user-img img').css({
                'width':'40px',
                'border-radius' : '50%'
            })
            $('.add-btn').css({
                'position' : 'absolute',
                'right' : '10px',
                'top': '50%',
                'transform': 'translateY(-50%)',
                'cursor': 'pointer',
                'padding': '5px'
            })
            $('#live_search').css({
                'padding': '10px',
                'font-family': 'Poppins'
            })
            $('.user-name').css({
                'height': 'fit-content',
                'padding': '8px',
                'font-family': 'Poppins',
                'font-size': '18px',
            })
            $('.add-btn i').css({
                'font-size': '20px'
            })
            memAddBtnFunction(circleId, threadId, tag)
            $("#live_search").keyup(function () {
                var query = $(this).val();
                console.log(query)
                var page = $("#live_search").attr("page")
                console.log(page)
                if (query != "") {
                    $.ajax({
                        url: 'back/live_search.php',
                        method: 'POST',
                        data: {
                            page: page,
                            query: query,
                            circleId : circleId,
                            tag : tag,
                            threadId : threadId
                        },
                        success: function (data) {
                            console.log(data)
                            $('.all').css({
                                'display' : 'none'
                            })
                            $('.mem-list').prepend(data)
                            $('.new-mem-info').css({
                                'display' : 'flex',
                                'position' : 'relative'
                            })
                            $('.user-img img').css({
                                'width':'40px',
                                'border-radius' : '50%'
                            })
                            $('.add-btn').css({
                                'position' : 'absolute',
                                'right' : '10px',
                                'top': '50%',
                                'transform': 'translateY(-50%)',
                                'cursor': 'pointer',
                                'padding': '5px'
                            })
                            $('.user-name').css({
                                'height': 'fit-content',
                                'padding': '8px',
                                'font-family': 'Poppins',
                                'font-size': '18px',
                            })
                            $('.add-btn i').css({
                                'font-size': '20px'
                            })
                            memAddBtnFunction(circleId, threadId, tag)
                        }
                    })
                }else{
                    $('.searched').remove()
                    $('.all').css({
                        'display' : 'block'
                    })
                }
            })
        }
    })
}

$(document).ready(function () {

    $('.p_img').on('click', function () {
        circleId = $(this).attr("id");
        if (circleId != "") {
            callAjax(circleId, 'threads', '#options')
            callAjax(circleId, 'about', '.posts')
            callCircleInfo(circleId, '.first-time-follow-btn')
            callNewThreadBtn(circleId, '.new-thread-wrapper')
            $('.member-bar').html('')
            $('.p_img').removeClass("active_circle");
            $(this).addClass("active_circle");
            $('.active').removeClass('active')
            $('#posts-btn').addClass('active')
            tag = 'general'
        }
    })

    $('.p_img img').on({
        
        mouseenter: function() {
            parent = $(this).closest('.p_img');
            textBlock = parent.find('.p_text');
            $(this).css({
                'border-radius': '30%',
                'border': '3px solid #04AA6D'
            });
            $(parent).css({
                'position' : 'relative',
            });
            $(textBlock).css({
                'display' : 'block',
                'position' : 'absolute',
                'background-color' : 'black',
                'color' : 'white',
                'font-size' : '20px',
                'top' : '50%',
                'transform' : 'translateY(-50%)',
                'left' : '4rem',
                'padding' : '8px',
            });
        },
        mouseleave: function() {
            textBlock = $(this).closest('.p_img').find('.p_text');
            $(this).css({
                'border-radius': '50%', // Reset to default value or remove this line if not needed
                'border': 'none' // Reset to default value or remove this line if not needed
            });
            $(textBlock).css({
                'display' : 'none'
            });
        }
    });

    $('#about').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'about', '.posts')
            $('.active').removeClass('active')
            $('#posts-btn').addClass('active')
            $('.member-bar').html('')
            tag = 'general'
        }
    })

    $('#up_events').on('click', function () {
        console.log('here4')
        if (circleId != "") {
            $('.tags').css({
                'display' : 'none'
            })
            callEventsAjax(circleId, '.posts')
            callNewEventsBtn(circleId, '.member-bar')
            tag = 'events'
        }
    })

    $('#posts-btn').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'generalPosts', '.posts')
            $('.active').removeClass('active')
            $('#posts-btn').addClass('active')
            $('.member-bar').html('')
            tag = 'general'
        }
    })

    $('#achievements-btn').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'achievementPosts', '.posts')
            $('.active').removeClass('active')
            $('#achievements-btn').addClass('active')
            $('.member-bar').html('')
            tag = 'achievements'
        }
    })

    $('#announcement').on('click', function () {
        if (circleId != "") {
            callAjax(circleId, 'announcementPosts', '.posts')
            $('.member-bar').html('')
            tag = 'announcement'
        }
    })
    
    $('#merch-btn').on('click', function () {
        if (circleId != "") {
            tag = 'merch'
            callAjax(circleId, 'merch', '.posts')
            $('.active').removeClass('active')
            $('#merch-btn').addClass('active')
            callNewMerchBtn(circleId, '.member-bar')
        }
    })

    $('#about-us-btn').on('click', function () {
        if (circleId != "") {
            tag = 'about'
            callAjax(circleId, 'about_page', '.posts')
            $('.active').removeClass('active')
            $('#about-us-btn').addClass('active')
            callNewMemBtn(circleId, '.member-bar', tag)
        }
    }) 
})

$(document).on('click', '.threadopt', function () {
    threadId = $(this).attr("id");
    if (circleId != "") {
        callThreadsAjax(circleId, threadId, '.posts');
        callMemberList(circleId, threadId, '.member-bar');
        tag = 'thread';
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
            callAjax(circleId, 'threads', '#options')
            $('.floaters').html("")
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

$(document).on({
    mouseenter: function () {
        var backBlock = $(this).find('.inside');
        $(backBlock).css({
            "background-color" : "#97c7a5"
        });
        var msgDiv = $(this).find('.msg-options');
        $(msgDiv).css({
            "display":"flex"
        });
    },
    mouseleave: function () {
        var backBlock = $(this).find('.inside');
        $(backBlock).css({
            "background-color" : "#e4f2e8"
        });
        var msgDiv = $(this).find('.msg-options');
        $(msgDiv).css({
            "display":"none"
        });
    }
}, '.ind-post');

$(document).on('click', '#reply', function () {
    var postId = $(this).closest('.ind-post').attr('id');
    $.ajax({
        url: '/collageCommunity/pages/back/get_reply_info.php',
        method: 'POST',
        data: {
            postId:postId
        },
        success: function (data) {
            $('#createpost').css({
                'display' : 'none'
            })
            $('#postblock').css({
                'display': 'block'
            })
            $('.reply-to').css({
                'display': 'block'
            })
            $('.reply-box').attr("id", postId);
            $('.reply-box').html(data)
            $("#freeform").focus()
        }
    })
    
})

$(document).on({
    mouseenter: function () {
        $(this).css({
            "background-color" : "#e4f2e8"
        });
    },
    mouseleave: function () {
        $(this).css({
            "background-color" : "white"
        });
    }
}, '.new-mem-info');

$(document).on('click', '#new-merch-btn', function () {
    $.ajax({
        url: '/collageCommunity/pages/new_merch.php',
        method: 'POST',
        data: {
            circle_id : circleId
        },
        success: function (data) {
            $('.floaters').html(data)
            $('.floaters').css({
                "width" : "40%",
                "height" : "80%",
                "display" : "block",
                "background-color": "white",
                "position": "fixed",
                "left": "50%",
                "top": "70%",
                "transform": "translate(-50%, -70%)",
                "border" : "1px black solid"
            })
            $('.main-wrapper').css({
                "height" : "100%",
                "width" : "100%",
                'margin-bottom' : '10px',
                'overflow-y': 'auto'
            })
            $('#closeblock').css({
                "font-size": "2rem",
                "cursor": "pointer",
                "position":"absolute",
                "right" : '0px'
            })
            $('.img-preview-wrapper').css({
                "width" : "100%",
                'margin' : '10px 0',
            })
            $('.img-preview').css({
                'display': 'flex',
                'justify-content': 'center'
            })
            $('.img-preview img').css({
                "width" : "60%",
                'cursor' : 'pointer',
                'border-radius': '5px'
            })
            $('#filec').css({
                "display" : "none"
            })
            $('.inputs').css({
                'width' : "60%",
                'margin' : "auto"
            })
            $('.inputs input').css({
                'font-size' : '20px',
                'margin-bottom' : '5px'
            })
            $('.merch-submit').css({
                'width' : 'fit-content',
                'margin' : 'auto',
            })
            $('#er-msg').css({
                'width' : '60%',
                'margin' : 'auto',
                'padding' : '10px',
                'text-align' : 'center',
                'background-color' : '#f7c3c3',
                'color' : '#e60909',
                'border-radius' : '5px',
                'border' : '1px solid #e60909',
                'display' : 'none'
            })
            $('.img-preview img').on('click', function () {
                $('#filec').click()
            })
            $('#filec').on('change', function () {
                var fileInput = $('#filec')[0];
                if (fileInput.files.length > 0) {
                    $('#image').attr('src', URL.createObjectURL(fileInput.files[0]));
                }
            })
        }
    })
})

$(document).on('submit', '#merch-form', function (e) {
    // if ($('#filec').val() == "") {
    //     $('#er-msg').html('No Image Selected')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if ($('#merch-name').val() == "") {
    //     $('#er-msg').html('Merch Name is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if ($('#merch-price').val() == "") {
    //     $('#er-msg').html('Merch Price is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if (isNaN($('#merch-price').val())) {
    //     $('#er-msg').html('Merch Price must be a Number')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else{
        e.preventDefault();    
        var formData = new FormData(this);

        $.ajax({
            url: '/collageCommunity/pages/back/new_merch_back.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log(data);
                callAjax(circleId, 'merch', '.posts')
                $('.floaters').html("");
                $('.floaters').css({
                    "display" : 'none'
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });
    // }
    
});

$(document).on('click', '.merch-box', function () {
    var self = $(this);
    $.ajax({
        url: '/collageCommunity/pages/fetch_merch_info.php',
        method: 'POST',
        success: function (data) {
            $('.more-info').html('')
            $('.merch-card').css({
                'width' : '40%',
                'display' : 'block'
            })
            $('.merch-box').css({
                'width': '100%'
            })
            var closestAns = self.closest('.merch-card')
            var moreInfoBox = closestAns.find('.more-info');
            moreInfoBox.html(data);
            $(closestAns).css({
                'width' : '80%',
                'display' : 'flex',
                'justify-content' : 'space-around'
            })
            $(self).css({
                'width': '50%'
            })
            $(moreInfoBox).css({
                'margin-top': '20px',
            })
            $('.ind-bar').css({
                'position': 'relative',
                'display': 'inline-block'
            })
            $('.ind-bar label').css({
                'cursor': 'pointer',
                'color': '#04AA6D',
                'user-select': 'none',
                'border': '1px solid #e6e6e6',
                'padding': '0.75em 0.5em',
                'height': '3em',
                'width': '3em',
                'overflow': 'hidden',
                'display': 'block',
                'text-align': 'center',
                'border-radius': '4px',
            })
            $('.ind-bar input[type="radio"]').on('change', function() {
                $('label').css({
                    'color' : '#04AA6D',
                    'background-color' : 'white',
                });
                if ($(this).is(':checked')) {
                    $(this).next('label').css({
                        'color' : 'white',
                        'background-color' : '#04AA6D',
                    });
                }
                $('#o-msg').css({
                    'display' : 'none',
                })
            })
            $('.ind-bar input').css({
                'display': 'none'
            })
            $('.merch-qty').css({
                'width' : '50px',
                'margin' : 'auto'
            })
            $('.merch-closeblock').css({
                "font-size": "2rem",
                "cursor": "pointer",
                "position":"absolute",
                "right" : '0px',
                'top' : '0px'
            })
            $('.place-order-btn').css({
                'width' : 'fit-content',
                'padding' : '10px',
                'margin' : 'auto',
                'background-color' : '#04AA6D',
                'color' : 'white',
                'font-family' : 'poppins',
                'border-radius' : '5px',
                'margin-top' : '20px',
                'cursor' : 'pointer'
            })
            $('.merch-closeblock').on('click', function() {
                closestAns.find('.more-info').html('')
                $(closestAns).css({
                    'width' : '40%',
                    'display' : 'block'
                })
                $(self).css({
                    'width': '100%'
                })
            })
            $('#o-msg').css({
                'background-color' : '#dbfff4',
                'padding' : '10px',
                'font-family' : 'Poppins',
                'border' : '1px solid #04AA6D',
                'color' : '#04AA6D',
                'border-radius' : '5px',
                'display' : 'none'
            })
            $('.place-order-btn').on('click', function() {

                if ($(this).attr('id') == 'place') {
                    if ($('input[name="size"]:checked').length > 0) {
                        var selectedValue = $('input[name="size"]:checked').val();
                        var qty = $('#qty').val();
                        var merchId = self.attr('id');
                        placeMerchOrder(selectedValue, qty, merchId);
                    }else{
                        $o_msg = "Size Not Selected";
                        $('#o-msg').html($o_msg)
                        $('#o-msg').css({
                            'background-color' : '#f7c3c3',
                            'border' : '1px solid #e60909',
                            'color' : '#e60909',
                            'display' : 'block'
                        })
                    }
                }else if ($(this).attr('id') == 'cancel') {
                    window.location.href = "/collageCommunity/pages/profile_page.php";
                }
            })
            var divid = closestAns.find('.merch-box').attr('id');
            $("html, body").animate({
                scrollTop: $('#' + divid).offset().top - 100
              }, 500);
    
        }
    })
})

$(document).on('click', '.edit', function() {
    window.location.href = "edit_circle.php?comm_id="+circleId;
})

$(document).on('click', '.reg-btn', function(){
    
    var self = $(this)
    var type = self.attr('data');
    var eventId = self.attr('id');
    console.log(type)
    console.log(self)
    console.log(eventId)
    if (type == 'register') {
        var ajaxType = 'register';
        $.ajax({
            url: 'back/event_register.php',
            method: 'POST',
            data: {
                eventId : eventId,
                ajaxType : ajaxType
            },
            success: function (data) {
                console.log(data);
                if (data.status == 'success') {
                    console.log('success');
                    self.attr('data', 'cancel')
                    self.html("Cancel Registration")
                    self.css({
                        'width' : 'fit-content',
                        'margin' : 'auto',
                        'padding' : '4px',
                        'border-radius' : '5px',
                        'background-color' : 'rgb(252, 186, 3)',
                        'color' : 'white',
                        'font-family' : 'poppins',
                        'cursor' : 'pointer'
                    })
                }else if(data.status == 'error'){
                    console.log('error in uploading')
                }
            }
        })
    }else if (type == 'cancel') {
        var ajaxType = 'cancel';
        $.ajax({
            url: 'back/event_register.php',
            method: 'POST',
            data: {
                eventId : eventId,
                ajaxType : ajaxType
            },
            success: function (data) {
                console.log(data);
                if (data.status == 'success') {
                    console.log('success');
                    self.attr('data', 'register')
                    self.html("Register")
                    self.css({
                        'width' : 'fit-content',
                        'margin' : 'auto',
                        'padding' : '4px',
                        'border-radius' : '5px',
                        'background-color' : '#04AA6D',
                        'color' : 'white',
                        'font-family' : 'poppins',
                        'cursor' : 'pointer'
                    })
                }else if(data.status == 'error'){
                    console.log('error in uploading')
                }
            }
        })
    }else if (type == 'login-first') {
        window.location.href = "/collageCommunity/pages/login-form.php?type=loginfirst"
    }
    
})

$(document).on('click', '#new-event-btn', function() {
    $.ajax({
        url: '/collageCommunity/pages/new_event.php',
        method: 'POST',
        data: {
            circle_id : circleId
        },
        success: function (data) {
            $('.floaters').html(data)
            $('.opti').hide()
            $('#event-venue-wrapper').show()
            $('.floaters').css({
                "width" : "35%",
                "height" : "80%",
                "display" : "block",
                "background-color": "white",
                "position": "fixed",
                "left": "50%",
                "top": "70%",
                "transform": "translate(-50%, -70%)",
                "border" : "1px black solid"
            })
            $('.main-wrapper').css({
                "height" : "100%",
                "width" : "100%",
                'margin-bottom' : '10px',
                'overflow-y': 'auto'
            })
            $('#closeblock').css({
                "font-size": "2rem",
                "cursor": "pointer",
                "position":"absolute",
                "right" : '0px'
            })
            $('.ind-wrapper').css({
                'width' : "70%",
                'margin' : "auto"
            })
            $('.ind-wrapper input').css({
                'font-size' : '20px',
                'margin-bottom' : '5px',
                'background-color' : '#dbfff4'
            })
            $('.event-submit').css({
                'width' : 'fit-content',
                'margin' : 'auto',
            })
            $('#er-msg').css({
                'width' : '60%',
                'margin' : 'auto',
                'padding' : '10px',
                'text-align' : 'center',
                'background-color' : '#f7c3c3',
                'color' : '#e60909',
                'border-radius' : '5px',
                'border' : '1px solid #e60909',
                'display' : 'none'
            })
        }
    })
})

$(document).on('change', '#event-mode', function () {
    var selectedValue = $(this).val();
    console.log(selectedValue)
    switch (selectedValue) {
        case 'Offline':
            // $('.opti').html('')
          $('#event-venue-wrapper').show()
          $('#event-gmeet-wrapper').hide()
          break;
        case 'Online':
            $('#event-venue-wrapper').hide()
              $('#event-gmeet-wrapper').show()
          break;
      }
})

$(document).on('submit', '#event-form', function (e) {
    // if ($('#event-name-wrapper input').val() == "") {
    //     $('#er-msg').html('Event Name is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if ($('#event-disc').val() == "") {
    //     $('#er-msg').html('Event Discription is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if ($('#event-mode').val() == "Offline" && $('#event-venue').val() == "") {
    //     $('#er-msg').html('Event Venue is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if ($('#event-mode').val() == "Online" && $('#event-gmeet').val() == "") {
    //     $('#er-msg').html('Event Gmeet Link is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if ($('#event-date').val() == "") {
    //     $('#er-msg').html('Event Date is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if ($('#event-time').val() == "") {
    //     $('#er-msg').html('Event Time is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else if ($('#event-fees').val() == "") {
    //     $('#er-msg').html('Registration Fees is Empty')
    //     $('#er-msg').css({
    //         'display' : 'block'
    //     })
    //     $('.main-wrapper').animate({ scrollTop: 0 }, 500);
    // }else{
        
        $('#button_clicked').val('true');
        var formData = new FormData(this);
        e.preventDefault();
        console.log('here1')
        $.ajax({
            url: '/collageCommunity/pages/back/new_event_back.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log(data)
                callEventsAjax(circleId, '.posts')
                $('.floaters').html("");
                $('.floaters').css({
                    "display" : 'none'
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });
    // }
    
});

$(document).on('click', function(event) {
    var threadFormWrapper = $('.floaters');

    // Check if the clicked element is not inside the threadFormWrapper
    if (!threadFormWrapper.is(event.target) && threadFormWrapper.has(event.target).length === 0) {
      threadFormWrapper.hide();
    }
  });

//   // Prevent clicks inside the form from hiding it
  $('#thread_form').on('click', function(event) {
    event.stopPropagation();
  });