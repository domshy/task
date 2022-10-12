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
            body {
                background-color: whitesmoke;
            }

            .reg-container {
                margin-top: 5vh;
                padding: 10px;
            }
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
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active treeview menu-open">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Charts</a></li>
                                <li class="active"><a href="#"><i class="fa fa-circle-o"></i>Students</a>
                                <li class="active"><a href="#"><i class="fa fa-circle-o"></i>Create Announcement</a>
                                <li class="active"><a href="#"><i class="fa fa-circle-o"></i>My Profile</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>
            <section class="content-wrapper">
                <h1>Welcome</h1>
                <div class="row">

                    <div>
                        @include('components.tables')

                    </div>
                </div>
            </section>

        </div>
        @include('components.link2')
    </body>

    </html>
@endsection
