@foreach($comments as $comment)
<div class="display-comment" >
<strong>{{ $comment->user->name }}</strong>
<p>{{ $post->body }}
    @can('update-comment',$comment)
    <a href="{{route('comments.edit',['post'=>$post], ['comment'=>$comment ])}}"><button type="button" class="btn btn-primary loat-left">Edit</button></a>
    @endcan
</p>
</div>
@endforeach
