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
                     Add New Purchase
                  </h3>
                  <a href="{{route('invoice.view')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Invoice List</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="name">Invoice No</label>
                            <input type="text" name="invoice_no" id="invoice_no" value={{$invoice_no}} class="form-control form-control-sm" readonly style="background-color:#D8FDBA">
                          </div>
                        <div class="form-group col-md-2">
                          <label>Date</label>
                          <input type="date" name="date" id="date" value="{{$current_date}}"  class="form-control datepicker form-control-sm" placeholder="YYYY-MM-DD">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="name">Category Name</label>
                          <select name="category_id" id="category_id" class="form-control select2">
                            <option value="">Select Spplier</option>
                              @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="name">Product Name</label>
                            <select name="product_id" id="product_id" class="form-control select2">
                              <option value="">Select Product</option>   
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="name">Stock(PCS/Kg)</label>
                            <input type="text" name="current_stock_qty" id="current_stock_qty" class="form-control form-control-sm" readonly style="background-color:#D8FDBA">
                        </div>
                        <div class="form-group col-md-2" style="padding-top:32px">
                                 <span class="addeventmore btn btn-primary btn-sm"> <i class="fas fa-plus-circle"></i>Add</span>
                        </div>
                    </div>
                </div><!-- /.card-body -->
                <div class="card-body">
                  <form method="post" action="{{route('invoice.store')}}" id="myForm">
                    @csrf
                    <table class="table-sm table-bordered" width="100%">
                        <thead>
                          <tr>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th width="7%">Pcs/kg</th>
                            <th width="10%">Unit Price</th>
                            <th width="17%">Total Price</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="addRow" class="addRow">

                        </tbody>
                        <tbody>
                          <tr>
                            <td colspan="4">Discount</td>
                            <td >
                              <input type="text" name="discount_amount" id="discount_amount" class="form-control from-control-sm text-right" placeholder="Enter Discount Amount">
                            </td>

                          </tr>
                          <tr>
                            <td colspan="4"></td>
                            <td>
                              <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimates_amount " readonly style="background-color:#D8FDBA">
                            </td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea name="description" class="form-control" id="description" placeholder="write description here"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Paid Status</label>
                        <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                          <option value="">Select Status</option>
                          <option value="full_paid">Full Paid</option>
                          <option value="full_due">Full Due</option>
                          <option value="partial_paid">Partial Paid</option>
                        </select>
                        <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display:none">
                      </div>
                      <div class="form-group col-md-9">
                        <label>Customer Name</label>
                        <select name="customer_id" id="customer_id" class="form-control form-control-sm select2">
                          <option value="">Select Customer</option>
                          <option value="0">New Customer</option>
                          @foreach($customers as $customer)
                           <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->mobile_no}} {{$customer->address}})</option>
                           
                          @endforeach
                          
                        </select>

                      </div>
                     </div>

                     <div class="form-row new_customer" style="display:none">
                          <div class="form-group col-md-3">
                            
                          </div>
                          <div class="form-group col-md-3">
                              <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Enter Customer name">
                          </div>
                          <div class="form-group col-md-3">
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control form-control-sm" placeholder="Enter Customer Phone number">
                          </div>
                          <div class="form-group col-md-3">
                            <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Enter Customer address">
                          </div>
                     </div>
                
                    <div class='form-group'>
                      <button type="submit" class="btn btn-primary" id="storeButton">Create Invoice</button>
                    </div>
                  </form>
                </div>

              </div>
              <!-- /.card -->
    
            </section>
            <!-- /.Left col -->
          </section>
    </div>


 <script id="document-template" type="text/x-handlebars-template">
  <tr class="delete_add_more_item" id="delete_add_more_item">
    <input type="hidden" name="date" value="@{{date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
    <td>
      <input type="hidden" name="category_id[]" value="@{{category_id}}">
      @{{category_name}}
    </td>
    <td>
      <input type="hidden" name="product_id[]" value="@{{product_id}}">
      @{{product_name}}
    </td>
    <td>
      <input type="number" min="1" name="selling_qty[]" value="1" class="form-control-sm text-right selling_qty">
     
    </td>
    <td>
      <input type="number" name="unit_price[]" value=""  class="form-control-sm text-right unit_price">
     
    </td>
 
    <td>
      <input type="number" name="selling_price[]"  value="0"  class="form-control-sm text-right selling_price" readonly>
  
    </td>
    <td>
     <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>

    </td>
  </tr>
</script>       

<script type="text/javascript">
  $(document).ready(function (){
    $(document).on("click",".addeventmore", function(){
      let date = $('#date').val();
      let invoice_no = $('#invoice_no').val();
      let category_id = $('#category_id').val();
      let category_name = $('#category_id').find('option:selected').text();
      let product_id = $('#product_id').val();
      let product_name = $('#product_id').find('option:selected').text();
    
      if(date==''){
        $.notify("Date is required", {globalPosition:'to right',className:'error'});
        return false;
      }

      if(category_id==''){
        $.notify("Category is required", {globalPosition:'to right',className:'error'});
        return false;
      }

      if(product_id==''){
        $.notify("Product is required", {globalPosition:'to right',className:'error'});
        return false;
      }

      let source = $('#document-template').html();
      let template = Handlebars.compile(source);
      let data={
        date:date,
        invoice_no:invoice_no,
        category_id:category_id,
        category_name:category_name,
        product_id:product_id,
        product_name:product_name

      };
      let html = template(data);
      $("#addRow").append(html);
    });

    $(document).on("click",".removeeventmore",function(event){
      $(this).closest(".delete_add_more_item").remove();
      totalAmountPrice();
    });

    $(document).on('keyup click','.unit_price,.selling_qty',function(){
      let unit_price = $(this).closest("tr").find("input.unit_price").val();
      let qty = $(this).closest("tr").find("input.selling_qty").val();
      let total = unit_price * qty;
      $(this).closest("tr").find("input.selling_price").val(total);
      $('#discount_amount').trigger('keyup');
  

    });
    $(document).on('keyup','#discount_amount',function(){
      totalAmountPrice()
    });



    function totalAmountPrice(){
      let sum =0;
      $(".selling_price").each(function(){
        let value = $(this).val();
        if(!isNaN(value) && value.length !=0){
          sum+= parseFloat(value);
        }
      });

      let discount_amount = parseFloat($('#discount_amount').val());
      if(!isNaN(discount_amount) && discount_amount.length != 0){
        sum -= parseFloat(discount_amount);
      }

      $('#estimated_amount').val(sum);

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
<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            let product_id = $(this).val();
            $.ajax({
                url:"{{route('check-product-stock')}}",
                type:"GET",
                data:{product_id:product_id},
                success:function(data){
                    $('#current_stock_qty').val(data);
                }
            });
        });
    });

</script>
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

    <script type="text/javascript">

        $(document).on('change','#customer_id',function(){
        // new Customer
        let customer_id = $(this).val();
        if(customer_id == '0'){
          $('.new_customer').show();
        }else{
          $('.new_customer').hide();
        }
        });

      </script>
@endsection