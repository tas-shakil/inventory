@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Invoice</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">invoice</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>


      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-md-12 ">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                   Invoice No #{{$invoice->invoice_no}} ({{date('d-m-Y',strtotime($invoice->date))}})
                    
                  </h3>
                  <a href="{{route('invoice.pending.list')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-circle"></i>Pending Invoice List</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                    
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="15%"><p>Customer Info</p></td>
                                <td width="25%"><p><strong>Name:</strong> {{$payment['customer']['name']}}</p></td>
                                <td width="25%"><p> <strong>Mobile No:</strong> {{$payment['customer']['mobile_no']}}</p></td>
                                <td width="35%"><p><strong>Address:</strong> {{$payment['customer']['address']}}</p></td>
                            </tr>
                            <tr>
                                <td width="15%"></td>
                                <td width="85%" colspan="3"><p><strong>Description:</strong>{{$invoice->description}}</p></td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="post" action="{{route('approval.store',$invoice->id)}}">
                        @csrf
                        <table border="1" width="100%" style="margin-bottom:10px">
                            <thead>
                                <tr class="text-center">
                                    <th>SL.</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th style="background:#ddd;padding:1px">Current Stock</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Toatal Price</th>
                                </tr>

                            </thead>
                            <tbody>
                                @php
                                $total_sum = '0' ;
                                @endphp
                                @foreach($invoice['invoice_details'] as $key => $details)
                                <tr class="text-center">
                                  <input type="hidden" name="category_id[]" value={{$details->category_id}}>
                                  <input type="hidden" name="product_id[]" value={{$details->product_id}}>
                                  <input type="hidden" name="selling_qty[{{$details->id}}]" value={{$details->selling_qty}}>
                                    <td>{{$key++}}</td>
                                    <td>{{$details['category']['name']}}</td>
                                    <td>{{$details['product']['name']}}</td>
                                    <td>{{$details['product']['quantity']}}</td>
                                    <td>{{$details->selling_qty}}</td>
                                    <td>{{$details->unit_price}}</td>
                                    <td>{{$details->selling_price}}</td>
                                </tr>
                                @php
                                    $total_sum+= $details->selling_price;
                                @endphp
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-right"><strong>Sub Total:</strong>&nbsp;&nbsp;</td>
                                    <td class="text-center"><strong>{{$total_sum}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right">Discount:&nbsp;&nbsp;</td>
                                    <td class="text-center">{{$payment->discount_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right">Paid Amount:&nbsp;&nbsp;</td>
                                    <td class="text-center">{{$payment->paid_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right">Due Amount:&nbsp;&nbsp;</td>
                                    <td class="text-center">{{$payment->due_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right"><strong>Grand Total:</strong>&nbsp;&nbsp;</td>
                                    <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
                                </tr>
                            </tbody>
                        

                        </table>
                        <button type="submit" class="btn btn-success">Invoice Approved</button>
                    </form>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
    
            </section>
            <!-- /.Left col -->
          </section>


    </div>
@endsection