@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
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
                     Products List
                    
                  </h3>
                  <a href="{{route('stock.report.pdf')}}" target="_blank" class="btn btn-success btn-sm float-right"><i class="fas fa-download"></i> &nbsp;Download PDF</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                            <table id="example1" class="table table-borderd table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Supplier Name</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>In.Qty</th>
                                            <th>Out.Qty</th>
                                            <th>Stock</th>
                                            <th>Unit</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $product)
                                            @php
                                              $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id', $product->id)->where('status','1')->sum('buying_qty');
                                              $selling_qty = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                                            @endphp
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$product['supplier']['name']}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product['category']['name']}}</td>
                                                <td>{{$buying_total}}</td>
                                                <td>{{$selling_qty}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>{{$product['unit']['name']}}</td>
                                            
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