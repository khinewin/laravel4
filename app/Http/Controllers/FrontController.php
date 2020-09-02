<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cat;

class FrontController extends Controller
{
    public function getSearch(Request $request){
        $post_title=$request['post_title'];
        $posts=Post::where('title', "LIKE", "%$post%")
        ->orWhere('content', "LIKE", "%$post_title%")
        ->OrderBy('id', 'desc')
        ->paginate(8);
        $cats=Cat::get();
        return view ('welcome')->with(['posts'=>$posts,'cats'=>$cats]);
    }
    public function getFilterByCategory($id){
        $posts=Post::where('cat_id', $id)->OrderBy('id', 'desc')->paginate(8);
        $cats=Cat::get();
        return view ('welcome')->with(['posts'=>$posts,'cats'=>$cats]);
    }
    public function getWelcome(){
        $posts=Post::OrderBy('id', 'desc')->paginate(8);
        $cats=Cat::get();
        return view ('welcome')->with(['posts'=>$posts,'cats'=>$cats]);
    }
    public function getReadMore($id){
        $p=Post::whereId($id)->firstOrFail();
        return view ('read-more')->with(['p'=>$p]);
    }
}
