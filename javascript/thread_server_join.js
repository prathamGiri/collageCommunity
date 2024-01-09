
var socket = new WebSocket('ws://localhost:8080');
socket.onopen = function(e) {
    console.log("Connection established!");
};

socket.onmessage = function(event) {
    const data = JSON.parse(event.data);

    // Check the 'type' property to determine the type of message
    if (data.type === 'chat') {
        const circleId = data.circleId;
        const threadId = data.threadId;
        const postId = data.post_id;

        $.ajax({
            url: 'back/dynamic_msg.php',
            type: 'POST',
            data: {
                circle_id : circleId,
                thread_id : threadId,
                post_id : postId
            },
            success: function (data) {
                if (data.status == 'current_thread') {
                    htmlContent = data.html;
                    $('.wrapper').append(htmlContent);
                }else if (data.status == 'different_thread') {
                    console.log("different_thread")
                }else if (data.status == 'no_thread') {
                    console.log("no_thread")
                }
                
            }
        })
        // Now you can use circleId, threadId, and postId in your client-side logic
        console.log(`Received chat message in Circle ${circleId}, Thread ${threadId}, Post ${postId}`);
    } else if(data.type == 'system'){
        console.log(data.message);
    }
};

function joinRoom(circleId, threadId = 'common') {
    if (socket.readyState === WebSocket.OPEN) {
        const joinData = {
            type: 'join',
            circleId: circleId,
            threadId: threadId
        };

        // Send the join request to the server
        socket.send(JSON.stringify(joinData));
    } else {
        // If the WebSocket connection is not open, wait for it to open and then join the room
        socket.addEventListener('open', function () {
            joinRoom(circleId, threadId);
        });
    }    
}

function sendPostIdToWebSocket(circleId, threadId, postId) {
    // Assuming 'webSocket' is your established WebSocket connection
    if (socket.readyState === WebSocket.OPEN) {
        const chatData = {
            type: 'chat', 
            circleId: circleId, 
            threadId: threadId, 
            postId: postId
        };
        socket.send(JSON.stringify(chatData));
    } else {
        console.error('WebSocket connection not open');
    }
}