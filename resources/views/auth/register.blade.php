@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @include('components.link')
        <title>{{ config('app.name', 'Task1') }}</title>

        <style>
            .reg-container {
                margin-top: 5vh;
                padding: 10px;
            }
        </style>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <header class="main-header">
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->

                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>TAsSK</b>ONE1</span>
            </a>
            <nav class="navbar navbar-static-top">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>

        <h1 style="margin-left: 5vw;">Register</h1>
        <hr style="width: 90%;" />
        <div class="container">
            <div class="reg-container">
                <div class="row justify-content-center">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autofocus placeholder="Full Name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                        <div class="col-md-6">
                                            <select style="height: 5vh;width: 100%;" class="form-select"
                                                aria-label=".form-select-sm example" id="gender" name="gender">
                                                <option selected disabled>Choose...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dob"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Birth Day') }}</label>

                                        <div class="col-md-6">
                                            <input id="dob" type="date"
                                                class="form-control @error('dob') is-invalid @enderror" name="dob"
                                                value="{{ old('dob') }}" required autofocus>

                                            @error('dob')
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Sign Up') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.link2')
    </body>

    </html>
@endsection
