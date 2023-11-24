
  
  <!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <base href="/public" />
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
  <style>
        
  </style>
</head>

<body>

   <div class="hero_area">
    <!-- header section strats -->
    @include('home.navbar')
         <!-- end header section -->
    <!-- slider section -->

                     
    <!-- end slider section -->
 <div class="col-sm-6 col-sm-4 col-lg-4" style="margin:auto; width:50%">
        <div class="box">
          <div class="name">
            <h6>
              {{$product->title}}
            </h6>
          </div>
          <div class="img-box">
            <img src="product_image/{{$product->image}}" alt="">
          </div>
          <div class="detail-box">
          @if($product->discount!=null) 
          <h5 style="color:red">
          discount price :<br>
              {{$product->discount}}  MMK
            </h5>
            
            <h5 style="text-decoration: line-through;color:blue;">
              {{$product->price}}  MMK
            </h5>
            
            @else
            <h5 style="color:blue">
                 {{$product->price}}   MMK
            </h5>
            @endif
            <h6> Category : {{$product->category}}  </h6>
            <h6> Detail   : {{$product->description}}  </h6>
            <h6> Quantity : {{$product->quantity}}    </h6>
            
             <form action="{{url("add_cart/$product->id")}}" method="post">
             @csrf
             <div class="row" style="padding-top:4px">
             <div class="col-md-4">
                    <input type="number" name="quantity" value="1"
                    min="1" style="width:100px"/>
                    </div>
                    <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" value="Add to Cart" /> 
                    </div>  
                    </div>
             </form>
          </div>
                     </div>
        </div>

   
  <!-- end client section -->

  <!-- contact section -->

   
  <!-- end contact section -->

  <!-- info section -->
 

  <!-- end info_section -->

  <!-- footer section -->

  <!-- footer section -->

  <script type="text/javascript" src="home/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="home/js/bootstrap.js"></script>
  <script type="text/javascript" src="home/js/custom.js"></script>
</body>

</html>


