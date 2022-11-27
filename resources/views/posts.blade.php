@extends('layouts.main')
@section('container')
    <div class="row">
        <div class="col-8 posts-container">
            @foreach($posts as $post)
                <div class="media mb-3 pb-3" style="border-bottom: 1px solid #b1b1b1">
                    <div class="media-body">
                        <h5 class="mt-0">{{$post->title}}</h5>
                        <div class="posts-about">
                            <span>{{$post->created_at->format('d.m.Y')}}</span>
                            @foreach(explode(',', $post->tags) as $tag)
                                <span class="badge rounded-pill bg-secondary">{{$tag}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="more-button-container">
                <button id="show_more" counter="2" type="button" class="btn btn-primary btn-sm">Показать еще</button>
            </div>
                <script>
                    $('#show_more').click(function() {
                        var counter = $(this).attr('counter');
                        $.ajax({
                            url: "{{ route('post.showPosts') }}",
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
                                    })
                                    $('.more-button-container').before('<div class="media mb-3 pb-3" style="border-bottom: 1px solid #b1b1b1">\
                                        <div class="media-body">\
                                            <h5 class="mt-0">'+ value.title +'</h5>\
                                            <div class="posts-about">\
                                                <span>'+ value.date +'</span>\
                                                '+ string +'\
                                            </div>\
                                        </div>\
                                    </div>');
                                })
                            },
                        });
                    })
                </script>
        </div>
    </div>
@endsection
