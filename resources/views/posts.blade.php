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
        </div>
        <div class="col-4 tags-container">
            <div class="tags-container-title px-2">
                <h5>Обсуждаемые темы</h5>
            </div>
            <div class="list-group">
                @foreach($tagsUnique as $tag)
                    <a href="#" class="list-group-item list-group-item-action">{{$tag}}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
