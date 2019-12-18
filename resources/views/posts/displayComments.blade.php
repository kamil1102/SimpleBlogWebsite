

@foreach($comments as $comment)





    <div class="card">
        <div class="card-body">
            <p>Posted by <b>{{ $comment->user->name }}</b> at  {{ $comment->created_at }} </p>

            <p>{{ $comment->body }}.</p>

        </div>
        @can('update-comment',$comment)
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('comments.edit',['comment'=>$comment ])}}">Edit</a>
            </li>
            <li class="nav-item">
                <form method="POST"
                      action="{{route('comment.destroy',['id' => $comment->id])}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link" type="submit">Delete</button>

                </form>

            </li>
        </ul>
        @endcan

    </div>
    <p> </p>

@endforeach
