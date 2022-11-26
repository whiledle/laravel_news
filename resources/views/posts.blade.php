@extends('layouts.main')
@section('container')
    <div class="row">
        @foreach($posts as $post)
            <div>{{$post->title}}</div>
        @endforeach
    </div>
@endsection
