@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Update</li>
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
                     Edit User
                  </h3>
                  <a href="{{route('users.view')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> User List</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <form method="post" action="{{route('users.update',$editData->id)}}" id="myForm">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="usertype">User Role</label>
                              <select name="usertype" id="usertype" class="form-control">
                                  <option value="">Select Role</option>
                                  <option value="Admin" {{($editData->usertype=='Admin')?"selected":""}}>Admin</option>
                                  <option value="User" {{($editData->usertype=='User')?"selected":""}}>User</option>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{$editData->name}}" class="form-control">
                            <span style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</span>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{$editData->email}}" class="form-control">
                            <span style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</span>
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
          $('#myForm').validate({
            rules: {
               usertype: {
                required: true,
              },
              name: {
                required: true,
                
              },
              email: {
                required: true,
                email: true,
              },
      
            },
            messages: {
            usertype: {
                required: "Please select a role",
               
              },
              email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
              },
              name: {
                required: "Please enter user name",
                
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