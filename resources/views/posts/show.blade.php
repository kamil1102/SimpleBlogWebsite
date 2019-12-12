@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <p>This is my body content.</p>
    <ul>     
        <li>{{$post->id}}</li>
        <li>{{$post->title}}</li>
        <li>{{$post->body}}</li>    
    </ul>

    <form method="POST"
        action="{{route('posts.destroy',['id' => $post->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
</form>




<p><a href="{{route('posts.index')}}">Back</a></p>
@endsection