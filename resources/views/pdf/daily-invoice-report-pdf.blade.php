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
                                    <u><strong><span style="font-size:15px">Daily invoice Report {{date('d-m-Y',strtotime($start_date))}} - {{date('d-m-Y',strtotime($end_date))}}</span></strong></u>
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
                                <th>Invoice No</th>  
                                <th>Date</th>
                                <th>Customer Name</th>          
                                <th>Address</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                               $total_sum = '0';
                            @endphp
                            @foreach($allData as $key => $invoice)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>Invoice No#{{$invoice->invoice_no}}</td>
                                <td>{{$invoice->date}}</td>
                                <td>{{$invoice['payment']['customer']['name']}}</td>
                                <td>{{$invoice['payment']['customer']['address']}}</td>
                                <td>{{$invoice['payment']['total_amount']}}</td>
                            </tr>
                                @php
                                    $total_sum += $invoice['payment']['total_amount'];  
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="5" style="text-align:right">Grand Total : </td>
                                <td>{{$total_sum}}</td>
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
