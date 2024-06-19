<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="UniStay">
  
  <link rel="icon" type="image/png" href="{{ asset('img/icons8-accomodation-lineal-color-96.png') }}">
  <link rel="shortcut icon" href="{{ asset('img/icons8-accomodation-lineal-color-96.png') }}">


	<title>UniStay</title>

  <!-- Fonts -->
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
<!-- End plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<!-- endinject -->

<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
<!-- End layout styles -->
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="jquery-3.7.1.min.js"></script>



</head>
<body>
@include('layouts.preloader')
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
  @include('user/sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
	@include('user/navBar')
			<!-- partial -->

			<div class="page-content">
					<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
						<div>
							<h4 class="mb-3 mb-md-0">Your Profile</h4>
						</div>
						<div class="d-flex align-items-center flex-wrap text-nowrap">
							<div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
							<span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
							<input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
							</div>
						</div>
					</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                        @include('profile.update-profile-information-form')
                                    @endif

                                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                @livewire('profile.update-password-form')
                                            </div>
                                        </div>
                                    @endif

                                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                @livewire('profile.two-factor-authentication-form')
                                            </div>
                                        </div>
                                    @endif

                                    <div class="card mb-4">
                                        <div class="card-body">
                                            @livewire('profile.logout-other-browser-sessions-form')
                                        </div>
                                    </div>

                                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                @livewire('profile.delete-user-form')
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
	   </div>
	</div>

    <!-- core:js -->
	<script src="{{ asset('../backend/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('../backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{ asset('../backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('../backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{ asset('../backend/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('../backend/assets/js/dashboard-dark.js')}}"></script>
	<!-- End custom js for this page -->

      <!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script>

$(document).ready(function() {
        // Display Toastr success message if session contains 'success'
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        // Your other JavaScript code here
        function confirmDeletion(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-user-form-' + userId).submit();
                }
            });
        }

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
