<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Password Reset</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <!-- Custom styles for hiding scrollbar and background image -->
    <style>
        .input-group {
            position: relative;
        }
        .input-group .icon {
            position: absolute;
            right: 10px;
            top: 125%;
            transform: translateY(-125%);
            cursor: pointer;
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
                            <div class="auth-form-wrapper px-5 py-6">
                                <div class="justify-content-center ">
                                    <a href="#" class="noble-ui-logo logo-light d-block mb-2 justify-content-center">UniStay<span>Accommodation</span></a>
                                    <h5 class="text-muted fw-normal mb-4 justify-content-center">Forgot your password? No problem.</h5>
                                </div>
                                <div class="mb-4 text-sm text-gray-600">
                                    {{ __('Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </div> 

                                <form method="POST" action="{{ route('password.email') }}" class="forms-sample">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" :value="old('email')" required autofocus autocomplete="username">
                                        <div class="mb-3 input-group">
                                            <span class="icon"><i class="fas fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex justify-content-center mt-4 col-sm-6">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Email Password Reset Link') }}
                                            </button>
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-center mt-4 col-sm-6">
                                            <a href="{{ route('home') }}"class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                Home
                                            </a>
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

    <script src="{{ asset('form/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('form/js/jquery.min.js')}}"></script>
    <script src="{{ asset('form/js/index.js')}}"></script>
    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <!-- endinject -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                toastr.error("{{ $errors->first('email') }}");
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
