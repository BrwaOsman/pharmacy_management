{{-- @extends('layouts.app')
@section('content') --}}
{{-- <div class=" text-center">
 <center><img src="{{asset('assets/img/logo.svg')}}" alt="..." class="ml-5 text-center" width="100">
<span class="ml-5 mt-4">Ferga Laboratory Management System</span></center>

</div> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
   
</style>
<body>


    <div class="container  bg-light" style="width: 8.75cm; box-shadow:5px 10px 18px #888888;">
        <div class="text-center title">
          <div class="nameee">
            <img src="{{asset('assets/img/logo.svg')}}" width="50px" class="mt-4" alt="">
            <h3>MY pharma</h3>
            <hr>
            <h2>Countact Us</h2>
            <span>Email : brwa.gmail.com</span> <br>
            <span>Address : Penjwen</span> <br>
            <span>Phone : 07510412543</span>
    </div>
            <div class="container" style="width: 8.70cm; margin-left: -7px">
    
                <table class="table " id="">
                    <thead>
                        <tr >
                            <th>Name</th>
                            <th>Price </th>
                            <th>Piece</th>
                            <th>Total</th>
                        </tr>
    
                    </thead>
                    <tbody class="tbg">
                       @include('layouts.table_print')
                    </tbody>
                </table>
                <h6>*** Thanks For Coming ***</h6>
                <p>Programmer : Brwa Osman - Phone : 07510412543</p>
                <h6 class="pb-2">Code Product : <span>350 </span> </h6>
            </div>
        </div>
    </div>
    
    
    </div>
</body>
</html>
{{-- 
<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
  <link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
  <title>CodePen - POS Receipt Template Html Css</title>

  <style>
@media print {
    .page-break { display: block; page-break-before: always; }
}
      #invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
}
#invoice-POS ::selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: .9em;
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p {
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 100px;
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}
#invoice-POS #top .logo {
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
  background-size: 60px 60px;
}
#invoice-POS .clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
#invoice-POS .info {
  display: block;
  margin-left: 0;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: .5em;
  background: #EEE;
}
#invoice-POS .service {
  border-bottom: 1px solid #EEE;
}
#invoice-POS .item {
  width: 24mm;
}
#invoice-POS .itemtext {
  font-size: .5em;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
}

    </style>

  <script>
  window.console = window.console || function(t) {};
</script>



  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" >


  <div id="invoice-POS">

    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>SBISTechs Inc</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->

    <div id="mid">
      <div class="info">
        <h2>Contact Info</h2>
        <p> 
            Address : street city, state 0000</br>
            Email   : JohnDoe@gmail.com</br>
            Phone   : 555-555-5555</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->

    <div id="bot">

                    <div id="table">
                        <table>
                            <tr class="tabletitle">
                                <td class="item"><h2>Item</h2></td>
                                <td class="Hours"><h2>Price</h2></td>
                                <td class="Hours"><h2>Piece</h2></td>
                                <td class="Rate"><h2>Sub Total</h2></td>

                                
                               
                            </tr>
                            <tbody class="tb">
                                @foreach ($solds as $item)
                                <tr>
                                    <td><p class="itemtext">{{$item->stock->name}}</p></td>
                                    <td><p class="itemtext">{{$item->price_at}}</p></td>
                                    <td>
                                        <p class="itemtext">{{$item->piece}}</p>   
                                    </td>
                                    <td>
                                        <p class="itemtext">{{number_format($item->piece * $item->price_at , 0 ,'.','.')}} IQD</p></td>
                                </tr>
                                @endforeach
                                @php
                                $sum = 0;
                                for($i = 0 ; $i<count($solds); $i++){ $k=$solds[$i]['price_at'] * $solds[$i]['piece']; $sum +=$k; }
                                    @endphp <tr>
                                    <th colspan="3"><h6>All Price</h6></th>
                                    <td><h6>{{number_format($sum,0,'.','.')}} IQD</h6></td>
                                    </tr>
                            </tbody>
                           

                        </table>
                    </div><!--End Table-->

                    <div id="legalcopy">
                        <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices. 
                        </p>
                    </div>

                </div><!--End InvoiceBot-->
  </div><!--End Invoice-->






</body>

</html> --}}



{{-- @endsection --}}
