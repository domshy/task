@extends('layouts.app')

@section('content')
    <a href="/admin/dashboard" class="btn btn-default">Go Back</a>
    <hr />
    <h1>ADD USER</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['action' => 'AdminController@store', 'method' => 'POST']) !!}
    @csrf
    <div class="form-group">
        {{ Form::label('fullname', 'Fullname') }}
        {{ Form::text('fullname', '', ['class' => 'form-control', 'id' => 'fullname', 'placeholder' => 'Fullname', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('birth_place', 'Place of Birth') }}
        {{ Form::text('birth_place', '', ['class' => 'form-control', 'placeholder' => 'Place of Birth', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('gender', 'Gender') }}
        {{ Form::select('gender', ['Female' => 'Female', 'Male' => 'Male']) }}
    </div>
    <div class="form-group">
        {{ Form::label('dob', 'Birthday') }}
        {{ Form::date('dob', \Carbon\Carbon::now()), 'required' }}
    </div>
    <div class="form-group">
        {{ Form::label('contact', 'Contact') }}
        {{ Form::text('contact', '', ['class' => 'form-control', 'placeholder' => 'Contact', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::textarea('address', '', ['class' => 'form-control', 'placeholder' => 'Address', 'required']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
