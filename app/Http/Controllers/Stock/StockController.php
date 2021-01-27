<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Unit;
use PDF;

class StockController extends Controller
{
    
    public function StockReport(){
        
        $allData= Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('Stock/stock-report',compact('allData'));
    }

    public function StockReportPdf(){

        $data['allData']= Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();

        $pdf = PDF::loadView('pdf/stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function supplierProductWise(){
        $data['suppliers']= Supplier::all();
        $data['categories']= Category::all();
        return view('Stock/supplier-product-wise-report',$data);
    }

    public function supplierWisePdf(Request $request){
        $data['allData']= Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();

        $pdf = PDF::loadView('pdf/supplier-wise-stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function productWisePdf(Request $request){
        $data['product']= Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();

        $pdf = PDF::loadView('pdf/product-wise-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }

   
}
