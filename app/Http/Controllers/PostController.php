<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function updatePost(Request $request){
        $id=$request['id'];
        $post=Post::whereId($id)->firstOrFail();
        if($request->file('image')){
            Storage::disk("post")->delete($post->image);

            $img=$request->file('image');
            $img_name=date("dmyhis").".".$img->getClientOriginalExtension();   
            Storage::disk('post')->put($img_name, File::get($img));

            $post->image=$img_name;
        }
        $post->title=$request['title'];
        $post->video=$request['video'];
        $post->content=$request['content'];
        $post->cat_id=$request['cat_id'];
        $post->update();
        return redirect()->route('posts')->with('success', "The selected post has been updated.");
    }
    public function getEditPost($id){
        $cats=Cat::get();
        $post=Post::whereId($id)->firstOrFail();
        return view ('edit-post')->with(['post'=>$post, 'cats'=>$cats]);
    }
    public function getImages($file_name){
        $file=Storage::disk('post')->get($file_name);
        return response($file);
    }
    public function getNewPost(){
        $cats=Cat::get();
        return view ('new-post')->with(['cats'=>$cats]);
    }
    public function getPosts(){
        $posts=Post::OrderBy('id', 'desc')->get();
        return view ('posts')->with(['posts'=>$posts]);
    }
    public function postNewPost(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,gif',
            'content'=>'required',
            'video'=>'required',
            'cat_id'=>'required'
        ]);
        $img=$request->file("image");
        $img_name=date("dmyhis").".".$img->getClientOriginalExtension();   
        

        $p=new Post();
        $p->title=$request['title'];
        $p->image=$img_name;
        $p->video=$request['video'];
        $p->content=$request['content'];
        $p->cat_id=$request['cat_id'];
        $p->save();

        Storage::Disk("post")->put($img_name, File::get($img));
        return redirect()->back()->with('success', "The new post has been created.");

    }
}
