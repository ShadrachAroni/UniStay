@include('header')

<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="auth-form-wrapper px-5 py-6">
                            <div class="card p-4 shadow">
                                <div class="mb-4 text-sm text-gray-600">
                                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                </div>

                                @if (session('status') == 'verification-link-sent')
                                    <div class="mb-4 font-medium text-sm text-success">
                                        {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                                    </div>
                                @endif

                                <div class="mt-4 d-flex justify-content-between align-items-center">
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf

                                        <div>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Resend Verification Email') }}
                                            </button>
                                        </div>
                                    </form>

                                    <div>
                                        
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-link text-sm text-gray-600" data-bs-toggle="modal" data-bs-target="#edit_{{$user->id}}">
                                            {{ __('Edit Profile') }}
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                            @csrf

                                            <button type="submit" class="btn btn-link text-sm text-gray-600 ms-2">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" class="form-control" name="gender">
                            
                            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
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