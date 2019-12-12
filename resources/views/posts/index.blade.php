@extends('layouts.app')

@section('title', 'My Posts')

@if(session('message'))
    <p><b>{{session('message')}}</b></p>
@endif

@section('content')
    <p>This is my body content.</p>
    <ul>
        @foreach ($posts as $post)
            <li><a  href="{{route('posts.show',['id'=>$post->id])}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
    <a href="{{route('posts.create')}}">Create New Post</a>
@endsection