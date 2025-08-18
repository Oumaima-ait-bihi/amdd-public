@extends('admin.layouts.login.app')
@section('title')
    <title>Register | AMDD Admin Template</title>
@endsection
@section('content')
<div class="nk-block nk-block-middle nk-auth-body wide-xs">
    <div class="brand-logo pb-4 text-center">
        <a href="html/index.html" class="logo-link">
            <img class="logo-light logo-img logo-img-lg" src="assets/images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
            <img class="logo-dark logo-img logo-img-lg" src="assets/images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
        </a>
    </div>
    <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Register</h4>
                    <div class="nk-block-des">
                        <p>Create New Admin AMDD Account</p>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <div class="form-control-wrap">
                        <input type="name" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your name" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Email </label>
                    <div class="form-control-wrap">
                        <input type="email" class="form-control form-control-lg" id="email" value="{{ old('email') }}" required autocomplete="email" name="email" placeholder="Enter your email address">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" required autocomplete="new-password" placeholder="Enter your paasword">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password-confirm">password</label>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password-confirm">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="confirm your password">
                    </div>
                </div>
                <div class="form-group">
                    <button submit="type" class="btn btn-lg btn-primary btn-block">Register</button>
                </div>
            </form>
            <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{ route('admin.login') }}"><strong>Sign in instead</strong></a>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
