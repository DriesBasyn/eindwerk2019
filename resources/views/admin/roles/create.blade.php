@extends('layouts.dashboard')
@section('content')
    <h1>Create Role</h1>
    {!! Form::open(['method'=>'POST', 'action'=> 'RolesController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Role', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    @include('includes.form_error')
@endsection
