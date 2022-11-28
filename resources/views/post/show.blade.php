@extends('layouts.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="news-container">
                <div class="news-header">
                    <div class="news-created-time">
                        <p class="m-0">{{$post->created_at->format('d.m.Y')}}</p>
                    </div>
                    <div class="news-title mt-2">
                        <h3>{{ $post->title }}</h3>
                    </div>
                </div>
                <div class="news-content">
                    <div class="news-main-text">
                        <p>{{ $post->text }}</p>
                    </div>
                    <div class="news-tags-container justify-content-center d-flex">
                        @foreach($tags as $tag)
                            <a href="#" class="news-tag-container btn btn-secondary btn-sm me-3">
                                <span>{{ $tag }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
