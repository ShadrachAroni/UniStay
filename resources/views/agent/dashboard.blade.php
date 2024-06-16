
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



</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
  @include('agent/sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
	@include('agent/navBar')
			<!-- partial -->

			<div class="page-content">

      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome {{Auth::user()->name}}</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
              <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
              <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
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


</body>
</html>    