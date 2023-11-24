 <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="home/images/logo.png" alt="">
            <span>
              Jewellery Shop
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          
        
 
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jewellery.html">Jewellery </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('showCart')}}">Cart</a>
                </li>
                @if (Route::has('login'))
                
                @auth
                    <li class="nav-item">
                <x-app-layout>
                       
                </x-app-layout> 
                      </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                
                 <li class="nav-item">
                  <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>
                
                @endauth
                @endif
              </ul>

            </div>
            <div class="quote_btn-container ">
              <a href="">
                <img src="home/images/cart.png" alt="">
                <div class="cart_number">
                  0
                </div>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
          
          </nav>
      </div>
    </header>