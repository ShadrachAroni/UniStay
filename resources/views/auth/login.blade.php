<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UniStay</title>
    <link href="{{ asset('form/css/fonts.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('form/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('form/css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/icons8-accomodation-lineal-color-96.png') }}">
  <link rel="shortcut icon" href="{{ asset('img/icons8-accomodation-lineal-color-96.png') }}">

  <!-- Include Toastr CSS and JavaScript -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<link rel="stylesheet" type="text/css" href="{{asset('background/style.css')}}">

</head>

<body>
@include('layouts.preloader')

<div id="particles-background" class="vertical-centered-box"></div>
<div id="particles-foreground" class="vertical-centered-box"></div>
<div class="vertical-centered-box">
  <div class="content">

    <div class="container">
        <section id="formHolder">
            <div class="row">
               <!-- Brand Box -->
            <div class="col-sm-6 brand">
                <div class="success-msg">
                    @if(session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
                <!-- Form Box -->
                <div class="col-sm-6 form">
                    <!-- Login Form -->
                    <div class="login form-peice">
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-heading">
            <h2>Sign In</h2>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required autocomplete="username">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="" required >
        </div>

        <div class="CTA">
        <input type="submit" value="Sign In">
            <a href="#" class="switch">Don't have an account?</a>
        </div>
        <div class="CTA">
            <a href="{{ route('password.request') }}">forgot password?</a>
         
        </div>
        <a href="{{ route('home') }}">Back to Home</a>
    
    </form>
</div>
                    <!-- End Login Form -->
                    <div class="signup form-peice switched">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-heading">
                                <h2>Create Account</h2>
                            </div>

                            <div class="form-group">
                                <label for="name" value="{{ __('Name') }}">Full Name</label>
                                <input type="text" name="name" id="name" class="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="email" value="{{ __('Email') }}">Email</label>
                                <input type="email" name="email" id="email" class="email" value="{{ old('email') }}" required autofocus autocomplete="email">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone" value="{{ __('Phone') }}">Phone</label>
                                <input type="text" name="phone" id="phone" class="phone" value="{{ old('phone') }}" required autofocus autocomplete="phone">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="address" value="{{ __('Address') }}">Address</label>
                                <input type="text" name="address" id="address" class="address" value="{{ old('address') }}" required autofocus autocomplete="address">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="password" value="{{ __('Password') }}">Password</label>
                                <input type="password" name="password" id="password" class="password" required>
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="password_confirmation" required>
                                <span class="error"></span>
                            </div>

                            <div class="CTA">
                                <input type="submit" value="Register">
                                <a href="#" class="switch">I have an account</a>
                                <a href="{{ route('home') }}">Back to Home</a>
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </section>
    </div>
  </div>
</div>
    <script src="{{ asset('form/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('form/js/jquery.min.js')}}"></script>
    <script src="{{ asset('form/js/index.js')}}"></script>
    <script src="{{ asset('background/script.js')}}"></script>
    
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
   
      <!-- toastr:js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- end toastr:js -->
     <!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

$(document).ready(function() {
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

        });
    </script>
</body>

</html>
