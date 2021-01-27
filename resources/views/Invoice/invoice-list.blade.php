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
                     Invoice List
                    
                  </h3>
                  <a href="{{route('invoice.add')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-circle"></i> New Invoice</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                            <table id="example1" class="table table-borderd table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Invoice No</th>  
                                            <th>Date</th>
                                            <th>Customer Name</th>          
                                            <th>Address</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $invoice)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>Invoice No#{{$invoice->invoice_no}}</td>
                                            <td>{{$invoice->date}}</td>
                                            <td>{{$invoice['payment']['customer']['name']}}</td>
                                            <td>{{$invoice['payment']['customer']['address']}}</td>
                                            <td>{{$invoice['payment']['paid_amount']}}</td>
                                            <td>
                                                <a href="{{route('invoice.print',$invoice->id)}}" title="Invoice" class="btn btn-sm btn-success"><i class="fas fa-print"></i></a>  
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
    
            </section>
            <!-- /.Left col -->
          </section>


    </div>
@endsection