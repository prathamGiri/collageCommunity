
var socket = new WebSocket('ws://localhost:8080');
        socket.onopen = function(e) {
            console.log("Connection established!");
        };

        socket.onmessage = function(e) {
            // $postId = e.data.post_id;
            postId = e.data;
            $.ajax({
                url: 'back/dynamic_msg.php',
                method: 'POST',
                data: {
                    postId : postId
                },
                success: function (data) {
                    $(".wrapper").append(data);
                }
            })
        };