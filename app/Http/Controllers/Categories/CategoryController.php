<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Category;

class CategoryController extends Controller
{
    public function view(){
        $allData= Category::all();
        return view('Categories/view-categories',compact('allData'));
    }

    public function add(){
        return view('Categories/add-categories');
    }

    public function store(Request $request){
        $category = new Category();
        $category->name= $request->name;
        $category->created_by= Auth::user()->id;
        $category->save();
        return redirect()->route('categories.view')->with('success','Category added successfully');
    }


    public function edit($id){
         $editData = Category::find($id);
         return view('Categories/edit-categories',compact('editData'));
     }
 
     public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name= $request->name;
        $category->updated_by= Auth::user()->id;
        $category->save();
        return redirect()->route('categories.view')->with('success','Category Updated Successfully');
       
     }
 
     public function delete($id){
         $category = Category::find($id);
         $category->delete();
         return redirect()->route('categories.view')->with('success','Category deleted Successfully');
          
      }
}
