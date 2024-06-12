<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upturn Login</title>
    <link href="{{ asset('form/css/fonts.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('form/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('form/css/style.css') }}">
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
                        @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ $value }}
                        </div>
                        @endsession
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
                                <input type="email" name="email" id="email" required autocomplete="username" >
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"  required autocomplete="current-password">
                            </div>

                            <!--<div class="">
                                <input id="remember_me" name="remember" type="" />
                                <label for="remember_me">{{ __('Remember me') }}</label>
                            </div>-->

                            <div class="CTA">
                                <input type="submit" value="Sign In">
                                <a href="#" class="switch">Dont have an account?</a>
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
</body>

</html>
