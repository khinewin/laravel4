@extends('layouts.app')

@section('title', 'Categories')


@section('content')

    <div class="card shadow-sm">
        <div class="card-body">
            @include("partials.msg")
            <div class="card-title"> <i class="fas fa-clipboard-list"></i> Categories</div>
            <div class="row">
                <div class="col-sm-8">
                    <table class="table table-hover">
                        <tr>
                            <td>Category Name</td>
                            <td>Actions</td>
                        </tr>
                        @foreach ($cats as $c)
                                <tr>
                                    <td>{{$c->category_name}}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#e{{$c->id}}"><i class="fas fa-edit"></i></a>
                                        
                                        <!--Edit Modal -->
                                        <div class="modal fade" id="e{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('update.category')}}" method="post">
                                                        <input type="hidden" name="id" value="{{$c->id}}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="category_name">Category Name</label>
                                                            <input value="{{$c->category_name}}" type="text" name="category_name" id="category_name" class="form-control">
                                                        </div>
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>    
                                        <!--End Edit Modal-->
                                        <a data-toggle="modal" data-target="#d{{$c->id}}" href="#" class="text-danger"><i class="fas fa-times-circle"></i></a>

                                        <!--Delete Modal -->
                                        <div class="modal fade" id="d{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body text-center text-danger">
                                                    <i class="fas fa-exclamation-circle fa-3x"></i>
                                                    <p>
                                                        This will remove selected category from database, are you sure ?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('delete.category',['id'=>$c->id])}}">Agree</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--End Delete Modal -->
                                    </td>
                                </tr>

                        @endforeach
                    </table>
                </div>
                <div class="col-sm-4">
                    <div class="card-title">Add Category</div>
                    <hr>
                    <form method="post" action="{{route('new.category')}}">
                        @csrf
                        <div class="form-group">
                            <label for="cat_name">Category Name</label>
                            <input type="text" id="cat_name"  name="category_name" class="form-control">
                            @if($errors->has('category_name')) <span>{{$errors->first('category_name')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop