<html>
    <head>
        <title>Credit Customer List</title>   
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
                                <th>SL.</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Due Amount</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                               $total_sum = '0';
                            @endphp
                            @foreach($allData as $key => $payment)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>Invoice no#{{$payment['invoice']['invoice_no']}}</td>
                                <td>{{date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                                <td>{{$payment['customer']['name']}}</td>
                                <td>{{$payment['customer']['mobile_no']}}</td>
                                <td>{{$payment['customer']['address']}}</td>
                                <td>{{$payment->due_amount}} Tk</td>
                                @php
                                  $total_sum += $payment->due_amount;  
                                @endphp
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" style="text-align:right">Total Due : </td>
                                <td>{{$total_sum}} Tk</td>
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
