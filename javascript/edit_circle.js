
$(document).ready(function (){

    $('.image').on('click', function () {
        var target = $(this).closest('.img-inp').find('.file-inputs').attr('id')
        console.log(target)
        $('#'+target).click()
    })
    $('.file-inputs').on('change', function () {
        var target = $(this).attr('id');
        var imgIns = $('#'+target).closest('.img-inp').find('.image')
        var fileInput = $('#'+target)[0];
        if (fileInput.files.length > 0) {
            $(imgIns).attr('src', URL.createObjectURL(fileInput.files[0]));
        }
    })
})

$(document).on('submit', '#edit-circle-form', function (e) {
    $('#button_clicked').val('true');
    e.preventDefault();
    circleId = $('.ec-main-wrapper').attr('id');
    console.log(circleId)
    var formData = new FormData(this);

    $.ajax({
        url: '/collageCommunity/pages/back/save_circle_changes.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            console.log(data)
            window.location.href = "/collageCommunity/pages/community_page.php?commid="+circleId;
        },
        cache: false,
        contentType: false,
        processData: false
    });
});