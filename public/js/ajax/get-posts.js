$('#show_more').click(function() {
    var counter = $(this).attr('counter');
    $.ajax({
        url: "/ajax-show",
        type:"GET",
        data:{page:counter},
        success:function(response){
            counter++;
            $('#show_more').attr('counter', counter);
            $.each(response.posts.data, function (key, value) {
                var string = '';
                var arr = value.tags.split(',');
                $.each(arr, function(k, tag) {
                    string += '<span class="badge rounded-pill bg-secondary">'+ tag +'</span>';
                });
                $('.more-button-container').before('<div class="media mb-3 pb-3" style="border-bottom: 1px solid #b1b1b1">\
                    <div class="media-body">\
                        <a href="posts/'+ value.id +'">\
                            <h5 class="mt-0">'+ value.title +'</h5>\
                        </a>\
                        <div class="posts-about">\
                            <span>'+ value.date +'</span>\
                            '+ string +'\
                        </div>\
                    </div>\
                </div>');
            });
        },
    });
});