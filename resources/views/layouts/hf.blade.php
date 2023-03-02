
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title></title>

    <!-- Bootstrap core CSS -->
    
    <link href= "{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    
  

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
   
    <link rel="stylesheet" href= "{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href= "{{ asset('frontend/css/owl.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
  </head>

  <body>

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info d-flex">
              <li><a href="#"><i class="bx bxl-envelope"></i>rentmyvehicle@.com</a></li>
              <li><a href="#"><i class="bx bxl-phone"></i>977-9818506171</a></li>
              <li class="d-flex my-2 my-lg-0">
                {{-- @auth
                   
                    <a class="btn btn-info" href="{{ route('login') }}" role="button">Login</a>
                    <a class="btn btn-success" href="{{ route('register') }}" role="button">Register</a>
                   
                  
                @endauth --}}

                @if (Auth::user())
                <form class="d-inline" id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="btn btn-info" type="submit">Logout</button>
              </form>
                {{-- <div class="dropdown open">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                      <form class="d-inline" id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-info" type="submit">Logout</button>
                    </form>
                    </div>
                </div> --}}
            @else
                <a class="btn btn-outline-primary" href="{{ route('login') }}" role="button">Login</a>
                <a class="btn btn-outline-success" href="{{ route('register') }}" role="button">Register</a>
                <a class="btn btn-outline-info" href="/regis" role="button">Register as vendors</a>
            @endif
              </li>
            </ul>
            
          </div>
          
          <div class="col-md-4">
            <ul class="right-icons">
         
              <li><a href="#"><i class="bx bxl-facebook"></i></a></li>
              <li><a href="#"><i class="bx bxl-twitter"></i></a></li>
              <li><a href="#"><i class="bx bxl-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Rent MY<em>Vehicle</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}" href="/index">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="/Car">Car</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="/offer">Offers</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="/Bike">Bike</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="/team">Team</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="/testimonial">Testimonials</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="/contactdetail">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    @yield('body-content')

    <!-- Footer Starts Here -->
    <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-3 footer-item">
              <h4>Rent My Vehicle</h4>
              <p>Rent My vehicle is a platform whicle provides different car and bike in rent.</p>
              <ul class="social-icons">
                <li><a rel="nofollow" href="#" target="_blank"><i class="bx bxl-facebook"></i></a></li>
                <li><a href="#"><i class="bx bxl-twitter"></i></a></li>
                <li><a href="#"><i class="bx bxl-linkedin"></i></a></li>
              </ul>
            </div>
            <div class="col-md-3 footer-item">
              <h4>Contact Detail</h4>
              <ul class="menu-list">
                <li><a href="#">rentmyvehicle@.com</a></li>
                <li><a href="#">khatiwaday356@gmail.com</a></li>
                <li><a href="#">+977-9818506171</a></li>
                <li><a href="#">+977-9818185671</a></li>
              </ul>
            </div>
            <div class="col-md-3 footer-item">
              <h4>Pages</h4>
              <ul class="menu-list">
                <li><a href="#">Home</a></li>
                <li><a href="/Bike">Bike</a></li>
                <li><a href="/offer">Offer</a></li>
                <li><a href="/Car">Car</a></li>
                <li><a href="/team">Team</a></li>
                <li><a href="/contactdetail">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-md-3 footer-item last-item">
              <h4>Contact Us</h4>
              <div class="contact-form">
                <form id="contact footer-contact" action="" method="post">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </footer>
      
      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <p>
                  Copyright © 2023 Rent My Vehicle
                  
              </p>
            </div>
          </div>
        </div>
      </div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Bootstrap core JavaScript -->
    <link rel="stylesheet" href= >
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
   

    <!-- Additional Scripts -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/js/accordions.js') }}"></script>
    

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>
