<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@extends('layouts.app')

@section('title', 'My Posts')

@if(session('message'))
    <p><b>{{session('message')}}</b></p>
@endif

@section('content')
    <p>This is my body content.</p>

    <a href="{{route('posts.create')}}" class="btn btn-primary">Create New Post</a>

    <p> </p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><p class="h4">Title</p></th>
            <th scope="col"><p class="h4">Author</p></th>
            <th scope="col"><p class="h4">Date Posted</p></th>
            <th scope="col"><p class="h4">Handle</p></th>
        </tr>
        </thead>
        <tbody>


        @foreach ($posts as $post)

            <tr>
                <td>{{$post->title}}
                    @can('update-post', $post)

                        <form method="POST"
                              action="{{route('posts.destroy',['post' => $post])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link" type="submit">Delete</button>
                            <a href="{{route('posts.edit',['post'=>$post])}}" class="btn btn-link">Edit</a>
                        </form>
                    @endcan</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>


                        <a href="{{route('posts.show',['post'=>$post])}}" class="btn btn-primary">Read More</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!!$posts->links() !!}

@endsection
