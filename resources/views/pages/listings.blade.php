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

  <link rel="stylesheet" href="{{asset ('modal/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('modal/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('modal/css/style.css')}}">

  <!-- Template Main CSS File -->
  <link href="{{asset('view/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href ="{{asset('front/css/style.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <style>
    .form-group label{
      color: black;
    }
    .range-container {
      display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }
        .range-value {
            font-size: 1.5em;
            margin-left: 10px;
            color: black;
        }
        
        .multi-select-container {
            position: relative;
            display: inline-block;
            width: 100%; /* Ensure the container uses full width */
        }

        .multi-select-dropdown {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            max-height: 200px; /* Set max height for the dropdown */
            overflow-y: auto;  /* Add scrollbar if content overflows */
            width: 100%; /* Make dropdown match the width of the button */
        }

        .multi-select-dropdown label {
          display: flex; /* Use flexbox for layout */
          justify-content: space-between; /* Push contents to the right */
          align-items: center; /* Align items vertically */
          padding: 8px;
          cursor: pointer;
          color: black;  /* Change text color to black */
        }

        .multi-select-dropdown label:hover {
            background-color: #f1f1f1;
        }

        .multi-select-btn {
            padding: 10px;
            border: 1px solid #ccc;
            cursor: pointer;
            color: black;  /* Change button text color to black */
            display: inline-block;
            width: 100%; /* Ensure button uses full width */
            box-sizing: border-box; /* Include padding and border in width calculation */
        }

        .multi-select-btn::after {
            content: ' ▼';
        }

        /* Optional: Ensure checkboxes are styled properly */
        .multi-select-option {
            margin-right: 10px;
        }

        /* Style for the input container */
        #selectedValues {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
  </style>
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d" style="color: black">Search for Listing</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x" style="color: black;"></span>
    <div class="box-collapse-wrap form">
      <form action="{{ route('properties.search') }}" method="GET" class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" name="keyword" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>

          <div class="col-md-12 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Price Range</label>
              <div class="range-container">
                <input type="range" name="priceRange" class="form-range" id="formRange" min="0" max="100000" value="0" step="100">
                <label class="pb-2" for="price">0 to
                  <span class=" pb-2" id="rangeValue">Ksh 0</span>
                </label>
            </div>
            </div>
          </div>

          <div class="col-md-12 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Types</label>
              <select name="propertyTypes" class="form-control form-select form-control-a" id="Type">
                <option value="none">none</option>
                @foreach($propertyTypes as $propertyType)
                      <option value="{{ $propertyType->id }}">{{ $propertyType->name }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="category">Categories</label>
              <select name="categories" class="form-control form-select form-control-a" id="Type">
                <option value="none">none</option>
                @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
        </div>
    
        <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="feature">feature</label>
              <select name="features" class="form-control form-select form-control-a" id="Type">
                <option value="none">none</option>
                @foreach($features as $feature)
                      <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                  @endforeach
              </select>
            </div>
        </div>
    
        <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="amenity">amenities</label>
              <select name="amenities" class="form-control form-select form-control-a" id="amenity">
                <option value="none">none</option>
                @foreach($amenities as $amenity)
                      <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                  @endforeach
              </select>
            </div>
        </div>
    
        <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="surrounding">surroundings</label>
              <select name="surroundings" class="form-control form-select form-control-a" id="surrounding">
                <option value="none">none</option>
                @foreach($surroundings as $surrounding)
                      <option value="{{ $surrounding->id }}">{{ $surrounding->name }}</option>
                  @endforeach
              </select>
            </div>
        </div>

          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Country</label>
              <input name="country" type="text" class="form-control form-control-lg form-control-a" placeholder="Country">
            </div>
          </div>

          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">City</label>
              <input name="city" type="text" class="form-control form-control-lg form-control-a" placeholder="City">
            </div>
          </div>


          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">area name</label>
              <input name="area_name" type="text" class="form-control form-control-lg form-control-a" placeholder="Area name">
            </div>
          </div>

          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">street</label>
              <input name="street" type="text" class="form-control form-control-lg form-control-a" placeholder="Street">
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

              <h1 class="title-single" style="color: white">Our Amazing Accommodations</h1>
              <span class="color-text-a">Find your preferred accomodation!</span>

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
      </div>
    </section>
    <!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          </div>
          @if($properties->isEmpty())
            <div class="col-12">
                <p>No properties found.</p>
                <div class="center-btn">
                  <a href="{{ route('view.listings') }}" class="h-btn2" > 
                    View All Listings
                  </a>
                </div>
            </div>
          @else
            @foreach ($properties as $property)
              <div class="col-md-4">
                <div class="card-box-a card-shadow">
                  <div class="img-box-a" style="position: relative;">
                    @if ($property->photos->isNotEmpty())
                        @php
                            $photo = $property->photos->first();
                        @endphp
                        <img src="{{ asset('upload/photos/' . $photo->filename) }}" class="img-a img-fluid" alt="Property Photo" style="height: 55vh;">
                        <span class="availability-status" style="position: absolute; top: 10px; left: 10px; color: black; font-weight: bold; padding: 5px; text-transform: uppercase;">
                            {{ $property->availability_status }}
                        </span>
                    @else
                        <img src="{{ url('upload/img/no_image.png') }}" class="img-a img-fluid" alt="No Image" style="height: 60vh;">
                    @endif
                </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="#">{{$property->title}}
                            <br />{{$property->city}},{{$property->street}}</a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">price | Ksh {{$property->price}}</span>
                        </div>
                        <div class="price-box d-flex">
                          <span class="price-a">monthly</span>
                        </div>
                        <a href="{{ route('pages.show', ['id' => $property->id]) }}" class="link-a">
                          Click here to view
                          <span data-feather="arrow-right">></span>
                      </a>
                      </div>
                      <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                          <li>

                            <li>
                              <h4 class="card-info-title">Category</h4>
                              <span> {{ $property->categories->first()->name }}</span>
                            </li>
                            <li>
                            <h4 class="card-info-title">Type</h4>
                            <span>{{$property->propertyType->name}}</span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Beds</h4>
                            <span>{{$property->beds_start}} - {{$property->beds_end}}</span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Baths</h4>
                            <span>{{$property->baths}}</span>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#" class="h-btn2" style="margin-left: 0px; margin-top: -60px;"> Save Listing </a>
              </div>
            @endforeach
          @endif

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

  <!--<div id="preloader"></div>-->
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
const formRange = document.getElementById('formRange');
        const rangeValue = document.getElementById('rangeValue');

        formRange.addEventListener('input', () => {
          rangeValue.textContent = `Ksh ${parseInt(formRange.value).toLocaleString()}`;
        });
        function setupMultiSelect(btnId, dropdownId, inputId) {
            const multiSelectBtn = document.getElementById(btnId);
            const multiSelectDropdown = document.getElementById(dropdownId);
            const checkboxes = multiSelectDropdown.querySelectorAll('.multi-select-option');
            const inputContainer = document.getElementById(inputId);

            multiSelectBtn.addEventListener('click', () => {
                multiSelectDropdown.style.display = multiSelectDropdown.style.display === 'none' || !multiSelectDropdown.style.display ? 'block' : 'none';
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selectedOptions = Array.from(checkboxes)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.parentNode.textContent.trim());

                    inputContainer.value = selectedOptions.join(', ');
                });
            });

            document.addEventListener('click', (e) => {
                if (!multiSelectBtn.contains(e.target) && !multiSelectDropdown.contains(e.target)) {
                    multiSelectDropdown.style.display = 'none';
                }
            });
        }

        // Initialize multi-selects
        setupMultiSelect('multiSelectBtnAmenities', 'multiSelectDropdownAmenities', 'selectedValues');
        setupMultiSelect('multiSelectBtnCategories', 'multiSelectDropdownCategories', 'selectedValues');
        setupMultiSelect('multiSelectBtnFeatures', 'multiSelectDropdownFeatures', 'selectedValues');
        setupMultiSelect('multiSelectBtnSurroundings', 'multiSelectDropdownSurroundings', 'selectedValues');
</script>
</body>

</html>