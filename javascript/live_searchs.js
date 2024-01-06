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
                        // var inputWidth = $('#live_search').outerWidth();
                        // var inputPosition = $('#live_search').offset();
                        $('#search_result').css({
                            'display': 'block',
                        //     'text-align' : 'center',
                        //     'margin':'2px 0',
                            'width': '100%',
                            'position': 'absolute',
                        //     'left': inputPosition.left + 'px'
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
                            var collegeid = $(this).attr("id");
                            window.location.href = "/collageCommunity/pages/community_page.php?commid=" + collegeid;
                        });
                }
            });
        } 
        else {
            $('#search_result').css('display', 'none');
        }
    });
    // Handle hiding search_result when clicking outside of it
    $(document).on("click", function (event) {
        if (!$(event.target).closest('#search_result, #live_search').length) {
            $('#search_result').css('display', 'none');
        }
    });

    // Keep search_result visible when live_search is focused
    $("#live_search").focusin(function () {
        $('#search_result').css('display', 'block');
    });
});

