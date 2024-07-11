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
		.card {
			margin-bottom: 25px;
		}
	</style>
 <!-- Google Maps JavaScript API -->
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGH0RkB_JRcwXZziuSysQHsDDBFXVodXI&callback=initMap" async defer></script>
 <script>
	function initMap() {
		// The location of the property
		const propertyLocation = { 
			@foreach ($properties as $property)
				lat: {{ $property->latitude }}, 
				lng: {{ $property->longitude }} 
			@endforeach
		};

		// The map, centered at the property location
		const map = new google.maps.Map(document.getElementById('map'), {
			zoom: 10,
			center: propertyLocation
		});

		// The marker, positioned at the property location
		const marker = new google.maps.Marker({
			position: propertyLocation,
			map: map
		});
	}
</script>
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

				<div class="card">
					<div class="card-body">
						<h4 class="mb-3 mb-md-0">Available</h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Photo</th>
									<th>ID</th>
									<th>Title</th>
									<th>Agent ID</th>
									<th colspan="2">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($properties->where('availability_status', 'available') as $property)
								<tr>
									<td class="py-1">
										<!-- image -->
										@if ($property->photos->isNotEmpty())
											@php
												$photo = $property->photos->first();
											@endphp
											<img src="{{ asset('upload/photos/' . $photo->filename) }}" alt="Property Photo" style="width:53px;height:53px;">
										@else
											<img src="{{url('upload/img/no_image.png')}}" alt="">
										@endif
									</td>
									<td>{{ $property->id }}</td>
									<td>{{ $property->title }}</td>
									<td>{{ $property->agent_id }}</td>
									<td>
										<a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#show_{{$property->id}}">View</a>
									</td>

									<td>
										<a href="#" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#change_{{$property->id}}">Change Status</a>
									</td>
		
									<td>
										<form id="delete-property-form-{{ $property->id }}" class="inline-block" action="{{ route('properties.destroy', $property->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion('{{ $property->id }}')">Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h4 class="mb-3 mb-md-0">Booked</h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Photo</th>
									<th>ID</th>
									<th>Title</th>
									<th>Agent ID</th>
									<th colspan="2">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($properties->where('availability_status', 'booked') as $property)
								<tr>
									<td class="py-1">
										<!-- image -->
										@if ($property->photos->isNotEmpty())
											@php
												$photo = $property->photos->first();
											@endphp
											<img src="{{ asset('upload/photos/' . $photo->filename) }}" alt="Property Photo" style="width:53px;height:53px;">
										@else
											<img src="{{url('upload/img/no_image.png')}}" alt="">
										@endif
									</td>
									<td>{{ $property->id }}</td>
									<td>{{ $property->title }}</td>
									<td>{{ $property->agent_id }}</td>
									<td>
										<a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#show_{{$property->id}}">View</a>
									</td>

									<td>
										<a href="#" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#change_{{$property->id}}">Change Status</a>
									</td>
		
									<td>
										<form id="delete-property-form-{{ $property->id }}" class="inline-block" action="{{ route('properties.destroy', $property->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion('{{ $property->id }}')">Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h4 class="mb-3 mb-md-0">Unavailable</h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Photo</th>
									<th>ID</th>
									<th>Title</th>
									<th>Agent ID</th>
									<th colspan="2">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($properties->where('availability_status', 'unavailable') as $property)
								<tr>
									<td class="py-1">
										<!-- image -->
										@if ($property->photos->isNotEmpty())
											@php
												$photo = $property->photos->first();
											@endphp
											<img src="{{ asset('upload/photos/' . $photo->filename) }}" alt="Property Photo" style="width:53px;height:53px;">
										@else
											<img src="{{url('upload/img/no_image.png')}}" alt="">
										@endif
									</td>
									<td>{{ $property->id }}</td>
									<td>{{ $property->title }}</td>
									<td>{{ $property->agent_id }}</td>
									<td>
										<a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#show_{{$property->id}}">View</a>
									</td>
									<td>
										<a href="#" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#change_{{$property->id}}">Change Status</a>
									</td>
									
									<td>
										<form id="delete-property-form-{{ $property->id }}" class="inline-block" action="{{ route('properties.destroy', $property->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion('{{ $property->id }}')">Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>

    @foreach($properties as $property)
    <!-- Modal for view  -->
    <div class="modal fade" id="show_{{$property->id}}" tabindex="-1" aria-labelledby="showTitle_{{$property->id}}" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showTitle_{{$property->id}}">property ID {{$property->id}} 
						@foreach ($property->bookings as $booking)
							@if($property->availability_status === 'booked')
								(Booked By {{$booking->student->Fname}} {{$booking->student->Fname}})
							@endif
						@endforeach
					</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
					<div class="card rounded" style="margin-bottom: 20px">
                        <div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2">
									<h6 class="card-title mb-0">Photos</h6>
								</div>
								<div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										@foreach ($property->photos as $index => $photo)
											<div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
												<img src="{{ asset('upload/photos/' . $photo->filename) }}" class="d-block w-100" alt="Property Photo" style="width:200px;height:auto;">
											</div>
										@endforeach
									</div>
									<a class="carousel-control-prev" href="#carouselControls" role="button" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselControls" role="button" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</a>
								</div>
						</div>
					</div>

					<div class="card rounded" style="margin-bottom: 20px">
                        <div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2">
									<h6 class="card-title mb-0">Video</h6>
								</div>
								@if ($property->video)
									<video width="320" height="240" controls>
										<source src="{{ asset('upload/videos/' . $property->video) }}" type="video/mp4">
										Your browser does not support the video tag.
									</video>
								@else
									<p>No video available</p>
								@endif
								
						</div>
					</div>

                    <div class="card rounded">

                        <div class="card-body">


							<div class="justify-content-center text-center">
								<label class="tx-11 fw-bolder mb-0 text-uppercase">Title:</label>
								<p class="text-muted">{{$property->title}}</p>
							</div>

							<div class="justify-content-center text-center row" >
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Type:</label>
                                <p class="text-muted">{{$property->propertyType->name}}</p>
                            </div>
							
							<div class="justify-content-center text-center row">
								<label class="tx-11 fw-bolder mb-0 text-uppercase">Description:</label>
								<p class="text-muted">{{$property->description}}</p>
							</div>

                            <div class="justify-content-center text-center row">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Policies:</label>
                                <p class="text-muted">{{$property->policies}}</p>
                            </div>

							<div class="row">
								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Bathrooms:</label>
									<p class="text-muted">{{$property->baths}}</p>
								</div>

								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Beds:</label>
									<p class="text-muted">{{$property->beds_start}} - {{$property->beds_end}}</p>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Country:</label>
									<p class="text-muted">{{$property->country}}</p>
								</div>
								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">City</label>
									<p class="text-muted">{{$property->city}}</p>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Street:</label>
									<p class="text-muted">{{$property->street}}</p>
								</div>
								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Area Name</label>
									<p class="text-muted">{{$property->area_name}}</p>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6" >
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Features:</label>
									<div style="max-height: 100px; overflow-y: auto;">
										@foreach ($property->features as $feature)
											<li>{{ $feature->name }}</li>
										@endforeach
									</div>
								</div>
								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Amenities:</label>
									<div style="max-height: 100px; overflow-y: auto;">
										@foreach ($property->amenities as $amenity)
											<li>{{ $amenity->name }}</li>
										@endforeach
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Categories:</label>
									<div style="max-height: 100px; overflow-y: auto;">
										@foreach ($property->categories as $category)
											<li>{{ $category->name }}</li>
										@endforeach
									</div>
								</div>
								<div class="col-sm-6">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Surrounding:</label>
									<div style="max-height: 100px; overflow-y: auto;">
										@foreach ($property->surroundings as $surrounding)
											<li>{{ $surrounding->name }}</li>
										@endforeach
									</div>
								</div>
							</div>
							
							<div class="mt-3 row">
								<label class="tx-11 fw-bolder mb-0 text-uppercase">Location</label>
								<div id="map" style="height: 400px; width: 100%;"></div>
							</div>
							
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal -->
    @endforeach

		<!-- change Modal -->
@foreach($properties as $property)
<div class="modal fade" id="change_{{$property->id}}" tabindex="-1" aria-labelledby="changeTitle_{{$property->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeTitle_{{$property->id}}">Change property ID {{$property->id}} Availability status</h5>
                <button property="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST" action="{{ route('status.change') }}">
                    @csrf

					<div class="mb-3">
						<label for="availability_status" class="form-label">Availability Status</label>
						<select id="availability_status" class="form-control" name="availability_status">
							<option value="available" {{ old('availability_status', $property->availability_status) == 'available' ? 'selected' : '' }}>Available</option>
							<option value="unavailable" {{ old('availability_status', $property->availability_status) == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
							<option value="booked" {{ old('availability_status', $property->availability_status) == 'booked' ? 'selected' : '' }}>Booked</option>
						</select>
						@error('availability_status')
							<p class="text-sm text-red-600">{{ $message }}</p>
						@enderror
					</div>
					<input type="hidden" name="property_id" value="{{ $property->id }}">

                    <div class="modal-footer">
                        <button property="submit" class="btn btn-primary">Update</button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End change Modal -->
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
		function confirmDeletion(propertyId) {
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
					document.getElementById('delete-property-form-' + propertyId).submit();
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
