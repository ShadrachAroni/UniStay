<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="UniStay">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

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

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		img{
			width: 50px;
		}
		.row{
			margin-bottom: 15px;
		}

		.row label{
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
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
						<h4 class="mb-3 mb-md-0">View Listings</h4>
					</div>
					<div class="d-flex align-items-center flex-wrap text-nowrap">
						<div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
							<span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
							<input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
						</div>
					</div>
				</div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Booking ID</th>
							<th>Property Title</th>
							<th>Student Name</th>
							<th>Student Info</th>
                            <th colspan="2">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($bookings as $booking)
						<tr>
							
                            <td>{{ $booking->property->id }}</td>
							<td>{{ $booking->property->title }}</td>
							<td>{{ $booking->student->Fname }}</td>
							<td>
                                <a href="#" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#show_{{$booking->student->id}}">View</a>
							</td>

                            <td>
                                <form class="inline-block" action="#" method="POST">
                                    <button type="button" class="btn btn-sm btn-primary">Confirm</button>
                                </form>
                            </td>

                            <td>
                                <form id="delete-booking-form-{{ $booking->id }}" class="inline-block" action="#" method="POST">
									@csrf
									<button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion('{{ $booking->id }}')">Cancel</button>
								</form>
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

  @foreach($bookings as $booking)
    <!-- Modal for view  -->
    <div class="modal fade" id="show_{{$booking->student->id}}" tabindex="-1" aria-labelledby="showTitle_{{$booking->student->id}}" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showTitle">Booking for {{$booking->property->title}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
					<div class="card rounded">
                        <div class="card-body">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal -->
    @endforeach



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

	<!-- Toastr JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	

	<script>
		function confirmDeletion(BookingId) {
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
					document.getElementById('delete-booking-form-' +BookingId).submit();
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						text: 'Type deleted Successfully!',
						showConfirmButton: false,
						timer: 1500
					});
				}
			});
		}

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
