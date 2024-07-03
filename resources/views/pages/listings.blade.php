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
  <link rel="stylesheet" type="text/css" href ="{{asset('front/css/style.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
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
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
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
    <section class="intro-single" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">

              <h1 class="title-single" style="color: white">Our Amazing Listings</h1>
              <span class="color-text-a">More Filters</span>

            </div>
          </div>
          
          <div class="col-sm-12 col-lg-4 d-flex justify-content-lg-end justify-content-center">
              <a href="#" class="logo">
                <img src="{{asset('../front/img/logo.png')}}" style="max-width: 200px;">
            </a>
            </div>

          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse p-2" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
                <i class="bi bi-search"></i>
              </button>
            
            </div>
          </div>


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
                      <span class="price-a">price | $ 12.000</span>
                    </div>
                    <div class="price-box d-flex">
                      <span class="price-a">monthly</span>
                    </div>
                    <a href="#" class="link-a">Click here to view
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
                      <span class="price-a">price | $ 12.000</span>
                    </div>
                    <div class="price-box d-flex">
                      <span class="price-a">monthly</span>
                    </div>
                    <a href="#" class="link-a">Click here to view
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
                      <span class="price-a">price | $ 12.000</span>
                    </div>
                    <div class="price-box d-flex">
                      <span class="price-a">monthly</span>
                    </div>
                    <a href="#" class="link-a">Click here to view
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
                <img src="{{url('view/img/property-7.jpg')}}" alt="" class="img-a img-fluid">
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
                      <span class="price-a">price | $ 12.000</span>
                    </div>
                    <div class="price-box d-flex">
                      <span class="price-a">monthly</span>
                    </div>
                    <a href="#" class="link-a">Click here to view
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
                <img src="{{url('view/img/property-8.jpg')}}" alt="" class="img-a img-fluid">
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
                      <span class="price-a">price | $ 12.000</span>
                    </div>
                    <div class="price-box d-flex">
                      <span class="price-a">monthly</span>
                    </div>
                    <a href="#" class="link-a">Click here to view
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
                <img src="{{url('view/img/property-10.jpg')}}" alt="" class="img-a img-fluid">
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
                      <span class="price-a">price | $ 12.000</span>
                    </div>
                    <div class="price-box d-flex">
                      <span class="price-a">monthly</span>
                    </div>
                    <a href="#" class="link-a">Click here to view
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

      </div>
    </section>
    <!-- End Property Grid Single-->

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
  <!-- End  Footer -->

  <!--<div id="preloader"></div>-->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('view/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('view/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('view/vendor/php-email-form/validate.js')}}"></script>


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
</body>

</html>