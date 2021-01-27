@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Credit Custmer</h1>
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
                    Edit invoice (Invoice No #{{$payment['invoice']['invoice_no']}})
                    
                  </h3>
                  <a href="{{route('customers.credit')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Credit Customers List</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class='col-md-12'>
                        <table width="100%">
                            <tbody>
                              <tr>
                                <td colspan="3"><strong>Customer Info</strong></td>
                              </tr>
                                <tr>
                                  
                                    <td width="25%"><p><strong>Name:</strong> {{$payment['customer']['name']}}</p></td>
                                    <td width="25%"><p> <strong>Mobile No:</strong> {{$payment['customer']['mobile_no']}}</p></td>
                                    <td width="35%"><p><strong>Address:</strong> {{$payment['customer']['address']}}</p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                  <div class="tab-content p-0">
                    <form method="POST" action="{{route('customers.update.invoice',$payment->invoice_id)}}" id="myForm">
                      @csrf
                        <table border="1" id="example1" class="table table-borderd table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>SL.</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                  
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                </tr>
            
                            </thead>
                            <tbody>
                                @php
                                    $total_sum = '0' ;
                                    $invoice_details = App\Model\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
                                @endphp
                                @foreach($invoice_details as $key => $details)
                                <tr class="text-center">
                                    <td>{{$key+1}}</td>
                                    <td>{{$details['category']['name']}}</td>
                                    <td>{{$details['product']['name']}}</td>
                                    <td>{{$details->selling_qty}}</td>
                                    <td>{{$details->unit_price}}</td>
                                    <td>{{$details->selling_price}}</td>
                                </tr>
                                @php
                                    $total_sum+= $details->selling_price;
                                @endphp
                                @endforeach
                                <tr>
                                    <td colspan="5" class="text-right"><strong>Sub Total:</strong>&nbsp;&nbsp;</td>
                                    <td class="text-center"><strong>{{$total_sum}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Discount:&nbsp;&nbsp;</td>
                                    <td class="text-center">{{$payment->discount_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Paid Amount:&nbsp;&nbsp;</td>
                                    <td class="text-center">{{$payment->paid_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Due Amount:&nbsp;&nbsp;</td>
                                    <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                                    <td class="text-center">{{$payment->due_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right"><strong>Grand Total:</strong>&nbsp;&nbsp;</td>
                                    <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                          <div class="form-group col-md-3">
                            <label>Paid Status</label>
                            <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                              <option value="">Select Status</option>
                              <option value="full_paid">Full Paid</option>
                              <option value="partial_paid">Partial Paid</option>
                            </select>
                            <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display:none">
                          </div>

                          <div class="form-group col-md-2">
                            <label>Date</label>
                            <input type="date" name="date" id="date" value="{{$current_date}}"  class="form-control datepicker form-control-sm" placeholder="YYYY-MM-DD">
                          </div>
                          <div class="form-group col-md-3" style="padding-top:31px">
                            <button type="submit" class="btn btn-primary btn-sm">Invoice Update</button>
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


  <script type="text/javascript">
      $(document).on('change','#paid_status',function(){
        // Paid status
      let paid_status = $(this).val();
      if(paid_status == 'partial_paid'){
        $('.paid_amount').show();
      }else{
        $('.paid_amount').hide();
      }
    });

</script>


<!--jquery form validation-->
<script>
  $(function () {
    $('#myForm').validate({
      rules: {
        paid_status: {
          required: true,
        },
        date: {
          required: true,
        },
        
      },
      messages: {
        paid_status: {
          required: "This field is required",
        },

        date: {
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