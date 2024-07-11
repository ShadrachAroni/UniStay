@include('header')
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
						<h4 class="mb-3 mb-md-0">Your Booked Listings</h4>
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
								@foreach ($properties as $property)
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
										<a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-info"  >View</a>
									</td>
		
									
								</tr>
								@endforeach
							</tbody>
						</table>
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