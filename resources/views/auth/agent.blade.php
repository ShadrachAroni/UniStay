<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Create Account</title>

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

    <!-- Custom styles for hiding scrollbar -->
    <style>
        .mb-3 i{
            color: red;
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
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">Uni<span>Stay</span></a>
                                   
                                @if(Auth::check())
                                        <h5 class="text-muted fw-normal mb-4">Confirm and Update your Details</h5>
                                        <form id="updateForm" method="post" action="{{ route('users.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                        
                                            <div class="mb-3">
                                                <label for="Fname" class="form-label">First Name</label>
                                                <input type="text" id="Fname" name="Fname" class="form-control" value="{{ old('Fname', $user->Fname) }}" >
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="Lname" class="form-label">Last Name</label>
                                                <input type="text" id="Lname" name="Lname" class="form-control" value="{{ old('Fname', $user->Lname) }}" >
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address (optional)</label>
                                                <input type="text" id="address" name="address" class="form-control"value="{{ old('address', $user->address) }}">
                                            </div>
        
                                            <div class="mb-3">
                                                <label class="form-label">Gender</label>
                                                <div class="d-flex">
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required
                                                            @if(old('gender', $user->gender) == 'male') checked @endif>
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required
                                                            @if(old('gender', $user->gender) == 'female') checked @endif>
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('gender')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <label for="ids">Upload a copy of your National ID for verification (Required)</label>
                                            <br>
                                            <div class="mb-3">
                                                <label for="national_id_card" class="form-label">National ID <i>*</i></label> 
                                                <input type="file" id="national_id_card" name="national_id_card" class="form-control" required>
                                            </div>
        
                                            <input type="hidden" name="role_id" value="3">

                                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                                <div class="form-check mb-3">
                                                    <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
                                                    <label class="form-check-label" for="terms">
                                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-decoration-none">'.__('Terms of Service').'</a>',
                                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-decoration-none">'.__('Privacy Policy').'</a>',
                                                        ]) !!} <i>*</i>
                                                    </label>
                                                </div>
                                            @endif
        
                                            <div class="d-flex justify-content-between">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <a href="{{url('/')}}" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    Home
                                                </a>
                                            </div>
                                        </form>
                                @else
                                        <h5 class="text-muted fw-normal mb-4">Create an Agebt account.</h5>
                                        <form id="registerForm2" method="POST" action="{{ route('register') }}" class="forms-sample">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="Fname" class="form-label">First Name</label>
                                                <input type="text" id="Fname" name="Fname" class="form-control" :value="old('Fname')" required autofocus autocomplete="First name">
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="Lname" class="form-label">Last Name</label>
                                                <input type="text" id="Lname" name="Lname" class="form-control" :value="old('Lname')" required autofocus autocomplete="Last name">
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control" :value="old('email')" required autocomplete="username">
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" id="phone" name="phone" class="form-control" :value="old('phone')" required autofocus autocomplete="phone">
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address (optional)</label>
                                                <input type="text" id="address" name="address" class="form-control" :value="old('address')" autocomplete="address">
                                            </div>
        
                                            <div class="mb-3">
                                                <label class="form-label">Gender</label>
                                                <div class="d-flex">
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('gender')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                            </div>
                                            
                                            <label for="ids">Upload a copy of your National ID for verification</label>
                                            <br>
                                            <div class="mb-3">
                                                <input type="file" id="national_id_card" name="national_id_card" class="form-control">
                                            </div>
                                            <input type="hidden" name="role_id" value="3">
                                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                                <div class="form-check mb-3">
                                                    <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
                                                    <label class="form-check-label" for="terms">
                                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-decoration-none">'.__('Terms of Service').'</a>',
                                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-decoration-none">'.__('Privacy Policy').'</a>',
                                                        ]) !!}
                                                    </label>
                                                </div>
                                            @endif
        
                                            <div class="d-flex justify-content-between">
                                                <button type="submit" class="btn btn-primary">Register</button>
                                                <a href="{{url('/')}}" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    Home
                                                </a>
                                            </div>
                                        </form>
                                @endif
                                    
                                        
                                    </div>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <!-- endinject -->
</body>
</html>
