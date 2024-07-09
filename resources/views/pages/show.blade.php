<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="UniStay">
  
  <title>UniStay</title>

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('view/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('view/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('view/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('view/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('view/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('front/css/style.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d" style="color: black">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x" style="color: black;"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Type</label>
              <select class="form-control form-select form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                <option>Open House</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="city">City</label>
              <select class="form-control form-select form-control-a" id="city">
                <option>All City</option>
                <option>Alabama</option>
                <option>Arizona</option>
                <option>California</option>
                <option>Colorado</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bedrooms">Bedrooms</label>
              <select class="form-control form-select form-control-a" id="bedrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="garages">Garages</label>
              <select class="form-control form-select form-control-a" id="garages">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">Bathrooms</label>
              <select class="form-control form-select form-control-a" id="bathrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="price">Min Price</label>
              <select class="form-control form-select form-control-a" id="price">
                <option>Unlimite</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12" style="margin-top: 20px;">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  <header class="sticky">
    <a href="#" class="logo">
        <img src="{{asset('../front/img/logo.png')}}">
    </a>
    <ul class="navbar open">
        <a href="{{url('/')}}">Home</a></li>
        <a href="{{ route('about')}}">About Us</a>
        <a href="{{route('contact')}}">Contact Us</a>

        @auth
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 3)
                <a href="{{ route('pages.add') }}">Add Listing</a>
            @else
                <a href="#" onclick="showAccessDeniedAlert()">Add Listing</a>
                <script>
                    function showAccessDeniedAlert() {
                      Swal.fire({
                        title: "<strong>Oops!</strong>",
                        icon: "info",
                        html: `
                            You have to be an agent to access <br>
                            <a href="{{route('register.agent')}}" style="color: blue; text-decoration:underline;">Click here</a> to register as an agent.
                        `,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText: `
                            <i class="fa fa-thumbs-up"></i>
                        `
                        });
                    }
                </script>
            @endif
                @else
                <a href="#login" id="openLogin" class="h-btn1" onclick="showLogin()">
                  Add Listing
              </a>
        @endauth
        <a href="{{route('view.listings')}}" class="h-btn1">All Listings</a>
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
 
                    <a href="{{ url('/dashboard') }}" class="h-btn2">
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
  <!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">304 Blaster Up</h1>
              <span class="color-text-a">Chicago, IL 606543</span>
            </div>
           
          </div> 
          
          <div class="col-sm-12 col-lg-4 d-flex justify-content-lg-end justify-content-end" style="margin-top: -100px;">
            <a href="#" class="logo">
              <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse p-2" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
                <i class="bi bi-search"></i>
              </button>
          </a>
          </div>
        </div>
      </div>
    </section>
    <!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div id="property-single-carousel" class="swiper">
              <div class="swiper-wrapper">
                <div class="carousel-item-b swiper-slide">
                  <img src="{{url('view/img/slide-1.jpg')}}" alt="">
                </div>
                <div class="carousel-item-b swiper-slide">
                  <img src="{{url('view/img/slide-2.jpg')}}" alt="">
                </div>
              </div>
            </div>
            <div class="property-single-carousel-pagination carousel-pagination"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    
                    <a class="btn btn-a" href="#">Book this Listing</a>
                    
                  </div>
                </div>

                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>

                  <div class="summary-list">
                    <ul class="list row">
                      <li>
                        <strong>Listing ID:</strong>
                        <span>1134</span>
                      </li>
                      <li>
                        <strong>price:</strong>
                        <span>ksh 15000</span>
                      </li>
                      <li>
                        <strong>Location:</strong>
                        <span>Chicago, IL 606543</span>
                      </li>
                      <li>
                        <strong>Status:</strong>
                        <span>Available</span>
                      </li>
                      <li>
                        <strong>Property Type:</strong>
                        <span>House</span>
                      </li>
                      <li>
                        <strong>Main Category:</strong>
                        <span>----</span>
                      </li>
                      <li>
                        <strong>Beds:</strong>
                        <span>1-4</span>
                      </li>
                      <li>
                        <strong>Bath:</strong>
                        <span>1</span>
                      </li>
                    </ul>
                  </div>
                  

                </div>

              </div>

              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit
                    neque, auctor sit amet
                    aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta.
                    Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt
                    nibh pulvinar quam id dui posuere blandit.
                  </p>
                  <p class="description color-text-a no-margin">
                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget
                    malesuada. Quisque velit nisi,
                    pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                  </p>
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin" style="color:aqua;">
                    <li>Balcony</li>
                    <li>Outdoor Kitchen</li>
                    <li>Cable Tv</li>
                    <li>Deck</li>
                    <li>Tennis Courts</li>
                    <li>Internet</li>
                    <li>Parking</li>
                    <li>Sun Room</li>
                    <li>Concrete Flooring</li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-10 offset-md-1">

            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-plans-tab" data-bs-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Map location</a>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                <img src="{{url('view/img/plan2.jpg')}}" alt="" class="img-fluid">
              </div>
              <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>

          </div>

          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Agent</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <img src="{{url('view/img/agent-4.jpg')}}" alt="" class="img-fluid">
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent">Anabella Geller</h4>
                
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Phone:</strong>
                      <span class="color-text-a">(222) 4568932</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Mobile:</strong>
                      <span class="color-text-a">777 287 378 737</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a">annabella@example.com</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Skype:</strong>
                      <span class="color-text-a">Annabela.ge</span>
                    </li>
                  </ul>
                  <div class="socials-a">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-12 col-lg-4">
                    <div class="property-contact">
                      <form class="form-a">
                        <div class="row">
                          <div class="col-md-12 mb-1">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                            </div>
                          </div>
                          <div class="col-md-12 mb-1">
                            <div class="form-group">
                              <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                            </div>
                          </div>
                          <div class="col-md-12 mb-1">
                            <div class="form-group">
                              <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                            </div>
                          </div>
                          <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-a">Send Message</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Property Single-->

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
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

    <div class="contact-content" style="font-weight: bold;">
        <h4>Types</h4>
        <li><a href="#">Houses</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Appartment</a></li>
        <li><a href="#">Hostels</a></li>
    </div>

    <div class="contact-content">
        <h4>Categories</h4>
        <li><a href="#">Furnished</a></li>
        <li><a href="#">Male-only</a></li>
        <li><a href="#">Female-only</a></li>
        <li><a href="#">SShort-term rental</a></li>
    </div>

    <div class="contact-content">
        <h4>Features</h4>
        <li><a href="#">Pool</a></li>
        <li><a href="#">Laundry</a></li>
        <li><a href="#">Kitchen</a></li>
        <li><a href="#">TV</a></li>
    </div>
    
</section>
  <!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
<!-- Vendor JS Files -->
<script src="{{asset('view/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('view/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('view/vendor/php-email-form/validate.js')}}"></script>


<link rel="stylesheet" href="{{asset ('modal/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('modal/css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('modal/css/style.css')}}">

<!-- Template Main JS File -->
<script src="{{asset('view/js/main.js')}}"></script>

<!-- core:js -->
<script src="{{ asset('../backend/assets/vendors/core/core.js')}}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('../backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('../backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('../backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{ asset('../backend/assets/js/template.js')}}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('../backend/assets/js/dashboard-dark.js')}}"></script>
<!-- End custom js for this page -->

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