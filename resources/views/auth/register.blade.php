<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UniStay</title>
    <link href="{{ asset('form/css/fonts.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('form/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('form/css/style.css') }}">

  <!-- Include Toastr CSS and JavaScript -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body>

<div class="background-container">
        <div class="background" style="background-image: url('{{ asset('form/css/img/8.jpg') }}');"></div>
        <div class="background" style="background-image: url('{{ asset('form/css/img/A2.jpg') }}');"></div>
        <div class="background" style="background-image: url('{{ asset('form/css/img/A3.jpg') }}');"></div>
        <div class="background" style="background-image: url('{{ asset('form/css/img/A4.jpg') }}');"></div>
        <div class="background" style="background-image: url('{{ asset('form/css/img/A5.jpg') }}');"></div>
        <!-- Add more background divs as needed -->
    </div>

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
                    <div class="login form-peice switched">
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
            <input type="password" name="password" id="password" required>
        </div>

        <div class="CTA">
        <input type="submit" value="Sign In">
            <a href="#" class="switch">Don't have an account?</a>
        </div>
        <div class="CTA">
            <a href="{{ route('password.request') }}">forgot password?</a>
         
        </div>
        <a href="{{ route('welcome') }}">Back to Home</a>
    
    </form>
</div>
                    <!-- End Login Form -->
                     <!-- Register Form -->
                    <div class="signup form-peice">
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
                                <a href="{{ route('welcome') }}">Back to Home</a>
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </section>

</div>
    <script src="{{ asset('form/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('form/js/jquery.min.js')}}"></script>
    <script src="{{ asset('form/js/index.js')}}"></script>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break; 
                }
            @endif

            @if (session('status'))
                toastr.success("{{ session('status') }}");
            @endif
        });
    </script>
</body>

</html>
