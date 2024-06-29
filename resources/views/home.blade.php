<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="UniStay">

  
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
 
     <link rel="stylesheet" type="text/css" href ="{{asset('front/css/style.css')}}">
 
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
        <li><a href="{{ route('pages.add') }}">Add Listing</a></li>
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
                    <a href="{{ route('login') }}" class="h-btn1">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="h-btn2">
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
        <p>Discovering suitable student accommodation is now simpler than ever with our innovative application. Designed with students in mind, our platform streamlines the search process, offering a comprehensive database of verified properties tailored to your needs and preferences. </p>

        <div class="h-search">
            <form>
                <input type="search" placeholder="Search by location..." class="search-input">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>

    <div class="home-img" data-aos="zoom-in-up">
        <img src="{{asset('front/img/hero.png')}}">
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

    <div class="property-content">
        <div class="row">
            <img src="{{asset('front/img/p1.png')}}">
            <h5>Property</h5>
            <p>Somewhere,Kenya 10th street</p>
            <div class="list">
                <a href="#" class="residence-list">
                    <i class='bx bx-bed'></i>
                    4 Bed
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-bath' ></i>
                2 Bath
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-shape-square' ></i>
                    1203 sqft
                </a>
            </div>
        </div>

        <div class="row">
            <img src="{{asset('front/img/p2.png')}}">
            <h5>Property</h5>
            <p>Somewhere,Kenya 10th street</p>
            <div class="list">
                <a href="#" class="residence-list">
                    <i class='bx bx-bed'></i>
                    4 Bed
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-bath' ></i>
                2 Bath
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-shape-square' ></i>
                    1203 sqft
                </a>
            </div>
        </div>

        <div class="row">
            <img src="{{asset('front/img/p3.png')}}">
            <h5>Property</h5>
            <p>Somewhere,Kenya 10th street</p>
            <div class="list">
                <a href="#" class="residence-list">
                    <i class='bx bx-bed'></i>
                    4 Bed
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-bath' ></i>
                2 Bath
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-shape-square' ></i>
                    1203 sqft
                </a>
            </div>
        </div>
    </div>

    <div class="center-btn">
        <a href="#" class="btn">View all properties</a>
    </div>
</section>

<!--about section-->
<section class="about">
    <div class="about-img" data-aos="zoom-in-up">
        <img src="{{asset('front/img/Group 1.png')}}">
    </div>
    <div class="about-text" data-aos="zoom-in-up">
        <h2>We help Students find suitable accomodations</h2>
        <p> Whether you're looking for a cozy single room, a shared apartment, or a place in a student dormitory, UniStay provides comprehensive listings complete with detailed descriptions, photos, and reviews from fellow students</p>
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

<!-- Agent Registration Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="createTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createForm" method="post" action=" ">
                    @csrf
                    <div class="mb-3">
                        <label for="Fname" class="form-label">First Name</label>
                        <input id="Fname" class="form-control" name="Fname" type="text" value="{{ old('Fname', '') }}">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Lname" class="form-label">Last Name</label>
                        <input id="Lname" class="form-control" name="Lname" type="text" value="{{ old('Lname', '') }}">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" name="email" type="email" value="{{ old('email', '') }}">
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Contact</label>
                        <input id="phone" class="form-control" name="phone" type="text" value="{{ old('phone', '') }}">
                        @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input id="address" class="form-control" name="address" type="text" value="{{ old('address', '') }}">
                        @error('address')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-control" name="password" type="password" value="{{ old('password', '') }}">
                        @error('password')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
 
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>


<!--js file-->
<script  src="{{asset('front/js/script.js')}}"></script>
<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }
</script>
	<!-- core:js -->
	<script src="../backend/assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="../backend/assets/vendors/flatpickr/flatpickr.min.js"></script>
  <script src="../backend/assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="../backend/assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../backend/assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="../backend/assets/js/dashboard-dark.js"></script>
	<!-- End custom js for this page -->

    <!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    @if (session('showModal'))
        $('#create').modal('show');
    @endif
});

$(document).ready(function() {
    @if (session('showRegister'))
        $('#register').modal('show');
    @endif
});
    </script>
</body>
</html>