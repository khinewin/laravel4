@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

    <div class="card shadow">
        <div class="card-body">
            <div class="card-title"><i class="fas fa-edit"></i> Edit Post
            </div>

            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <form enctype="multipart/form-data" method="post" action="{{route('post.update')}}">
                        @method('put')
                        <input type="hidden" name="id" value="{{$post->id}}">               
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{$post->title}}" type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Select Post Image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="video">Post Video</label>
                            <textarea name="video" id="video" class="form-control">{{$post->video}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control">{{$post->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cat_id">Category</label>
                            <select name="cat_id" id="cat_id" class="custom-select">
                                <option value="">Select Category</option>
                                @foreach ($cats as $c )
                                    <option @if($c->id==$post->cat_id) selected @endif value="{{$c->id}}">{{$c->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="{{route('posts')}}" class="btn btn-secondary btn-lg">Close</a>
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                       
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@stop