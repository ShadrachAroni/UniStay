
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="UniStay">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

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
            <h4 class="mb-3 mb-md-0">Listing Types </h4>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th rowspan="3">Description</th>
                        <th>Actions</th>
                        <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($types as $type)

                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->description }}</td>
                        <td>
                           
                           <a href="#" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#edit_{{$type->id}}">Edit</a>
                           
                       </td>
                       <td>
                          
                       
                       <form id="delete-type-form-{{ $type->id }}" class="inline-block" action="{{ route('types.destroy', $type->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion('{{ $type->id }}')">Delete</button>
                        </form>
                    

                       </td>
                    </tr>
                    @endforeach
                </tbody>
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                <button href="#" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#add">Add Type</button>
          </div>
        </div>
        </table>
        </div>   
    </div>
	</div>   
</div>

<!-- Edit Modal -->
@foreach($types as $type)
<div class="modal fade" id="edit_{{$type->id}}" tabindex="-1" aria-labelledby="editTitle_{{$type->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTitle_{{$type->id}}">Edit type ID {{$type->id}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="post" action="#">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">First Name</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{ old('name', $type->name) }}">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea id="description" class="form-control" name="description" rows="6">{{ old('description', $type->description) }}</textarea>
                  </div>    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal -->
@endforeach

<!-- add Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTitle">Add type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" method="post" action="{{ route('types.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{ old('name', '') }}">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea rows="6" id="description" class="form-control" name="description" type="text" value="{{ old('description', '') }}"></textarea>
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- add Modal -->


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
<script src="{{ asset('../js/app.js')}}"></script>

<script>
 function confirmDeletion(typeId) {
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
                    document.getElementById('delete-type-form-' + typeId).submit();
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
    </script>


</body>
</html>   