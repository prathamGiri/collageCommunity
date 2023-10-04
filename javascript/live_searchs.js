$(document).ready(function () {
    
    $("#live_search").keyup(function () {
        var page = $("#live_search").attr("page")
        console.log(page);
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: 'back/live_search.php',
                method: 'POST',
                data: {
                    page: page,
                    query: query
                },
                success: function (data) {
                    $('#search_result').html(data);
                    $('#search_result').css({
                        'display': 'block',
                        'text-align' : 'center',
                        'position':'absolute',
                        'margin':'2px 0',
                        'width':'100%'
                      });
                      $('#search_result ul').css({
                        'width':$("#live_search").css("width")
                      })
                    $('#search_result li').css({
                        'cursor': 'pointer',
                        'border-bottom': '1px solid black',
                        'font-family':'poppins',
                        'background-color': 'white',
                        'width':$("#live_search").css("width"),
                        'padding-bottom': '2px',
                        'padding-top': '2px',
                        'font-size': '18px',
                        'margin':'auto',
                        'position':'relative',
                        'z-index' : '2'
                    })

                    $("#live_search").focusout(function () {
                        setTimeout(function () {
                            $('#search_result').css('display', 'none');
                        }, 200);
                    });

                    $('#search_result li').click(function () {
                        var institute = $(this).attr("institute");
                        var city = $(this).attr("city");
                        var state = $(this).attr("state");
                        var country = $(this).attr("country");
                        $('input[name=institute]').val(institute);
                        $('input[name=city]').val(city);
                        $('input[name=state]').val(state);
                        $('input[name=country]').val(country);
                    });

                    $("#live_search").focusin(function () {
                        $('#search_result').css('display', 'block');
                    });
                }
            });
        } 
        else {
            $('#search_result').css('display', 'none');
        }
    });
});