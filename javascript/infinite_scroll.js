
$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()-1) {
        var last_id = $(".post-id:last").attr("id");
        loadMoreData(last_id);
    }
});


function loadMoreData(last_id){
  $.ajax(
        {
            url: '/collageCommunity/pages/back/index_post.php?last_id=' + last_id,
            type: "get",
            beforeSend: function()
            {
                $('.ajax-load').show();
            }
        })
        .done(function(data)
        {
            if (data == "") {
                return;
            }else{
                $('.ajax-load').hide();
                $("#posts").append(data);
            }
            
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('server not responding...');
        });
}
