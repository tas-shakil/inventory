@extends('layouts.master')
@section('content')
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Purchases</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Purchase</li>
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
                     Add New Purchases
                  </h3>
                  <a href="{{route('purchases.view')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Purchases List</a>
         
                </div><!-- /.card-header -->
                <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label>Date</label>
                          <input type="date" name="date" id="date"  class="form-control datepicker form-control-sm" placeholder="YYYY-MM-DD">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="name">Purchase No</label>
                          <input type="text" name="purchase_no" id="purchase_no" class="form-control form-control-sm">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="name">Supplier Name</label>
                          <select name="supplier_id" id="supplier_id" class="form-control select2">
                            <option value="">Select Spplier</option>
                              @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                              @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="name">Category Name</label>
                          <select name="category_id" id="category_id" class="form-control select2">
                            <option value="">Select Category</option>
                              
                          </select>
                        </div>

                        
                        <div class="form-group col-md-4">
                          <label for="name">Product Name</label>
                          <select name="product_id" id="product_id" class="form-control select2">
                            <option value="">Select Product</option>   
                          </select>
                        </div>
                          <div class="form-group col-md-2" style="padding-top:32px">
                            <span class="addeventmore btn btn-primary btn-sm"> <i class="fas fa-plus-circle"></i>Add Item</span>
                          </div>
                    </div>
                </div><!-- /.card-body -->
                <div class="card-body">
                  <form method="post" action="{{route('purchases.store')}}" id="myForm">
                    @csrf
                    <table class="table-sm table-bordered" width="100%">
                        <thead>
                          <tr>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th width="7%">Pcs/kg</th>
                            <th width="10%">Unit Price</th>
                            <th>Description</th>
                            <th width="10%">Total Price</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="addRow" class="addRow">

                        </tbody>
                        <tbody>
                          <tr>
                            <td colspan="5"></td>
                            <td>
                              <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimates_amount" readonly style="background-color:#D8FDBA">
                            </td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class='form-group'>
                      <button type="submit" class="btn btn-primary" id="storeButton">Purchase Store</button>
                    </div>
                  </form>

                </div>

              </div>
              <!-- /.card -->
    
            </section>
            <!-- /.Left col -->
          </section>


    </div>

<!--jquery form validation-->
    {{-- <script>
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
        </script> --}}

 <script id="document-template" type="text/x-handlebars-template">
  <tr class="delete_add_more_item" id="delete_add_more_item">
    <input type="hidden" name="date[]" value="@{{date}}">
    <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
    <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
    <td>
      <input type="hidden" name="category_id[]" value="@{{category_id}}">
      @{{category_name}}
    </td>
    <td>
      <input type="hidden" name="product_id[]" value="@{{product_id}}">
      @{{product_name}}
    </td>
    <td>
      <input type="number" min="1" name="buying_qty[]" value="1" class="form-control-sm text-right buying_qty">
     
    </td>
    <td>
      <input type="number" name="unit_price[]" value=""  class="form-control-sm text-right unit_price">
     
    </td>
    <td>
      <input type="text" name="description[]" class="form-control-sm text-right ">
   
    </td>

    <td>
      <input type="number" name="buying_price[]"  value="0"  class="form-control-sm text-right buying_price" readonly>
  
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
      let purchase_no = $('#purchase_no').val();
      let supplier_id = $('#supplier_id').val();
      let category_id = $('#category_id').val();
      let category_name = $('#category_id').find('option:selected').text();
      let product_id = $('#product_id').val();
      let product_name = $('#product_id').find('option:selected').text();
    
      if(date==''){
        $.notify("Date is required", {globalPosition:'to right',className:'error'});
        return false;
      }

      if(purchase_no==''){
        $.notify("Purchase no is required", {globalPosition:'to right',className:'error'});
        return false;
      }

      if(purchase_no==''){
        $.notify("Purchase no is required", {globalPosition:'to right',className:'error'});
        return false;
      }

      if(supplier_id==''){
        $.notify("Supplier is required", {globalPosition:'to right',className:'error'});
        return false;
      }
      if(category_id==''){
        $.notify("Pategory is required", {globalPosition:'to right',className:'error'});
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
        purchase_no:purchase_no,
        supplier_id:supplier_id,
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

    $(document).on('keyup click','.unit_price,.buying_qty',function(){
      let unit_price = $(this).closest("tr").find("input.unit_price").val();
      let qty = $(this).closest("tr").find("input.buying_qty").val();
      let total = unit_price * qty;
      $(this).closest("tr").find("input.buying_price").val(total);
      totalAmountPrice();

    });

    function totalAmountPrice(){
      let sum =0;
      $(".buying_price").each(function(){
        let value = $(this).val();
        if(!isNaN(value) && value.length !=0){
          sum+= parseFloat(value);
        }
      });
      $('#estimated_amount').val(sum);

    }

  });

</script>


{{-- ajax call for get category --}}
<script type="text/javascript">
  $(function(){
    $(document).on('change','#supplier_id',function(){
      let supplier_id = $(this).val();
      $.ajax({
        url:"{{route('get-category')}}",
        type:"GET",
        data:{supplier_id:supplier_id},
        success:function(data){
          let html = '<option value="">Select Category</option>';
          $.each(data,function(key,v){
              html+='<option value="'+v.category_id+'">'+v.category.name+'</option>'
          });
          $('#category_id').html(html)
        }
      });

    });
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