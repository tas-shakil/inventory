<html>
    <head>
        <title>Invoice PDF</title>   
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
                    <table>
                        <tbody>
                            <tr>
                                <td width="30%"></td>
                                <td>
                                    <u><strong><span style="font-size:15px">Daily Purchase Report {{date('d-m-Y',strtotime($start_date))}} - {{date('d-m-Y',strtotime($end_date))}}</span></strong></u>
                                </td>
                                <td></td>
                              
                            </tr>
                          
                        </tbody>
                    </table>
              
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Purchase No</th>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                              $total_sum = '0';  
                            @endphp
                            @foreach($allData as $key => $purchase)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$purchase->purchase_no}}</td>
                                <td>{{date('d-m-Y',strtotime($purchase->date))}}</td>
                                <td>{{$purchase['product']['name']}}</td>
                                <td>
                                  {{$purchase->buying_qty}}/
                                  {{$purchase['product']['unit']['name']}}
                                </td>
                                <td>{{$purchase->unit_price}}</td>
                                <td>{{$purchase->unit_price * $purchase->buying_qty}}</td>

                                @php
                                    $total_sum += $purchase->buying_price; 
                                @endphp
                              
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" style="text-align:right;"><strong>Grand Total: </strong></td>
                                <td>{{ $total_sum}}</td>
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
