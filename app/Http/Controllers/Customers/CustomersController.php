<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\Model\Payment;
use App\Model\PaymentDetail;
use Auth;
use PDF;

class CustomersController extends Controller
{
    public function view(){
        $allData= Customer::all();
        return view('Customers/view-customer',compact('allData'));
    }

    public function add(){
        return view('Customers/add-customer');
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->name= $request->name;
        $customer->email= $request->email;
        $customer->mobile_no= $request->mobile_no;
        $customer->address= $request->address;
        $customer->created_by= Auth::user()->id;
        $customer->save();
        return redirect()->route('customers.view')->with('success','Customer added successfully');
    }

    public function edit($id){
        $editData = Customer::find($id);
         return view('Customers/edit-customer',compact('editData'));
     }
 
     public function update(Request $request, $id){
        $customer = Customer::find($id);
        $customer->name= $request->name;
        $customer->email= $request->email;
        $customer->mobile_no= $request->mobile_no;
        $customer->address= $request->address;
        $customer->updated_by= Auth::user()->id;
        $customer->save();
        return redirect()->route('customers.view')->with('success','Customer Updated Successfully');
     }
 
     public function delete($id){
         $customer = Customer::find($id);
         $customer->delete();
         return redirect()->route('customers.view')->with('success','Customer deleted Successfully'); 
      }

      public function creditCustomer(){
          $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
          return view('Customers/credit-customer',compact('allData'));
      }

      public function creditCustomerPdf(){
          $data['allData'] = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();

          $pdf = PDF::loadView('pdf/credit-customer-pdf', $data);
          $pdf->SetProtection(['copy', 'print'], '', 'pass');
          return $pdf->stream('document.pdf');

      }

      public function editInvoice($invoice_id){
          $payment = Payment::where('invoice_id',$invoice_id)->first();
          $current_date= date('Y-m-d');
           return view('Customers/edit-invoice',compact('payment','current_date'));
      }

      public function updateInvoice(Request $request, $invoice_id){
         if($request->new_paid_amount < $request->paid_amount){
             return redirect()->back()->with('error',"Sorry! you have paid maximum value");

         }else{
             $payment = Payment::where('invoice_id',$invoice_id)->first();
             $payment_details = new PaymentDetail();
             $payment->paid_status = $request->paid_status;
             if($request->paid_status == 'full_paid'){
                 $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                 $payment->due_amount = '0';
                 $payment_details->current_paid_amount = $request->new_paid_amount;
             }elseif($request->paid_status == 'partial_paid'){
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;

             }

             $payment->save();
             $payment_details->invoice_id = $invoice_id;
             $payment_details->date = date('Y-m-d',strtotime($request->date));
             $payment_details->updated_by = Auth::user()->id;
             $payment_details->save();

            return redirect()->route('customers.credit')->with('success','Invoice Successfully Updated');

         }

      }

      public function invoiceDetailsPdf($invoice_id){
        $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
        $pdf = PDF::loadView('pdf/invoice-details-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
      }

      public function paidCustomer(){
        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('Customers/paid-customer',compact('allData'));
      }

      public function padiCustomerPdfDetails($invoice_id){

        $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
        $pdf = PDF::loadView('pdf/customer-details-paid-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

      }

      public function paidCustomerPdf(){
        $data['allData'] = Payment::where('paid_status','!=','full_due')->get();
        $pdf = PDF::loadView('pdf/paid-customer-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

      }

      public function customerWiseReport(){
          return view('Customers/customer-wise-report');
      }
}
