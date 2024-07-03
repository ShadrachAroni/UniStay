<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Agent Registration</title>

    <!-- Icons font CSS-->
    <link href="{{asset('registerForm/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('registerForm/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('registerForm/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('registerForm/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('registerForm/css/main.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('background/style.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<style>
    button:hover{
        transform: translateY(0px) scale(1.1); 
    }

    .col-2 a {
            text-decoration: none;
            color: #007BFF; /* Blue color */
            font-weight: bold;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .col-2 a:hover {
            background-color: #007BFF; /* Blue background */
            color: white; /* White text */
        }
        .input-group p {
            margin: 0; /* Remove default margin */
            text-decoration: none;
            color: black; /* Blue color */
            font-weight: none;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .input-group a {
            color: #007BFF; /* Blue color */
            text-decoration: none;
            font-weight: bold;
        }

        .input-group a:hover {
            text-decoration: underline; /* Underline on hover */
        }
</style>
</head>

<body>
<div id="particles-background" class="vertical-centered-box"></div>
<div id="particles-foreground" class="vertical-centered-box"></div>
<div class="vertical-centered-box">
  <div class="content">

        <div class="col-sm-6 brand">
            <div class="success-msg">
                @if(session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
   
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <div class="row row-span">
                        <div class="col-2">
                            <h2 class="title">Create Account</h2>
                        </div>
                    </div>
                   
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row row-space">

                            <div class="col-2">
                                <div class="input-group">
                                    <label for="Fname" class="label">First Name</label>
                                    <input type="text" name="Fname" id="Fname" class="input--style-4" value="{{ old('Fname') }}" required autofocus autocomplete="First name">
                                    @error('Fname')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input type="text" name="Lname" id="Lname" class="input--style-4" value="{{ old('Lname') }}" required autofocus autocomplete="last name">
                                    @error('Lname')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                       
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" name="email" id="email" class="email" value="{{ old('email') }}" required autofocus autocomplete="email">
                                @error('email')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                       

                        <div class="row row-space">

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" name="phone" id="phone" class="phone" value="{{ old('phone') }}" required autofocus autocomplete="phone">
                                    @error('phone')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" name="address" id="address" class="address" value="{{ old('address') }}" autofocus autocomplete="address">
                                    @error('address')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row row-space">
                            <div class="col-2">

                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" required autofocus autocomplete="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" required autofocus autocomplete="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        @error('gender')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Password</label>
                            <input type="password" class="input--style-4" name="password" id="password" class="password" required>
                            @error('password')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group">
                            <label class="label">Confirm Password</label>
                            <input type="password" class="input--style-4" name="password_confirmation" id="password_confirmation" class="password_confirmation" required>
                            @error('Confirm Password')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="hidden" name="role_id" id="role_id" value="3">
                            @error('Role')
                            <span class="error">{{ $message }}</span>
                            @enderror

                        <div class="input-group">
                            <label class="radio-container m-r-45"> {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-decoration-none">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-decoration-none">'.__('Privacy Policy').'</a>',
                            ]) !!}
                                <input type="checkbox" id="terms" name="terms" required>
                                <span class="checkmark"></span>
                                @error('terms')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        
                        <label class="label">Upload a <strong>clear </strong> of your National ID for verification</label>
                        <div class="row row-space">

                            <div class="col-2">
                              <div class="input-group">
                                <label class="label">National ID</label>
                                <input type="file" name="national_id_card" id="national_id_card" class="file" onchange="previewImage(event, 'national_id_card_preview')">
                                <img id="national_id_card_preview" src="" alt="National ID Preview" style="display:none; width: 200px; height: auto; border-radius: 10px; margin-top: 10px;">
                              </div>
                            </div>

                          </div>
                          <br>

                        <div class="row ">
                            <div class="col-2">
                                <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                            </div>
                        <div class="col-2">
                            <a href="{{route('home')}}">Home</a>
                        </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>

    
  </div>
</div>

    <!-- Jquery JS-->
    <script src="{{asset('registerForm/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('registerForm/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('registerForm/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('registerForm/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('registerForm/js/global.js')}}"></script>
    <script src="{{ asset('background/script.js')}}"></script>

    <!-- toastr:js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
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

  function previewImage(event, previewId) {
    const input = event.target;
    const file = input.files[0];
    const reader = new FileReader();

    reader.onload = function() {
      const preview = document.getElementById(previewId);
      preview.src = reader.result;
      preview.style.display = 'block';
    };

    if (file) {
      reader.readAsDataURL(file);
    }
  }

   </script>
</body>
</html>
<!-- end document-->