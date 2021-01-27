<html>
    <head>
        <title>Supplier Wise stock report pdf</title>   
         <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    </head> 
    <body>
        <div class="container">
            <div class="row">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="25%"></td>
                            <td>
                                <span style="font-size:20px;background:#1781BF;padding:3px 10px 3px 10px;color:#fff">Arisha Enterprise</span><br />
                                Alir Jahal, Cox's Bazar
                            </td>
                            <td>Showroom No: 81,82 <br />
                            Phone no: 565464646</td>
                        </tr>

                    </tbody>

                </table>

            </div>
            <div class="row">
                <div class='col-md-12'>
                    <hr style="margin-bottom:0px">

                         

                            <table border="1" width="100%">
                                <thead>
                                    <tr>
                                  
                                        <th>Product Name</th>
                                        <th>Supplier Name</th>
                                        <th>Category</th>
                                        <th>Unit</th>
                                        <th>In.Qty</th>
                                        <th>Out.Qty</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id', $product->id)->where('status','1')->sum('buying_qty');
                                        $selling_qty = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                                    @endphp
                                  
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product['supplier']['name']}}</td>
                                            <td>{{$product['category']['name']}}</td>
                                            <td>{{$product['unit']['name']}}</td>
                                            <td>{{$buying_total}}</td>
                                            <td>{{$selling_qty}}</td>
                                            <td>{{$product->quantity}}</td>
                                        </tr>
                                   
                                </tbody>
                        </table>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr style="margin-bottom:0px">
                    <br>
                    <br>
                    <br>
                    <br>
                    <table border="0" width="100%">
                        <tbody>
                            <tr>
                                <td style="width:40%">
                                   
                                </td>
                                <td style='width:20%'></td>
                                <td style="width:40%; text-align:center">
                                    <p>Owner  Signature</p>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div> 
    </body>
</html>
