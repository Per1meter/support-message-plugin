
// ajax delete queries

jQuery(document).ready(function($) {
    $('.queries-delete-button').on('click', function() {
        var postDelete = $(this).closest('.queries-post');
        var dataToServer = {
            id : postDelete.attr('post-id'),
            action: "delete_post"
        };

        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: dataToServer,
            success: function(){
                postDelete.remove();
                let message = $('.message-deleted').addClass('active');
                setTimeout(function () {
                    message.removeClass('active');
                }, 2000);
            }
        });
    });
});