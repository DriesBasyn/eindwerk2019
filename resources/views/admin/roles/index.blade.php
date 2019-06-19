@extends('layouts.dashboard')
@if(Session::has('deleted_user'))
    <p class="bg-danger">{{session('deleted_user')}}</p>
@endif
@section('content')
    <h1>Alle Rollen</h1>
    <table id="table_id" class="display">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($roles)
            @foreach($roles as $role)

                <tr>

                    <td>{{$role->id}}</td>
                    <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                    <td>{{$role->created_at}}</td>
                    <td>{{$role->updated_at}}</td>

                </tr>

            @endforeach
        @endif
        </tbody>
    </table>
@endsection
