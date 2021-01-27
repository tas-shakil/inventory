@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Customer wisr report</h1>
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
                     Select Citeriya
                  </h3>
                </div><!-- /.card-header -->
                
                <div class="card-body">
                    <div class="row">
                      <div class="col-sm-12 text-center" >
                       <strong>Customer wise Credit report</strong>
                        <input type="radio" name="customer_wise_report" value="customer_wise_credit" class="search_value">
                        &nbsp;&nbsp;
                        <strong>Customer wise Paid report</strong>
                        <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">
                      </div>
                      <br>
                      <br>
                    </div>
                  <div class="show_credit" style="display: none;">
                    <form method="GET" action="{{route('report.supplier.wise.pdf')}}" id="supplierWiseForm" target="_blank">
                        <div class="form-row">
                            <div class="col-sm-8">
                                <label>Customer Name</label>
                                 <select name="customer_id" class="form-control select2">
                                    <option value="">Select Customer</option>
                                        @foreach($suppliers as $supplier)
                                          <option value="{{$supplier->id}}"  }}>{{$supplier->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-top:29px">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                    </form>
                  </div>

                  <div class="show_paid" style="display: none;">
                    <form method="GET" action="{{route('report.product.wise.pdf')}}" id="productwiseform" target="_blank">
                        <div class="form-row">
                            <div class="col-sm-8">
                                <label>Customer Name</label>
                                 <select name="customer_id" class="form-control select2">
                                    <option value="">Select Customer</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}"  }}>{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-top:29px">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
    
            </section>
            <!-- /.Left col -->
          </section>


    </div>
 {{-- Validation --}}
    <script>
        $(function () {
          $('#supplierWiseForm').validate({
            ignore:[],
            errorPlacement:function(error, element){
                if(element.attr("name") == "supplier_id"){error.insertAfter(element.next());}
                else{error.insertAfter(element);}
            },
            errorClass:'text-danger',
            validClass:'text-success',
            rules: {
                supplier_id: {
                required: true,
              },
            },
            messages: {
                supplier_id: {
                    required: "Please Select Supplier",
              },
            },
          });
        });
    </script>

 {{-- Validation --}}
<script>
  $(function () {
    $('#productwiseform').validate({
      ignore:[],
      errorPlacement:function(error, element){
          if(element.attr("name") == "category_id"){error.insertAfter(element.next());}
          else if(element.attr("name") == "product_id"){error.insertAfter(element.next());}
          else{error.insertAfter(element);}
      },

      
      errorClass:'text-danger',
      validClass:'text-success',
      rules: {
        category_id: {
          required: true,
        },
        product_id: {
          required: true,
        },
      },
      messages: {
         category_id: {
              required: "Please Select Category",
        },
        product_id:{
          required: "Please Select Product",
        }
      },
    });
  });
</script>

    <script type="text/javascript">
        $(document).on('change','.search_value',function(){
            let search_value = $(this).val();
            if(search_value == 'customer_wise_credit'){
                $('.show_credit').show();
            }else{
                $('.show_credit').hide();
            }

            if(search_value == 'customer_wise_paid'){
                $('.show_paid').show();
            }else{
              $('.show_paid').hide();
            }
       });

    </script>

    {{-- ajax call for get products --}}     
        <script type="text/javascript">
        $(function(){
            $(document).on('change','#category_id',function(){
            let category_id = $(this).val();
            $.ajax({
                url:"{{route('get-product')}}",
                type:"GET",
                data:{category_id:category_id},
                success:function(data){
                let html = '<option value="">Select Product</option>';
                $.each(data,function(key,v){
                    html+='<option value="'+v.id+'">'+v.name+'</option>'
                });
                $('#product_id').html(html)
                }
            });

            });
        });

        </script>


@endsection