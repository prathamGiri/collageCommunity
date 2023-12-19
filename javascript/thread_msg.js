

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
    
        $.ajax({
            url: 'back/thread_msg_save.php',
            type: 'POST',
            data: formData,
            dataType: "json",
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
                sendPostIdToWebSocket(postId);

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    
})
