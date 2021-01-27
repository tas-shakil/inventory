@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Purchases</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Purchase</li>
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
                     Purchases List
                    
                  </h3>
                  <a href="{{route('purchases.add')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-circle"></i> New Purchases</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0 table-responsive">
                            <table id="example1" class="table table-borderd table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Purchase No</th>
                                            <th>Date</th>
                                            <th>Product Name</th>
                                            <th>Supplier Name</th>
                                            <th>Category Name</th>
                                            <th>Buying Price</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Toatal Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $purchase)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$purchase->purchase_no}}</td>
                                            <td>{{date('d-m-Y',strtotime($purchase->date))}}</td>
                                            <td>{{$purchase['product']['name']}}</td>
                                            <td>{{$purchase['supplier']['name']}}</td>
                                            <td>{{$purchase['category']['name']}}</td>
                                            <td>{{$purchase->buying_price}}</td>
                                            <td>
                                              {{$purchase->buying_qty}}/
                                              {{$purchase['product']['unit']['name']}}
                                            </td>
                                            <td>{{$purchase->unit_price}}</td>
                                            <td>{{$purchase->unit_price * $purchase->buying_qty}}</td>
                                            <td>
                                              @if($purchase->status=='0')
                                                <span style="background:#FC4236;padding:5px;color:#fff">Pending</span>
                                              @elseif($purchase->status=='1')
                                                <span style="background:#5EAB00;padding:5px;color:#fff">Approved</span>
                                              @endif
                                            </td>
                                            <td>
                                               @if($purchase->status=='0')
                                                <a href="{{route('purchases.delete',$purchase->id)}}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                               @endif
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