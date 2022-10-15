@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @include('components.link')

        <style>
            .content-wrapper {
                padding: 30px;
                /* margin:4px, 4px; */
                /* width: 500px; */
                height: 110px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align: justify;
            }

            /* span.alert-danger {
                    margin-top: 10px;
                } */
        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div>

            <header class="main-header">
                <a href="/" class="logo">

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
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }}</p>
                            <p>{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="active treeview menu-open">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/admin/dashboard"><i class="fa fa-circle-o"></i> Home</a></li>
                                <li class="active"><a href="/admin/announcement"><i class="fa fa-circle-o"></i>Create
                                        Announcement</a>
                                <li class="active"><a href="#"><i class="fa fa-circle-o"></i>My Profile</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>
            <section class="content-wrapper">
                <a href="/admin/dashboard" class="btn btn-default">Go Back</a>
                @if (count($errors) > 0)
                    @foreach ($errors as $error)
                        @foreach ($error as $e)
                            <div class="alert alert-danger" role="alert">
                                {{ $e }}
                            </div>
                            {{-- <span class="alert-danger">{{ $e }}</span> --}}
                        @endforeach
                    @endforeach
                @endif

                <h1>Edit Detail</h1>
                {!! Form::open(['action' => ['AdminController@update', $student->id], 'method' => 'POST']) !!}
                @csrf

                <div class="form-group">
                    {{ Form::label('fname', 'First Name') }}
                    {{ Form::text('fname', $student->fname, ['class' => 'form-control', 'id' => 'fname', 'placeholder' => 'First Name', 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('middlename', 'Middle Name') }}
                    {{ Form::text('middlename', $student->middlename, ['class' => 'form-control', 'id' => 'middlename', 'placeholder' => 'Middle Name', 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('lname', 'Last Name') }}
                    {{ Form::text('lname', $student->lname, ['class' => 'form-control', 'id' => 'lname', 'placeholder' => 'Last Name', 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('birth_place', 'Place of Birth') }}
                    {{ Form::text('birth_place', $student->birth_place, ['class' => 'form-control', 'placeholder' => 'Place of Birth']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('', 'Gender') }}
                    <select name="gender" class="form-control">
                        <option hidden selected>{{ $student->gender }}</option>
                        <option value="male">Female</option>
                        <option value="female">Male</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dob">Birthdate</label>
                    <input type="date" class="form-control" name="dob" id="dob" value={{ $student->dob }} />
                    <div class="agehere" style="margin-top: 8px;"></div>
                </div>

                <div class="form-group">
                    {{ Form::label('contact', 'Contact') }}
                    {{ Form::text('contact', $student->contact, ['class' => 'form-control', 'placeholder' => 'Contact']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', $student->email, ['class' => 'form-control', 'placeholder' => 'email']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::textarea('address', $student->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
                </div>

                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}

                @include('components.link2')
            </section>
        </div>
    </body>

    </html>
@endsection
