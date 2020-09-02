<?php

namespace App\Http\Controllers;
use App\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Post;
use Auth;

class ApiController extends Controller
{
    public function postLogin(Request $request){
        $v=Validator::make($request->all(),[
            'email'=>'required|exists:users',
            'password'=>'required'
        ]);
        if($v->fails()){
            return response()->json($v->errors());
        }

        if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){

            $token = Auth::User()->createToken('My login')->accessToken;
            return response()->json(['token'=>$token]);

        }else{
            return response()->json(['error'=>'Authentication failed.']);
        }
    }
    public function getPosts(){
        $posts=Post::with('cat')->paginate("5");
        return response()->json($posts);
    }
    public function getCategories(){
        $cats=Cat::with('posts')->get();
        //$cats=Cat::get();
        return response()->json($cats);
    }
    public function postNewCategory(Request $request){
        $r=Validator::make($request->all(),[
            'category_name'=>'required|unique:cats'
        ]);

        if($r->fails()){
            return response()->json($r->errors());
        }

        $cat=new Cat();
        $cat->category_name=$request['category_name'];
        $cat->save();
        return response()->json(['message'=>"The new category has been created."]);
    }

    public function getPostsByCategory($cat_id){
        $posts=Post::where('cat_id', $cat_id)->with('cat')->paginate("5");
        return response()->json($posts);
    }
    public function getPostOne($id){
        $post=Post::whereId($id)->with('cat')->first();
        if($post){
            return response()->json($post);
        }else{
            return response()->json(['error'=>"The selected post not found."]);
        }
    }
}
