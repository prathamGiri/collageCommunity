$(document).ready(function () {
    $("#live_search").keyup(function () {
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: 'back/ajax.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function (data) {
                    $('#search_result').html(data);
                    // $('#search_result').css('display', 'block');
                    // $('#search_result').css('background-color', 'white');
                    $('#search_result').css({
                        'position':'absolute',
                        'width':'30rem',
                        'background-color': 'white',
                        'display': 'block',
                        'margin':'0.1rem',
                        'translate(X)':'10%',
                        'z-index':'2',
                        'margin':'0.1rem',
                        'font-family':'poppins',
                        'font-size':'0.8rem'
                        
                      });
                      
                    $("#live_search").focusout(function () {
                        $('#search_result').css('display', 'none');
                    });
                    $("#live_search").focusin(function () {
                        $('#search_result').css('display', 'block');
                    });
                }
            });
        } else {
            $('#search_result').css('display', 'none');
        }
    });
});