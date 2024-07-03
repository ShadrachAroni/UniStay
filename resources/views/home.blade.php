<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="UniStay">
    <title>Home Page</title>
  
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
 
     <link rel="stylesheet" type="text/css" href ="{{asset('front/css/style.css')}}">
     <link rel="stylesheet" href="{{asset ('modal/css/ionicons.min.css')}}">
     <link rel="stylesheet" href="{{asset('modal/css/flaticon.css')}}">
     <link rel="stylesheet" href="{{asset('modal/css/style.css')}}">

     <!-- Template Main CSS File -->
     <link href="{{asset('view/css/style.css')}}" rel="stylesheet">


     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


     <!--box-icon link-->
     <link rel="stylesheet"
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
 
 
     <!--google fons link-->
     <link rel="preconnect"
     href="https://fonts.googleapis.com">
     <link rel="preconnect"
     href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap"  rel="stylesheet">
     
 
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

     <style>
        .card-body-a a:hover{
            transform: translateY(0px) scale(1.1); 
            color: var(--main-color);
        }
        .carousel-item img{
            width: 100%;
            height: 80vh;
        }
     </style>

</head>
<body>
<!--header-->
<header class="sticky">
    <a href="#" class="logo">
        <img src="{{asset('../front/img/logo.png')}}">
    </a>
    <ul class="navbar open">
        <li><a href="#">Home</a></li>
        <li><a href="{{ route('about')}}">About Us</a></li>
        <li><a href="{{route('contact')}}">Contact Us</a></li>

        @auth
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 3)
                <li><a href="{{ route('pages.add') }}">Add Listing</a></li>
            @else
                <a href="#" onclick="showAccessDeniedAlert()">Add Listing</a>
                <script>
                    function showAccessDeniedAlert() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Access Denied!',
                            text: 'You do not have permission to access this feature.',
                            showConfirmButton: true
                        });
                    }
                </script>
            @endif
                @else
                    <a href="{{ route('pages.add') }}">Add Listing</a>
        @endauth
    </ul>

    <div class="h-btn">
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="#" class="h-btn1" onclick="logout()" onclick="event.preventDefault();" onclick="event.preventDefault();">
                        Logout
                    </a>           
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
 
                    <a href="{{ route('dashboard') }}" class="h-btn2">
                        Dashboard
                    </a>                
                @else
                    <a href="#login" id="openLogin" class="h-btn1" onclick="showLogin()">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="h-btn2" > 
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
        <div class="bx bx-menu" id="menu-icon"></div> 
    </div>  
</header>

<!--home section-->
<section class="home">
    <div class="home-text" data-aos="zoom-in-up">
        <h1>Find Your Perfect Haven, Effortlessly</h1>
        <p>Discovering suitable student accommodation is now simpler than ever with our innovative application. Designed with students in mind, our platform streamlines the search process, offering a comprehensive database of verified listings tailored to your needs and preferences. </p>

        <div class="h-search">
            <form  action="#">
                <i class="fas fa-map-marker-alt search-icon"></i>
                <input type="search" placeholder="Search by location..." class="search-input">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-aos="zoom-in-up">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('front/img/A5.png')}}" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="{{asset('front/img/A1.png')}}" class="d-block w-100 " alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="{{asset('front/img/A2.png')}}" class="d-block w-100" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img src="{{asset('front/img/A3.png')}}" class="d-block w-100" alt="Fourth slide">
            </div>
            <div class="carousel-item">
                <img src="{{asset('front/img/A4.png')}}" class="d-block w-100" alt="Fifth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<!--features section-->
<section class="feature" data-aos="zoom-in-up">
    <div class="center-left">
        <h2>Featured In</h2>
    </div>
    <div class="feature-content">

        <div class="f-img">
            <img src="{{asset('front/img/f1.png')}}">
        </div>

        <div class="f-img">
            <img src="{{asset('front/img/f2.png')}}">
        </div>

        <div class="f-img">
            <img src="{{asset('front/img/f3.png')}}">
        </div>

        <div class="f-img">
            <img src="{{asset('front/img/f4.png')}}">
        </div>

        <div class="f-img">
            <img src="{{asset('front/img/f5.png')}}">
        </div>
    </div>
</section>

<!--property section-->
<section class="property" data-aos="zoom-in-up">
    <div class="center-left">
        <h2>Featured listings</h2>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{url('view/img/property-1.jpg')}}" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">204 Mount
                        <br /> Olive Road Two</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">price | ksh 12000</span>
                    </div>
                    <div class="price-box d-flex">
                      <span class="price-a">monthly</span>
                    </div>
                    <a href="#" class="link-a">Click here to view ->
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>

                        <li>
                          <h4 class="card-info-title">Category</h4>
                          <span>Hostel</span>
                        </li>
                        <li>
                        <h4 class="card-info-title">Type</h4>
                        <span>Room</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>1</span>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        <div class="col-md-4">
        <div class="card-box-a card-shadow">
            <div class="img-box-a">
            <img src="{{url('view/img/property-3.jpg')}}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
            <div class="card-overlay-a-content">
                <div class="card-header-a">
                <h2 class="card-title-a">
                    <a href="#">204 Mount
                    <br /> Olive Road Two</a>
                </h2>
                </div>
                <div class="card-body-a">
                <div class="price-box d-flex">
                    <span class="price-a">price | Ksh 12000</span>
                </div>
                <div class="price-box d-flex">
                    <span class="price-a">monthly</span>
                </div>
                <a href="#" class="link-a">Click here to view ->
                    <span class="bi bi-chevron-right"></span>
                </a>
                </div>
                <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                    <li>

                    <li>
                        <h4 class="card-info-title">Category</h4>
                        <span>Hostel</span>
                    </li>
                    <li>
                    <h4 class="card-info-title">Type</h4>
                    <span>Room</span>
                    </li>
                    <li>
                    <h4 class="card-info-title">Beds</h4>
                    <span>2</span>
                    </li>
                    <li>
                    <h4 class="card-info-title">Baths</h4>
                    <span>1</span>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card-box-a card-shadow">
            <div class="img-box-a">
            <img src="{{url('view/img/property-6.jpg')}}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
            <div class="card-overlay-a-content">
                <div class="card-header-a">
                <h2 class="card-title-a">
                    <a href="#">204 Mount
                    <br /> Olive Road Two</a>
                </h2>
                </div>
                <div class="card-body-a">
                <div class="price-box d-flex">
                    <span class="price-a">price | Ksh 12000</span>
                </div>
                <div class="price-box d-flex">
                    <span class="price-a">monthly</span>
                </div>
                <a href="#" class="link-a">Click here to view ->
                    <span class="bi bi-chevron-right"></span>
                </a>
                </div>
                <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                    <li>

                    <li>
                        <h4 class="card-info-title">Category</h4>
                        <span>Hostel</span>
                    </li>
                    <li>
                    <h4 class="card-info-title">Type</h4>
                    <span>Room</span>
                    </li>
                    <li>
                    <h4 class="card-info-title">Beds</h4>
                    <span>2</span>
                    </li>
                    <li>
                    <h4 class="card-info-title">Baths</h4>
                    <span>1</span>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>

      </div>

    <div class="center-btn">
        <a href="{{route('view.listings')}}" class="btn">View all Listings</a>
    </div>
</section>

<!--about section-->
<section class="about">
    <div class="about-img" data-aos="zoom-in-up">
        <img src="{{asset('front/img/Group 1.png')}}">
    </div>
    <div class="about-text" data-aos="zoom-in-up">
        <h2>We help Students find suitable accomodations</h2>
        <p style="color:#d6d6d6;"> Whether you're looking for a cozy single room, a shared apartment, or a place in a student dormitory, UniStay provides comprehensive listings complete with detailed descriptions, photos, and reviews from fellow students</p>
        <a href="#" class="btn">Get In touch</a>
    </div>
</section>

<!--Subscribe section-->
<section class="Subscribe" data-aos="zoom-in-up">
    <div class="Subscribe-content">
        <h2>Let's simplify life with UniStay</h2>
        <p> Our revolutionary website designed to simplify the process of finding student accommodation</p>
        <a href="#" class="btn">Get Started</a>
    </div>
</section>

<!--Contact Section-->
<section class="contact" data-aos="zoom-in-up">
    <div class="contact-content">
        <img src="{{asset('front/img/logo.png')}}">
        <p>Below you will be able to access our social media platforms and get more in touch with us</p>
        <div class="icons">
            <a href="#"><i class='bx bxl-facebook' ></i></a>
            <a href="#"><i class='bx bxl-instagram' ></i></a>
            <a href="#"><i class='bx bxl-twitter' ></i></a>
            <a href="#"><i class='bx bxl-youtube' ></i></a>
        </div>
    </div>

    <div class="contact-content">
        <h4>Listings</h4>
        <li><a href="#">Houses</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Appartment</a></li>
        <li><a href="#">Hostels</a></li>
    </div>

    <div class="contact-content">
        <h4>Listings</h4>
        <li><a href="#">Houses</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Appartment</a></li>
        <li><a href="#">Hostels</a></li>
    </div>

    <div class="contact-content">
        <h4>Listings</h4>
        <li><a href="#">Houses</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Appartment</a></li>
        <li><a href="#">Hostels</a></li>
    </div>
    
</section>
</div>

<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <div class="row2 no-gutters">
            <div class="col-md-6 d-flex">
                <div class="modal-body p-5 img d-flex img text-center d-flex align-items-center" style="background-image: url({{asset('form/css/img/A4.jpg')}});">
                </div>
              </div>
              <div class="col-md-6 d-flex">
                <div class="modal-body p-4 p-md-5 align-items-center color-2">
                    <div class="tabulation tabulation2">
                              <div class="d-flex tabs">
                                  <ul class="nav nav-tabs border-0">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#signin">Log in</a>
                                    </li>
                                  </ul>
                              </div>
                              <!-- Tab panes -->
                              <div class="tab-content border-0">
                                <div class="tab-pane p-0 container active" id="signin">
                                    <div class="text w-100">
                                        <h3 class="mb-4">Log in </h3>
                                        <form class="signin-form" method="POST" action="{{ route('login') }}" id="loginForm">
                                            @csrf
                                        <div class="form-group mb-3 mb-3">
                                            <label class="label" for="name">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                                        </div>
                                  <div class="form-group mb-3 mb-3">
                                      <label class="label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                  </div>
                                  <div class="form-group mb-3">
                                      <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                  </div>
                                  <div class="form-group mb-3 d-md-flex">
                                      <div class="form-check w-50 text-left">
                                          <label class="custom-control fill-checkbox">
                                                          <input type="checkbox" class="fill-control-input">
                                                          <span class="fill-control-indicator"></span>
                                                          <span class="fill-control-description">Remember Me</span>
                                                      </label>
                                                  </div>
                                                  <div class="w-50 text-md-right">
                                                      <a href="{{route('password.request')}}">Forgot Password</a>
                                                  </div>
                                  </div>
                                </form>
                                <p>Dont have an account? <a data-toggle="tab" href="{{route('register')}}">Register</a></p>
                              </div>
                                </div>
                              </div>
                          </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>

<!-- End Modal -->

<!--register notification modal-->

<!--End--> 


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

 <!-- Bootstrap JS, Popper.js, and jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!--js files-->
<script src="{{asset('modal/js/jquery.min.js')}}"></script>
<script src="{{asset('modal/js/popper.js')}}"></script>
<script src="{{asset('modal/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modal/js/main.js')}}"></script>
<script  src="{{asset('front/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('view/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('view/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('view/vendor/php-email-form/validate.js')}}"></script>

<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }

$(document).ready(function() {
    @if (session('showLogin'))
        $('#login').modal('show');
    @endif
});

$(document).ready(function() {
    @if (session('showRegister'))
        $('#register').modal('show');
    @endif
});
function showLogin() {
    $('#login').modal('show');
}

</script>

    

</body>
</html>