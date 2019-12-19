
@extends('layouts.app')

@section('content')




    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h1>Edit post</h1>

                <form method="POST" action="{{ route('posts.update',['post'=>$post])}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="title">Title <span class="require">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}" />
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="5" class="form-control" name ="body">{{$post->body}}</textarea>
                    </div>

                    <div class="form-group">
                        <p><span class="require">*</span> - required fields</p>
                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection





