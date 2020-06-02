$(document).ready(function() {

    $('#postComment').click(function() {
        $.ajax({
            type: "POST",
            url: '/test',
            data: {
                comment: $('#postMessage').val(),
                postId: $('#postId').val()
            },
            success: function (data, success) {
                var news = jQuery.parseJSON(data);
                var length = news.length - 1;
                    $('#newComment').prepend("" +
                        "<ul>" +
                            "<p><b>" + news[length].userId + "</b></p>" +
                            "<p class='message'> - " + news[length].comment + "</p>" +
                            "<p><b>Created: </b>" + news[length].created + "</p>" +
                        "</ul>");

                $('#postMessage').val('');
            }
        });
    });

    $('.comment_section').ready(function() {
        $.ajax({
            type: "GET",
            url: '/test2',
            data: {
                postId: $('#postId').val()
            },
            success: function (data, success) {
                var news = jQuery.parseJSON(data);

                $.each( news, function( key, value ) {
                    $('#newComment').prepend("" +
                        "<ul>" +
                        "<p><b>" + news[key].userId + "</b></p>" +
                        "<p class='message'> - " + news[key].comment + "</p>" +
                        "<p><b>Created: </b>" + news[key].created + "</p>" +
                        "</ul>");
                });

                $('#postMessage').val('');
            }
        });
    });

});
