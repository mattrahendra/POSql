{{-- @extends('layouts.auth') --}}

{{-- @section('css')
    <style>
        .invalid-feedback {
            display: block
        }
    </style>
@endsection --}}

{{--
@section('content')
    <p class="login-box-msg">Sign in</p>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">

            <div class="input-group">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">

            <div class="input-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                    name="password" required autocomplete="current-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    {{-- <p class="mb-1">
    <a href="{{ route('password.request') }}">Lupa Password</a>
</p> --}}
{{-- <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Sign Up</a>
    </p>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('images/logo.svg') }}" rel='icon'>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/iofrm-theme10.css') }}">
</head>

<body>
    <div class="form-body" class="container-fluid">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside mt-4">
                            <a href="/">
                                <div class="logo">
                                    <img class="logo-size" src="{{ asset('images/logo.svg') }}" alt="logo">
                                </div>
                            </a>
                        </div>
                        <h3>Sebelum Lanjut...</h3>
                        <p>Login terlebih dahulu untuk menggunakan POSQL!!</p>
                        <div class="page-links">
                            <a href="{{ route('login') }}" class="active">Login</a><a
                                href="{{ route('register') }}">Register</a>
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <input class="form-control @error('email is-invalid') @enderror" type="email"
                                name="email" placeholder="Alamat E-mail" value="{{ old('email') }}"
                                autocomplete="email" autofocus required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col">
                                <div class="icheck-primary m-0">
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                            </div>
                        </form>
                        {{-- <div class="other-links">
                            <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a
                                href="#">Linkedin</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/main.js') }}"></script>
</body>

</html>
