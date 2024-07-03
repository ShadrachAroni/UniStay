<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('../../backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('../../backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('../../backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('../../backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

    <!-- toastr:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- end toastr:css -->

    <style>
        body {
            overflow: auto; /* Show scrollbar only when needed */
        }
        .input-group {
            position: relative;
        }
        .input-group .icon {
            position: absolute;
            right: 10px;
            top: 155%;
            transform: translateY(-155%);
            cursor: pointer;
        }
        .authlogin-side-wrapper {
            width: 100%;
            height: 100%;
            background-image: url({{ asset('upload/login.png') }});
        }
         a:hover{
            color: aqua;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="authlogin-side-wrapper"></div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">Uni<span>Stay</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Welcome! Log in to your account.</h5>
                                        <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                            @csrf
                                           
                                            <div class="mb-3">
                                                <label for="Email" class="form-label">Email/Phone</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" :value="old('email_or_phone_number')" required autofocus autocomplete="username">
                                                <div class="mb-3 input-group">
                                                    <span class="icon"><i class="fas fa-user"></i></span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                                                <div class="mb-3 input-group">
                                                    <span class="icon"><i class="fas fa-lock"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                                <label class="form-check-label" for="remember_me">
                                                    Remember me
                                                </label>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    Login
                                                </button>
                                            </div>
                                            <div class="d-flex justify-content-between mt-3 text-muted">
                                                @if (Route::has('password.request'))
                                                    <a class="text-muted" href="{{ route('password.request') }}">
                                                        Forgot your password?
                                                    </a>
                                                @endif
                                                <a href="{{ route('register') }}" class="text-muted ms-3">Not a user? Create Account</a>
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
    </div>

    <!-- core:js -->
    <script src="{{ asset('../../backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('../../backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- toastr:js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- end toastr:js -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                toastr.error("{{ $errors->first() }}");
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
        });
    </script>
</body>
</html>
