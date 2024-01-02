$(document).ready(function(){
    $('.ind-opt').on('click', function () {
        type = $(this).attr('id');
        if (type == 'c-pass') {
            window.location.href = "/collageCommunity/pages/change_password.php"
        }else if (type == 'e-pro') {
            window.location.href = "/collageCommunity/pages/edit_profile.php"
        }
    })
})