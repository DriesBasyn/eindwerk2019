@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Lijst van categories</h1>

                <a class="btn btn-primary" href="{{Route('categories.create')}}">Nieuwe category</a>

                <ul class="list-group">
                    @foreach($category as $cat)
                        <li class="list-group-item">
                            {{$cat->name}} -
                            <a class="btn btn-primary" href="{{Route('categories.edit',$cat->id)}}">Edit</a>

                           {{-- <ul class="list-group">



                              --}}{{--  @foreach($cat->subcategories as $subCategory)
                                    <li>{{$subCategory->name}}</li>
                                @endforeach
--}}{{--


                            </ul>--}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
