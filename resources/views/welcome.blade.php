@extends('layouts.front')

@section('title', "Welcome")

@section("content")

    <div class="row">
        <div class="col-sm-2">
            <div class="mt-5">
                <form method="get" action="{{route('search.posts')}}">
                    <div class="form-group">
                        <label for="search_post">Search Posts</label>
                        <input  type="search" id="search_post" name="post_title" required class="form-control">
                    </div>
                </form>
            </div>

            <table class="table table-borderless table-hover">
                <tr>
                    <th>Menu</th>
                </tr>
                @foreach($cats as $c)
                    <tr>
                        <td><a class="d-block" href="{{route('filter.by.category',['id'=>$c['id']])}}"><?php echo $c['category_name'] ?></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-sm-10">
            <div class="row mt-3">
                @foreach ($posts  as  $p)
                    <div class="col-sm-6 col-md-3">
                        <div class="card shadow">
                            <img src="{{route('front.images',['file_name'=>$p->image])}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$p->title}}</h5>
                                <p class="card-text">
                                    {!! Str::limit($p->content, 150, ' ...') !!}
                                </p>
                                <div class="card-action">
                                    <span class="small text-secondary">
                                        Tags : {{$p->cat->category_name}}
                                    </span> ,
                                    <span class="small text-secondary">
                                        Post Date : {{$p->created_at->diffForHumans()}}
                                    </span>
                                    <a href="{{route('read.more',['id'=>$p->id])}}" class="btn btn-outline-primary btn-block mt-2">Read More >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$posts->links()}}
            </div>
        </div>
    </div>

@stop