@extends('layouts.app')

@section('content')

    <div class="jumbotron jumbotron-fluid">
        <div class="container">

            <h1 class="display-4">{{ $post->title }}</h1>
            <img src="{{asset('images/' . $post->image)}}">
            <div class="card">
                <div class="card-body">
                    {{ $post->body }}
                </div>
            </div>




                <div class="card">
                    <div class="card-body">

                        <h4>Comments</h4>
                        <hr/>
                        @include('posts.displayComments', ['comments' => $post->comments, 'post' => $post])

                        <hr/>
                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>

@endsection


