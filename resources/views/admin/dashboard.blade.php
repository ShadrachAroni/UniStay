@include('header')
@include('layouts.Dashpreloader')
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
  @include('admin/sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
	@include('admin/navBar')
			<!-- partial -->

			<div class="page-content">

      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome {{Auth::user()->Fname}}</h4>
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