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
                    <img class="wd-100 rounded-circle" src="{{ Auth::user()->profile_photo_url }}">
                    <span class="h4 ms-3">{{ Auth::user()->name }}</span>
                </div>

                </div>
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
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Role:</label>
                                <p class="text-muted">{{ Auth::user()->role->name }}</p>
                            </div>
            </div>
            </div>
        </div>
        <!-- left wrapper end -->


        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8  middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">

                    <h6 class="card-title">Update Profile</h6>
                    <form id="updateForm" method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{ old('name', $user->name) }}">
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </div>
                   
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