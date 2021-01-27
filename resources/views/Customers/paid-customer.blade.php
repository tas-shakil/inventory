@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Credit Customers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Customer</li>
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
                     Credit Customer List
                    
                  </h3>
                  <a href="{{route('customers.paid.pdf')}}" target="_blank" class="btn btn-success btn-sm float-right"><i class="fas fa-download"></i> Download PDF</a>
         
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
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Paid Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @php
                                    $total_sum = '0';
                                  @endphp
                                @foreach($allData as $key => $payment)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>Invoice no#{{$payment['invoice']['invoice_no']}}</td>
                                    <td>{{date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                                    <td>{{$payment['customer']['name']}}</td>
                                    <td>{{$payment['customer']['mobile_no']}}</td>
                                    <td>{{$payment['customer']['address']}}</td>
                                    <td>{{$payment->paid_amount}} Tk</td>
                                    
                                    <td>
                                      
                                        <a href="{{route('paid.customer.pdf',$payment->invoice_id)}}" target="_blank" id="Details" title="Details" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    </td>
                                    @php
                                        $total_sum += $payment->paid_amount;  
                                    @endphp
                                </tr>
                                @endforeach
                                <table class="table table-borderd table-hover">
                                  <tbody>
                                    <tr>
                                      <td style="text-align:right"><strong>Total Paid :</strong></td>
                                      <td><strong>{{$total_sum}} Tk</strong></td>
                                    </tr>
                                  </tbody>
                                </table>
                                
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