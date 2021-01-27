@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Invoice</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">invoice</li>
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
                     Select Criteria
                  </h3>
                  {{-- <a href="{{route('invoice.view')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Invoice List</a> --}}
         
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form method="GET" action="{{route('invoice.daily.report.pdf')}}" target="_blank" id="myForm">
                      @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>Start Date</label>
                              <input type="date" name="start_date" id="start_date" class="form-control datepicker form-control-sm" placeholder="YYYY-MM-DD">
                            </div>
    
                            <div class="form-group col-md-4">
                                <label>End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control datepicker form-control-sm" placeholder="YYYY-MM-DD">
                              </div>
                            <div class="form-group col-md-1">
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:32px">Search</button>
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
          start_date: {
            required: true,
          },
          end_date: {
            required: true,
          
          },
        },
        messages: {
          start_date: {
                required: "Pleace pick start date",
         
          },
          end_date: {
            required: "Please pick end date",
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