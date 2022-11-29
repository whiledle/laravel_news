@extends('layouts.main')
@section('container')
    <div class="row">
        <h4 class="mb-4">Результаты поиска:</h4>
        <div class="news-tags-container mb-4">
            @foreach($tags as $tag)
                <a href="{{ route('tag.show', $tag->name) }}" class="news-tag-container btn btn-info btn-sm me-3">
                    <span>{{ $tag->name }}</span>
                </a>
            @endforeach
        </div>
        <div class="col-8 posts-container">
            @foreach($posts as $post)
                <div class="media mb-3 pb-3" style="border-bottom: 1px solid #b1b1b1">
                    <div class="media-body">
                        <a href="{{ route('post.show', $post->id) }}">
                            <h5 class="mt-0">{{$post->title}}</h5>
                        </a>
                        <div class="posts-about">
                            <span>{{$post->created_at->format('d.m.Y')}}</span>
                            @foreach(explode(',', $post->post_tags) as $tag)
                                <span class="badge rounded-pill bg-secondary">{{$tag}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
