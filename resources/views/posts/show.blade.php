@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center text-success">ItSolutionStuff.com</h3>
                        <br/>
                        <h2>{{ $post->title }}</h2>
                        <p>
                            {{ $post->body }}
                        </p>
                        <hr />
                        <h4>Display Comments</h4>

                        @include('posts.displayComments', ['comments' => $post->comments, 'post' => $post])

                        <hr />
                        <h4>Add comment</h4>
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
                        <form method="POST"
                              action="{{route('posts.destroy',['id' => $post->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






@section('content')
    <p>This is my body content.</p>
    <ul>
        <li>{{$post->id}}</li>
        <li>{{$post->title}}</li>
        <li>{{$post->body}}</li>
        <li>{{$post->user_id}}</li>

    </ul>

    <form method="POST"
        action="{{route('posts.destroy',['id' => $post->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
</form>


<p><a href="{{route('posts.index')}}">Back</a></p>
@endsection
