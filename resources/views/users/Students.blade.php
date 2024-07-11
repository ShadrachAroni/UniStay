
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
            <h4 class="mb-3 mb-md-0">View Students</h4>
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
                        
                        <th>Photo</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                        <th rowspan="3">Actions</th>
                        <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users->where('status', 'verified')->where('role_id', 2) as $user)

                    <tr>
                   
                        <td class="py-1">
                            <!-- image -->
                            <img class="wd-80 rounded-circle" src="{{ (!empty($user->profile_photo)) ? url('upload/img/'.$user->profile_photo) : url('upload/img/no_image.jpg')}}" alt="profile"  style="width: 65px; height: 65px;">
                            
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->Fname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info"  data-bs-toggle="modal" data-bs-target="#show_{{$user->id}}">View</a>
                            

						
                        </td>
                        <td>
                           
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#edit_{{$user->id}}">Edit</a>
                            
                        </td>
                        <td>
                           
                        
                        <form id="delete-user-form-{{ $user->id }}" class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion('{{ $user->id }}')">Delete</button>
                        </form>
                     

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                <button href="{{ route('users.create') }}" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#create">Add Student</button>
            </div>
          </div>
        </div>
        </table>
        </div>
        
    </div>

	</div>
    
</div>


@foreach($users as $user)
    <!-- Modal for view  -->
    <div class="modal fade" id="show_{{$user->id}}" tabindex="-1" aria-labelledby="showTitle_{{$user->id}}" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showTitle_{{$user->id}}">User ID {{$user->id}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="card-title mb-0">Photo</h6>
                            </div>
                            <img src="{{ (!empty($user->profile_photo)) ? url('upload/img'.$user->profile_photo) : url('upload/img/no_image.jpg') }}" alt="image">
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">First Name:</label>
                                <p class="text-muted">{{ $user->Fname }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Last Name:</label>
                                <p class="text-muted">{{ $user->Lname }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Contact:</label>
                                <p class="text-muted">{{ $user->phone}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                                <p class="text-muted">{{ $user->address }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Email Verified at:</label>
                                <p class="text-muted">{{ $user->email_verified_at }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Role:</label>
                                <p class="text-muted">{{ $user->role->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal for user -->



<!-- Edit Modal -->
<div class="modal fade" id="edit_{{$user->id}}" tabindex="-1" aria-labelledby="editTitle_{{$user->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTitle_{{$user->id}}">Edit User ID {{$user->id}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="Fname" class="form-label">First Name</label>
                        <input id="Fname" class="form-control" name="Fname" type="text" value="{{ old('Fname', $user->Fname) }}">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Lname" class="form-label">Last Name</label>
                        <input id="Lname" class="form-control" name="Lname" type="text" value="{{ old('Lname', $user->Lname) }}">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" name="email" type="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Contact</label>
                        <input id="phone" class="form-control" name="phone" type="text" value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input id="address" class="form-control" name="address" type="text" value="{{ old('address', $user->address) }}">
                        @error('address')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <div>
                            @foreach($roles as $role)      
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="role_id" id="role{{ $role->id }}" value="{{ $role->id }}"
                                        {{ $user->role_id == $role->id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role{{ $role->id }}">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('role_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Edit Modal -->
@endforeach

<!-- Create Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="createTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createForm" method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="Fname" class="form-label">First Name</label>
                        <input id="Fname" class="form-control" name="Fname" type="text" value="{{ old('Fname', '') }}">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Lname" class="form-label">Last Name</label>
                        <input id="Lname" class="form-control" name="Lname" type="text" value="{{ old('Lname', '') }}">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" name="email" type="email" value="{{ old('email', '') }}">
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Contact</label>
                        <input id="phone" class="form-control" name="phone" type="text" value="{{ old('phone', '') }}">
                        @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input id="address" class="form-control" name="address" type="text" value="{{ old('address', '') }}">
                        @error('address')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <div>
                            @foreach($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="role_id" id="role_id" value="{{ $role->id }}">
                                    <label class="form-check-label" for="role_id">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('role')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-control" name="password" type="password" value="{{ old('password', '') }}">
                        @error('password')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Create Modal -->



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