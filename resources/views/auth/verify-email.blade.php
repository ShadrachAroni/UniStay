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
                                        <a href="{{ route('profile.show') }}" class="btn btn-link text-sm text-gray-600">
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
