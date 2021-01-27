<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Purchase;
use App\Model\Unit;


class DefaultController extends Controller
{
    public function getCategory(Request $request){
        $sup_id =  $request->supplier_id;
        $allCategory = Product::with(['category'])->select('category_id')
        ->where('supplier_id', $sup_id)
        ->groupBy('category_id')
        ->get();
        return response()->json($allCategory);
       

    }

    public function getProduct(Request $request){
        $cat_id =  $request->category_id;
        $allProducts = Product::where('category_id', $cat_id)->get();
         return response()->json($allProducts);
    }

    public function getStock(Request $request){
        $product_id = $request->product_id;
        $stock = Product::where('id',$product_id)->first()->quantity;
        return response()->json($stock);
    }
}
