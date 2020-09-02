<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;

class CategoryController extends Controller
{
    public function updateCategory(Request $request){
        $id=$request['id'];
        $cat=Cat::where('id', $id)->firstOrFail();
        $cat->category_name=$request['category_name'];
        $cat->update();
        return redirect()->back()->with('success', 'The selected category has been updated.');
    }
    public function getDeleteCategory($id){
        $cat=Cat::where('id', $id)->firstOrFail();
        $cat->delete();
        return redirect()->back()->with('success', 'The selected category has been deleted.');
    }
    public function getCategories(){
        $cats=Cat::get();
        return view ("category")->with(['cats'=>$cats]);
    }
    public function postNewCategory(Request $request){
        $this->validate($request,[
            'category_name'=>'required|unique:cats'
        ]);
        $cat=new Cat();
        $cat->category_name=$request['category_name'];
        $cat->save();
        return redirect()->back()->with("success", "The new category has been saved.");
    }
}
