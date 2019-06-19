@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Lijst van brands</h1>

                <a class="btn btn-primary" href="{{route('brands.create')}}">Nieuwe Brand</a>
                <ul class="list-group">
                    @foreach($brands as $brand)
                        <li class="list-group-item">
                            {{$brand->name}} -
                            <a class="btn btn-primary" href="{{route('brands.edit',$brand->id)}}">Edit</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
