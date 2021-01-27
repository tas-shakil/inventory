<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Unit;

class ProductController extends Controller
{
    public function view(){
        $allData= Product::all();
        return view('Products/view-products',compact('allData'));
    }

    public function add(){
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
        return view('Products/add-products',$data);
    }

    public function store(Request $request){
        $product = new Product();
        $product->name= $request->name;
        $product->supplier_id= $request->supplier_id;
        $product->category_id= $request->category_id;
        $product->unit_id= $request->unit_id;
        $product->created_by= Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success','Products added successfully');
    }


    public function edit($id){
         $data['editData'] = Product::find($id);
         $data['suppliers'] = Supplier::all();
         $data['categories'] = Category::all();
         $data['units'] = Unit::all();
         return view('Products/edit-products',$data);
     }
 
     public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name= $request->name;
        $product->supplier_id= $request->supplier_id;
        $product->category_id= $request->category_id;
        $product->unit_id= $request->unit_id;
        $product->updated_by= Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success','Products Updated Successfully');
       
     }
 
     public function delete($id){
         $unit = Product::find($id);
         $unit->delete();
         return redirect()->route('products.view')->with('success','Unit deleted Successfully');
          
      }
}
