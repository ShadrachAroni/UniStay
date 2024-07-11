
<div class="card mb-4">
 <div class="card rounded">
    <div class="card-body">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">

                <div>
                    <img class="wd-100 rounded-circle" src="{{ (!empty(Auth::user()->profile_photo)) ? url('upload/img/'.Auth::user()->profile_photo) : url('upload/img/no_image.jpg')}}" alt="profile"  style="width: 80px; height: 80px;">
                    <span class="h4 ms-3">{{ Auth::user()->Fname }}</span>
                </div>

                </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase"> User ID:</label>
                                <p class="text-muted">{{ Auth::user()->id }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase"> Full Name:</label>
                                <p class="text-muted">{{ Auth::user()->Fname }} {{ Auth::user()->Lname }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Gender:</label>
                                <p class="text-muted">{{ Auth::user()->gender }}</p>
                            </div>
                            <div class=
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Contact:</label>
                                <p class="text-muted">{{ Auth::user()->phone}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                                <p class="text-muted">{{ Auth::user()->address }}</p>
                            </div>

                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Status:</label>
                                <p class="text-muted">{{ Auth::user()->status }}</p>
                            </div>

                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Account type:</label>
                                <p class="text-muted">{{ Auth::user()->role->name }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Updated at:</label>
                                <p class="text-muted"> {{ Auth::user()->updated_at->format('M d, Y H:i') }}</p>
                            </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->


        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update Profile</h6>

                        <form id="updateProfile" method="post" action="{{ route('details.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="Fname" class="form-label">First Name</label>
                                <input id="Fname" class="form-control" name="Fname" type="text" value="{{ old('Fname', $user->Fname) }}">
                                @error('First name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="Lname" class="form-label">Last Name</label>
                                <input id="Lname" class="form-control" name="Lname" type="text" value="{{ old('Lname', $user->Lname) }}">
                                @error('Last name')
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

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control" name="email" type="email" value="{{ old('email', $user->email) }}">
                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !Auth::user()->hasVerifiedEmail())
                                <p class="text-sm mt-2">
                                    {{ __('Your email address is unverified.') }}
                
                                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>
                
                                @if ($this->verificationLinkSent)
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            @endif
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
                                <label for="profile_photo" class="form-label">Photo</label>
                                <input class="form-control" type="file" name="profile_photo" id="image">
                            </div>

                            <div class="mb-3">
                                <img id="showImage" class="wd-100 rounded-circle" src="{{ (!empty(Auth::user()->profile_photo)) ? url('upload/img/'.Auth::user()->profile_photo) : url('upload/img/no_image.jpg')}}" alt="profile"  style="width: 80px; height: 80px;">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- middle wrapper end -->

        </div>

        </div>
    </div>
</div>

