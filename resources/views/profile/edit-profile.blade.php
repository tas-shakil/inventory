@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
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
                     Edit profile
                  </h3>
                  <a href="{{route('profiles.view')}}" class="btn btn-success btn-sm float-right"> Your Profile</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <form method="post" action="{{route('profiles.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{$editData->name}}" class="form-control">
                           
                          </div>
                          <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{$editData->email}}" class="form-control">
                          
                          </div>

                          <div class="form-group col-md-4">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" id="mobile" value="{{$editData->mobile}}" class="form-control">
                          
                          </div>

                          <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" value="{{$editData->address}}" class="form-control">
                         
                          </div>

                          <div class="form-group col-md-4">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male" {{($editData->usertype=='Male')?"selected":""}}>Male</option>
                                <option value="Female" {{($editData->usertype=='Female')?"selected":""}}>Female</option>
                            </select>
                           </div>

                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="address">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                      
                         
                            <img id="showimage" style="width:150px;height:160px; border:1px solid #000" class="profile-user-img img-fluid img-circle"
                                src="{{(!empty($editData->image))?url('public/upload/users_images/'.$editData->image):url('public/upload/users_images/no_image.png')}}"
                                alt="User profile picture">
                            
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