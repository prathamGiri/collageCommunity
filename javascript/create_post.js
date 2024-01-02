

function PreviewImage() {
    document.getElementById("file-preview-wrapper").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image_file").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};

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
            url: 'back/save_post.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                
                $('#posts').prepend(data);

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

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    
})


// window.onload = function() {
//     console.log("123");
//     let createpost = document.getElementById("createpost");
//     let postbox = document.getElementById("postblock");
//     let closepostblock = document.getElementById("closepostblock");
//     wrap = document.getElementById('file-preview-wrapper');
//     createpost.onclick = function() {
//         createpost.style.display = "none";
//         postbox.style.display = "block";
//     };
  
//     closepostblock.onclick = function() {
//         postbox.style.display = "none";
//         createpost.style.display = "flex";
//     };
// };  
