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
                  <a href="{{route('products.add')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-circle"></i>Add Products</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                            <table id="example1" class="table table-borderd table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Product Name</th>
                                            <th>Supplier Name</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $product)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product['supplier']['name']}}</td>
                                                <td>{{$product['category']['name']}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>{{$product['unit']['name']}}</td>
                                                @php
                                                   $count_purchase = App\Model\Purchase::where('product_id',$product->id)->count();
                                                 @endphp
                                                <td>
                                                    <a href="{{route('products.edit',$product->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                                    @if($count_purchase<1)
                                                     <a href="{{route('products.delete',$product->id)}}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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