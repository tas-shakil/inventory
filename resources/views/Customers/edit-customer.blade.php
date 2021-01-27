@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                     Edit Customer
                  </h3>
                  <a href="{{route('suppliers.view')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Supplier List</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <form method="post" action="{{route('suppliers.update',$editData->id)}}" id="supForm">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="name">Supplier Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$editData->name}}">
                            <span style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</span>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$editData->email}}">
                            <span style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</span>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="email">Phone</label>
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="{{$editData->mobile_no}}">
                            <span style="color:red">{{($errors->has('phone'))?($errors->first('phone')):''}}</span>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="email">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{$editData->address}}">
                            <span style="color:red">{{($errors->has('address'))?($errors->first('address')):''}}</span>
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="submit" value="Update" class="btn btn-primary">
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
              name: {
                required: true,
                
              },
              email: {
                required: true,
                email: true,
              },
              mobile_no: {
                required: true,
                
              },
              address: {
                required: true,
                
              },
            },
            messages: {
              email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
              },
              name: {
                required: "Please enter user name",
              },
              mobile_no:{
                required: "Phone number can not be empty", 
              },
              address: {
                required: "Please Enter address",
                
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