@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Unit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Unit</li>
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
                     Add Unit
                  </h3>
                  <a href="{{route('units.view')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Unit List</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <form method="post" action="{{route('units.update',$editData->id)}}" id="supForm">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="name">Unit Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$editData->name}}">
                            <span style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</span>
                          </div>
                          
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="submit" value="update" class="btn btn-primary">
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
              
            },
            messages: {
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