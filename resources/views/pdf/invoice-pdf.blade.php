<html>
    <head>
        <title>Invoice PDF</title>   
         <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    </head> 
    
    <body>

        <div class="container">
            <div class="row">
                <div class='col-md-12'>
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="15%"><p>Customer Info</p></td>
                                <td width="25%"><p><strong>Name:</strong> {{$payment['customer']['name']}}</p></td>
                                <td width="25%"><p> <strong>Mobile No:</strong> {{$payment['customer']['mobile_no']}}</p></td>
                                <td width="35%"><p><strong>Address:</strong> {{$payment['customer']['address']}}</p></td>
                            </tr>
                            <tr>
                                <td width="15%"></td>
                                <td width="85%" colspan="3"><p><strong>Description:</strong>{{$invoice->description}}</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <hr style="margin-bottom:0px">
                    <table border="1" width="100%" style="margin-bottom:10px">
                        <thead>
                            <tr class="text-center">
                                <th>SL.</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th style="background:#ddd;padding:1px">Current Stock</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Toatal Price</th>
                            </tr>
        
                        </thead>
                        <tbody>
                            @php
                            $total_sum = '0' ;
                            @endphp
                            @foreach($invoice['invoice_details'] as $key => $details)
                            <tr class="text-center">
                                <td>{{$key+1}}</td>
                                <td>{{$details['category']['name']}}</td>
                                <td>{{$details['product']['name']}}</td>
                                <td>{{$details['product']['quantity']}}</td>
                                <td>{{$details->selling_qty}}</td>
                                <td>{{$details->unit_price}}</td>
                                <td>{{$details->selling_price}}</td>
                            </tr>
                            @php
                                $total_sum+= $details->selling_price;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="6" class="text-right"><strong>Sub Total:</strong>&nbsp;&nbsp;</td>
                                <td class="text-center"><strong>{{$total_sum}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-right">Discount:&nbsp;&nbsp;</td>
                                <td class="text-center">{{$payment->discount_amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-right">Paid Amount:&nbsp;&nbsp;</td>
                                <td class="text-center">{{$payment->paid_amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-right">Due Amount:&nbsp;&nbsp;</td>
                                <td class="text-center">{{$payment->due_amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-right"><strong>Grand Total:</strong>&nbsp;&nbsp;</td>
                                <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
                            </tr>
                        </tbody>
                    
        
                    </table>
                
                @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'));
                @endphp
                <i>Printing Time: {{$date->format('F j, Y, g:i a')}}</i>
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
                                <td>
                                    <p style="text-align:center;margin-left:20px">Customer Signature</p>
                                </td>
                                <td style='width:20%'></td>
                                <td style="width:40%; text-align:center">
                                    <p>Seller Signature</p>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

         

        </div>



       
    </body>



</html>
