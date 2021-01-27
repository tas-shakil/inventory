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
                    Products
                  </h3>
                  <a href="{{route('products.view')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Products List</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <form method="post" action="{{route('products.store')}}" id="supForm">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="name">Supplier Name</label>
                            <select name="supplier_id"  class="form-control">
                              <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                  <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="name">Prduct Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                          </div>

                          <div class="form-group col-md-4">
                            <label for="name">Units</label>
                            <select name="unit_id" class="form-control">
                              <option value="">Select Unit</option>
                                @foreach($units as $unit)
                                  <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach
                            </select>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="name">Categories</label>
                            <select name="category_id" class="form-control">
                              <option value="">Select Category</option>
                                @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="submit" value="submit" class="btn btn-primary">
                        </div>
                    </div>

                  </form>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
    
            </section>
            <!-- /.Left col -->
          </section>


    </div>

<!--jquery form validation-->
    <script>
        $(function () {
          $('#supForm').validate({
            rules: {
              supplier_id: {
                required: true,
              },
              unit_id: {
                required: true,
              },
              category_id: {
                required: true,
              },
              name: {
                required: true,
              },
              
            },
            messages: {
              supplier_id: {
                required: "This field is required",
              },
              unit_id: {
                required: "This field is required",
              },
              category_id: {
                required: "This field is required",
              },
              name: {
                required: "This field is required",
              },
            
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
        </script>
@endsection