@include('header')
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
  
</script>

</body>
</html>    
