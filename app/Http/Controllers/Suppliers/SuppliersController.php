<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Auth;

class SuppliersController extends Controller
{
    public function view(){
        $allData= Supplier::all();
        return view('Suppliers/view-supplier',compact('allData'));
    }

    public function add(){
        return view('Suppliers/add-supplier');
    }

    public function store(Request $request){
        $supplier = new Supplier();
        $supplier->name= $request->name;
        $supplier->email= $request->email;
        $supplier->mobile_no= $request->mobile_no;
        $supplier->address= $request->address;
        $supplier->created_by= Auth::user()->id;
        $supplier->save();

        return redirect()->route('suppliers.view')->with('success','Supplier added successfully');
    }


    public function edit($id){
        $editData = Supplier::find($id);
         return view('Suppliers/edit-supplier',compact('editData'));
     }
 
     public function update(Request $request, $id){
        $supplier = Supplier::find($id);
        $supplier->name= $request->name;
        $supplier->email= $request->email;
        $supplier->mobile_no= $request->mobile_no;
        $supplier->address= $request->address;
        $supplier->updated_by= Auth::user()->id;
        $supplier->save();
        return redirect()->route('suppliers.view')->with('success','Supplier Updated Successfully');
       
     }
 
     public function delete($id){
         $supplier = Supplier::find($id);
 
         $supplier->delete();
         return redirect()->route('suppliers.view')->with('success','Supplier deleted Successfully');
          
      }
}
