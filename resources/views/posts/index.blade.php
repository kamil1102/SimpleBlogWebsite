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
    <ul>
        @foreach ($posts as $post)

            <section>
                <div class="container py-3">
                    <div class="card">
                        <div class="row ">
                            <div class="col-md-4">
                                <img src="https://www.seowordpress.pl/wp-content/uploads/2014/10/blog.jpg" class="w-100">
                            </div>
                            <div class="col-md-8 px-3">
                                <div class="card-block px-3">
                                    <h4 class="card-title">{{$post->title}}</h4>
                                    <p class="card-text">{{$post->body}} </p>
                                    <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-primary">Read More</a>
                                    @can('update-post', $post)
                                    <a href="{{route('posts.edit',['post'=>$post])}}" class="btn btn-primary">Edit Post</a>
                                    @endcan
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        @endforeach
        {{ $posts ->links()}}
    </ul>
    <a href="{{route('posts.create')}}">Create New Post</a>
@endsection
