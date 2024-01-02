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
                        var inputWidth = $('#live_search').outerWidth();
                        var inputPosition = $('#live_search').offset();
                        $('#search_result').css({
                            'display': 'block',
                            'text-align' : 'center',
                            'margin':'2px 0',
                            'width': inputWidth + 'px',
                            'position': 'absolute',
                            'left': inputPosition.left + 'px'
                        });
                        $('#search_result ul').css({
                            'list-style-type':'none',
                            'border':'1px solid black'
                        })
                        $('.ind-list').css({
                            'cursor': 'pointer',
                            'border-bottom': '1px solid black',
                            'font-family':'poppins',
                            'background-color': 'white',
                            'width':'100%',
                            'padding-bottom': '2px',
                            'padding-top': '2px',
                            'font-size': '18px',
                        })

                        $('.ind-list').on('click', function () {
                            var collegeid = $(this).attr("collegeid");
                            var institute = $(this).attr("institute");
                            // var city = $(this).attr("city");
                            // var state = $(this).attr("state");
                            // var country = $(this).attr("country");
                            console.log(collegeid);
                            console.log("ok");
                        
                            $('#live_search').val(institute);
                            $('#dummy').val(collegeid);
                            // $('#live_search input[name=city]').val(city);
                            // $('#live_search input[name=state]').val(state);
                            // $('#live_search input[name=country]').val(country);
                        });

                        $("#live_search").focusout(function () {
                            setTimeout(function () {
                                $('#search_result').css('display', 'none');
                            }, 200);
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

