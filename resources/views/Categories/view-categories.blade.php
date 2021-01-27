@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
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
                    Categories List
                    
                  </h3>
                  <a href="{{route('categories.add')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-circle"></i> Add Categories</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                            <table id="example1" class="table table-borderd table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $cat)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$cat->name}}</td>
                                            @php
                                               $count_category = App\Model\Product::where('category_id',$cat->id)->count();
                                            @endphp
                                            <td>
                                                <a href="{{route('categories.edit',$cat->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                @if($count_category<1)
                                                 <a href="{{route('categories.delete',$cat->id)}}" id="delete" title="Delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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