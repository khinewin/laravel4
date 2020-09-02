@extends('layouts.front')

@section('title', $p->title)

@section("content")

    <div class="row mt-3">

        <div class="col-sm-8 offset-sm-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="embed-responsive embed-responsive-21by9">
                        {!!$p->video!!}
                    </div>
                    <h5 class="card-title">{{$p->title}}</h5>
                    <p class="card-text">
                        {{$p->content}}
                    </p>
                    <div class="card-action">                        
                        <span class="small text-secondary">
                            Tags : {{$p->cat->category_name}}
                        </span> ,
                        <span class="small text-secondary">
                            Post Date : {{$p->created_at->diffForHumans()}}
                        </span>
                        <a href="{{route('/')}}" class="btn btn-block mt-2">Back</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    @stop