    $(document).on('click', ".options-btn", function() {
        var dropdowmBtn = $(this).closest('.head-wrapper').find('.dropdown-options')
        $('.dropdown-options').css({
            'display' : 'none'
        })
        $(dropdowmBtn).css({
            'display' : 'block'
        });
    });
    $(document).on('click', function(event) {
      if (!$(event.target).closest('.options-btn, .dropdown-options').length) {
        $('.dropdown-options').css({
            'display' : 'none'
          });
      }
    });
    $(document).on('click', '.ind-opt-btn', function () {
        
        var self = $(this);
        var opt_type = self.attr('id');
        var post_id = self.closest('.ind_post').attr('id')
        console.log("clicked" + opt_type)
            $.ajax({
                url : '/collageCommunity/pages/back/delete_post.php',
                method : 'post',
                data : {
                    post_id : post_id,
                    opt_type : opt_type
                },
                success : function(data){
                    if (data.status == 'success') {
                        self.closest('.ind_post').html('Post Deleted Successfully')
                        console.log("postdeletedsuccesfully")
                    }else{
                        console.log('error:could not delete')
                    }
                }
            })
    })