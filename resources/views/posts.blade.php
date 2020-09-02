@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="card shadow">
        <div class="card-body">
            <div class="card-title"><i class="fab fa-artstation"></i> Posts
                <a href="{{route('post.new')}}" class="float-right small"><i class="fas fa-plus-circle"></i> Add Post</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Images</td>
                        <td>Videos</td>
                        <td>Category</td>
                        <td>Actions</td>
                    </tr>
                    @foreach ($posts as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->title}}</td>
                            <td class="col-2">
                            <img src="{{route('post.images',['file_name'=>$p->image])}}" class="img-fluid">
                            </td>
                            <td>
                                <button data-toggle="modal" data-target="#v{{$p->id}}" type="button" class="btn btn-block"> <i class="fa fa-eye"></i> View</button>
                                <!--video view Modal -->
                                    <div class="modal fade" id="v{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$p->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="embed-responsive embed-responsive-21by9">
                                                    {!!$p->video!!}
                                              </div>
                                        </div>
                                       
                                        </div>
                                    </div>
                                    </div>
                            </td>
                            <td>
                                {{$p->cat->category_name}}
                            </td>
                            <td>
                                <a href="{{route('edit.post',['id'=>$p->id])}}" class="btn btn-sm btn-info rounded-circle"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger rounded-circle"><i class="fas fa-times-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </thead>
            </table>
            
        </div>
    </div>

@stop