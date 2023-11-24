
  
  <!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <base href="/public" >
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Jewellery Shop</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="home/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="home/css/responsive.css" rel="stylesheet" />
  <style type="text/css">
          .center{
              margin:auto;
              width:80%;
              text-align: center;
              padding: 30px;
              
          }
          
          table,th,td{
              border:1px solid grey;
          }
          .th_deg{
              font-size: 30px;
              padding:5px;
              background-color: lime;
          }
          .img_deg{
              height:150px;
              width:150px;
          }
          .total_deg{
              font-size: 20px;
              padding: 40px;
          }
  </style>
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    @include('home.navbar')
         <!-- end header section -->
    <!-- slider section -->
       @if(session()->has('message'))
               
               <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">x</button>
                    {{session()->get('message')}}
               </div>
               @endif
           <div class="center">
                 <table>
                         <tr>
                              <th class="th_deg">Product Title</th>
                              <th class="th_deg">Quantity</th>
                              <th class="th_deg">Total Price</th>
                              <th class="th_deg">Product Image</th>
                              <th class="th_deg">Action</th>
                              
                         </tr>
                             <?php $totalprice=0; ?>
                                    @foreach($cart as $cart)
                         <tr>
                             <td>{{$cart->product_title}}</td>
                             <td>{{$cart->quantity}}</td> 
                             <td>{{$cart->price}} MMK</td> 
                             <td><img class="img_deg" src="/product_image/{{$cart->image}}"></td> 
                             <td><a class="btn btn-danger" onclick="return confirm('Are you sure to remove this ?')"
                              href="{{url('cart/remove',$cart->id)}}">Remove</a></td> 
           
                         </tr>
                         <?php  $totalprice=$totalprice + $cart->price; ?>
                         @endforeach
                         
                         
                         
                 </table>
                 <div>
                       <h1 class="total_deg">Total Price : {{$totalprice}} MMK</h1>
                 </div>
                 <div>
                       <h1 style="font-sizeL 25px; 
                       padding-bottom: 15px;">Proceed to Order</h1>
                       <a href="{{url('cash_order')}}" class="btn btn-primary">Cash On delivery</a>
                       
                       <a href="{{url('stripPay',$totalprice)}}" class="btn btn-success">Pay Using Card</a>
                 </div>
           </div>
           
  <!-- footer section -->
     </div>
  <script type="text/javascript" src="home/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="home/js/bootstrap.js"></script>
  <script type="text/javascript" src="home/js/custom.js"></script>
</body>

</html>


