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
            <input type="password" name="password" id="password" required autocomplete="current-password">
        </div>

        <div class="CTA">
        <input type="submit" value="Sign In">
            <a href="#" class="switch">Don't have an account?</a>
        </div>
        <div class="CTA">
            <a href="{{ route('register') }}" class="switch">forgot password?</a>
        </div>
    </form>
</div>
                    <!-- End Login Form -->

                    <!-- Signup Form -->
                    <div class="signup form-peice switched">
                        <form class="signup-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-heading">
                                <h2>Create Account</h2>
                            </div>

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="name" required autocomplete="name">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="email" required autocomplete="email">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" required autocomplete="phone">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address"  required autocomplete="address" >
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="pass">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="passConfirm">
                                <span class="error"></span>
                            </div>

                            <!--@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />
                                        <div class="ms-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                            @endif -->

                            <div class="CTA">
                                <input type="submit" value="Signup Now" id="submit">
                                <a href="#" class="switch">I have an account</a>
                            </div>
                        </form>
                    </div><!-- End Signup Form -->
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
            toastr.error("{{ $errors->first() }}");
        @endif

        @if(session('status'))
            toastr.success("{{ session('status') }}");
        @endif

        @if(session('message'))
            var type = "{{ session('alert-type', 'info') }}";
            switch(type) {
                case 'info':
                    toastr.info("{{ session('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ session('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ session('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ session('message') }}");
                    break; 
            }
        @endif
    });
</script>
</body>

</html>
