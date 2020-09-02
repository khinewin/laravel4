@extends('layouts.app')

@section('title', "Home")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title"> <i class="fas fa-tachometer-alt"></i> Dashboard</div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>{{ $chart1->options['chart_title'] }}</h3>
                                {!! $chart1->renderHtml() !!}
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="card shadow">
                                <div class="card-body">
                                <div class="card-title">Posts <span class="badge badge-pill badge-primary float-right">{{count($posts)}}</span></div>
                                <hr>
                                <a href="{{route('posts')}}" class="btn btn-block">More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card shadow">
                                <div class="card-body">
                                <div class="card-title">Categories <span class="badge badge-pill badge-success float-right">{{count($cats)}}</span></div>
                                <hr>
                                <a href="{{route('categories')}}" class="btn btn-block">More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection