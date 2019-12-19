
@extends('layouts.app')

@section('title', 'Create Post')

@section('content')




    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h1>Create post</h1>

                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title <span class="require">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" />
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="5" class="form-control" name ="body" value="{{old('body')}}" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category"> Category (one word)<span class="require">*</span></label>
                        <input type="text" class="form-control" name="category"  />
                    </div>

                    <input type="file" name="featured_image" class="form-control">

                    <div class="form-group">
                        <p><span class="require">*</span> - required fields</p>
                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                        <a href="{{route('posts.index')}}" class="btn btn-link">Cancel</a>

                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection





