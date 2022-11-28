@extends('layouts.main')
@section('container')
    <h2>{{ mb_strtoupper($tag) }}</h2>
    <div class="row mt-4">
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
