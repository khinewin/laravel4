<?php

namespace App\Http\Controllers;

use DB;
use App\Post;
use App\Cat;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Posts by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Post',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
        ];
        $chart1 = new LaravelChart($chart_options);

        $posts=Post::all();
        $cats=Cat::all();
        
        return view('home', compact('chart1','cats', 'posts'));
      
    }
}
//https://packagist.org/packages/laraveldaily/laravel-charts
