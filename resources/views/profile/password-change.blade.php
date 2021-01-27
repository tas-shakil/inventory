@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Change Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Passwoar Change</li>
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
                     Add User
                  </h3>
                 
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <form method="post" action="{{route('password.update')}}" id="myForm">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="current_password">Current password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                        </div>
                         
                        
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="new_password2">Confirm new Password</label>
                          <input type="password" name="new_password2" id="new_password2" class="form-control">
                        </div>
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
          $('#myForm').validate({
            rules: {
            current_password: {
                required: true,
                
              },
              new_password: {
                required: true,
                minlength: 6
              },
              new_password2: {
                required: true,
                equalTo:'#new_password'
              },
            },
            messages: {
                current_password: {
                    required: "Please provide a current password",
                    
                },
                password: {
                    required: "Please provide new a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password2: {
                    required:"Please enter a confirm password",
                    equalTo:"Confirm password does not match"
                }
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