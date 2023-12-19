

function PreviewImage() {
    document.getElementById("file-preview-wrapper").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image_file").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};
 
function sendPostIdToWebSocket(postId) {
    // Assuming 'webSocket' is your established WebSocket connection
    if (socket.readyState === WebSocket.OPEN) {
        socket.send(JSON.stringify({ post_id: postId }));
    } else {
        console.error('WebSocket connection not open');
    }
}

$(document).ready(function (){
    $('#createpost').on('click',function () {
        $('#createpost').css({
            'display' : 'none'
        })
        $('#postblock').css({
            'display': 'block'
        })
        $("#freeform").focus()
        $('.reply-box').html('')
        $(".reply-box").removeAttr("id");

    })

    $('#closepostblock').on('click',function () {
        $('#postblock').css({
            'display' : 'none'
        })
        $('#createpost').css({
            'display': 'flex'
        })
    })

    $("#post_form").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
        if ($(".reply-box").attr("id")) {
            var replyPostId = $('.reply-box').attr('id');
            formData.append('replyPostId', replyPostId);
        }
        
        $.ajax({
            url: 'back/thread_msg_save.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                var htmlContent = data.html;
                var postId = data.post_id;
                console.log(data);
                $('.wrapper').append(htmlContent);

                $('#freeform').val("");
                $('#image_file').val("");
                $('#video_file').val("");
                $('#uploadPreview').attr("src","")

                $('#file-preview-wrapper').css({
                    'display' : 'none'
                });
                $('#postblock').css({
                    'display' : 'none'
                })
                $('#createpost').css({
                    'display': 'flex'
                })
                sendPostIdToWebSocket(postId);

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    
})

