@extends('layouts.app')

@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-primary">Create New Post</a>
    <p> </p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><p class="h4">Title of the post</p></th>
            <th scope="col"><p class="h4">Posted By</p></th>
            <th scope="col"><p class="h4">Date Posted</p></th>
            <th scope="col"><p class="h4">Category</p></th>
            <th scope="col"><p class="h4">Read</p></th>
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
                <td>{{$post->category->body}}</td>
                <td>
                    <a href="{{route('posts.show',['post'=>$post])}}" class="btn btn-primary">Read More</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!!$posts->links() !!}
@endsection
