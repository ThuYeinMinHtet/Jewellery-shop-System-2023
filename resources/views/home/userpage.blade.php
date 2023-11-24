
  
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
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    @include('home.navbar')
         <!-- end header section -->
    <!-- slider section -->
@include('home.Welcometext') 
    <!-- end slider section -->
  </div>

  <!-- item section -->

 @include('home.bestprice') 

  <!-- end item section -->

  <!-- about section -->

 

  <!-- end about section -->

  <!-- price section -->

  @include('home.product') 
  <!-- end price section -->

  <!-- ring section -->

  @include('home.special') 
  <!-- end ring section -->

  <!-- client section -->

   
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


