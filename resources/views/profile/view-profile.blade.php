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

          <div class="row">
      
            <section class="col-md-4 offset-md-4">
           
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{(!empty($user->image))?url('public/upload/user_images/'.$user->image):url('public/upload/users_images/no_image.png')}}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
  
                  <p class="text-muted text-center">{{$user->address}}</p>
  
                    <table width="100%" class="table table-border">
                        <tr>
                            <td>Mobile No</td>
                            <td>{{$user->mobile}}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{$user->gender}}</td>
                        </tr>
                    </table>
  
                  <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                </div>
                <!-- /.card-body -->
              </div>
            </section>
            <!-- /.Left col -->
          </section>


    </div>
@endsection