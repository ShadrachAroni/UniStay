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
     <link rel="stylesheet" href="{{asset ('modal/css/ionicons.min.css')}}">
     <link rel="stylesheet" href="{{asset('modal/css/flaticon.css')}}">
     <link rel="stylesheet" href="{{asset('modal/css/style.css')}}">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

     <style>
        .center-left h2{
    margin-top: 5%;
    font-size: 2.9rem;
    font-weight: bold;
}
.form-control:hover + .error {
        display: block;
    }
    .error {
        display: none;
        color: red;
        font-size: 12px;
    }
     </style>

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

</head>
<body>
    <div class="col-sm-6 brand">
        <div class="success-msg">
            @if(session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
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
                    <a href="#login" id="openLogin" class="h-btn1" onclick="showLogin()">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <button class="h-btn2" onclick="showRegister()"> 
                            Register
                        </button>
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

<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="ion-ios-close"></span>
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
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#signup">Sign Up</a>
                                    </li>
                                  </ul>
                              </div>
                              <div class="col-sm-6 brand">
                                <div class="success-msg">
                                    @if(session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                              <!-- Tab panes -->
                              <div class="tab-content border-0">
                                <div class="tab-pane p-0 container active" id="signin">
                                    <div class="text w-100">
                                        <h3 class="mb-4">Log in </h3>
                                        <form class="signin-form" method="POST" action="{{ route('login') }}">
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
                                                      <a href="#">Forgot Password</a>
                                                  </div>
                                  </div>
                                </form>
                                <p>Dont have an account? <a data-toggle="tab" href="#signup">Sign Up</a></p>
                              </div>
                                </div>
                                <div class="tab-pane p-0 container fade" id="signup">
                                    <div class="text w-100">
                                        <h3 class="mb-4">Sign Up</h3>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                        <div class="form-group mb-3">
                                            <label for="Fname" value="{{ __('First Name') }}">Full Name</label>
                                            <input type="text" name="Fname" id="Fname" class="form-control" value="{{ old('Fname') }}" required autofocus autocomplete="name" placeholder="First Name">
                                            <span class="error"></span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="Lname" value="{{ __('Last Name') }}">Full Name</label>
                                            <input type="text" name="Lname" id="Lname" class="form-control" value="{{ old('Lname') }}" required autofocus autocomplete="name" placeholder="Last Name">
                                            <span class="error"></span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="email" value="{{ __('Email') }}">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="email">
                                            <span class="error"></span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="phone" value="{{ __('Phone') }}">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required autofocus autocomplete="phone" placeholder="contact">
                                            <span class="error"></span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="address" value="{{ __('Address') }}">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" autofocus autocomplete="address" placeholder="address">
                                            <span class="error"></span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="password" value="{{ __('Password') }}">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required placeholder="password">
                                            <span class="error"></span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="confirm password">
                                            <span class="error"></span>
                                        </div>
                                  <div class="form-group mb-3 d-md-flex">
                                      <div class="form-check w-100 text-left">
                                          <label class="custom-control fill-checkbox">
                                                          <input type="checkbox" class="fill-control-input">
                                                          <span class="fill-control-indicator"></span>
                                                          <span class="fill-control-description">I agree all statements in <a href="#">terms of service</a></span>
                                                      </label>
                                                  </div>
                                  </div>
                                  <div class="form-group mb-3">
                                      <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                                  </div>
                                </form>
                                <p>I'm already a member! <a data-toggle="tab" href="#signin">Sign In</a></p>
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

<!-- Register Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="ion-ios-close"></span>
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
                                      <a class="nav-link" data-toggle="tab" href="#signIn">Log in</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#signUp">Sign Up</a>
                                    </li>
                                  </ul>
                              </div>

                              <!-- Tab panes -->
                              <div class="tab-content border-0">
                                <div class="tab-pane p-0 container fade" id="signIn">
                                    <div class="text w-100">
                                        <h3 class="mb-4">Log in </h3>
                                        <form class="signin-form" method="POST" action="{{ route('login') }}">
                                            @csrf
                                        <div class="form-group mb-3">
                                            <label class="label" for="name">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                                        </div>
                                  <div class="form-group mb-3">
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
                                                      <a href="#">Forgot Password</a>
                                                  </div>
                                  </div>
                                </form>
                                <p>Dont have an account? <a data-toggle="tab" href="#signUp">Sign Up</a></p>
                              </div>
                                </div>
                                <div class="tab-pane p-0 container active" id="signUp">
                                    <div class="text w-100">
                                        <h3 class="mb-4">Sign Up</h3>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                        <div class="form-group mb-3">
                                            <label for="Fname" value="{{ __('First Name') }}">Full Name</label>
                                            <input type="text" name="Fname" id="Fname" class="form-control" value="{{ old('Fname') }}" required autofocus autocomplete="name" placeholder="First Name">
                                            <span class="error">Must contain alphabets only</span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="Lname" value="{{ __('Last Name') }}">Full Name</label>
                                            <input type="text" name="Lname" id="Lname" class="form-control" value="{{ old('Lname') }}" required autofocus autocomplete="name" placeholder="Last Name">
                                            <span class="error">Must contain alphabets only</span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="email" value="{{ __('Email') }}">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="email">
                                            <span class="error">must contiain '@example.example'</span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="phone" value="{{ __('Phone') }}">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required autofocus autocomplete="phone" placeholder="contact">
                                            <span class="error">Must contain numbers only<br>Must not exeed 12 digits
                                            </span>
                                          
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="address" value="{{ __('Address') }}">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" autofocus autocomplete="address" placeholder="address">
                                            <span class="error"></span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="password" value="{{ __('Password') }}">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required placeholder="password">
                                            <span class="error">Must contain more that 8 characters</span>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="confirm password">
                                            <span class="error"></span>
                                        </div>
                                            <div class="form-group mb-3 d-md-flex">
                                                <div class="form-check w-100 text-left">
                                                    <label class="custom-control fill-checkbox">
                                                                    <input type="checkbox" class="fill-control-input" required>
                                                                    <span class="fill-control-indicator"></span>
                                                                    <span class="fill-control-description">  {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-decoration-none">'.__('Terms of Service').'</a>',
                                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-decoration-none">'.__('Privacy Policy').'</a>',
                                                                    ]) !!}
                                                                </label>
                                                            </div>
                                            </div>

                                  <div class="form-group mb-3">
                                      <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                                  </div>
                                </form>
                                <p>I have an account! <a data-toggle="tab" href="#signIn">Sign In</a></p>
                                <p><a href="{{route('register')}}">Click here to register as Agent</a></p>
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


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<!--js file-->
<script  src="{{asset('front/js/script.js')}}"></script>
<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }
</script>
    <!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
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
function showRegister() {
    $('#register').modal('show');
}

  // Display Toastr success message if session contains 'success'
  @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break; 
        }
    @endif
    </script>

    <script src="{{asset('modal/js/jquery.min.js')}}"></script>
    <script src="{{asset('modal/js/popper.js')}}"></script>
    <script src="{{asset('modal/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('modal/js/main.js')}}"></script>

</body>
</html>