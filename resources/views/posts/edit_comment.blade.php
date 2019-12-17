
@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h1>Create post</h1>

                <form method="POST" action="{{ route('comments.update',['comment'=>$comment])}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

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





