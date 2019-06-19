@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit van {{$brand->name}}</h1>
                <form method="POST" action="{{Route('brands.update',$brand->id)}}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">Brand</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>

                            <input type="text" class="form-control" name="name" id="name" value="{{$brand->name}}"  placeholder="Naam van de brand"/>
                            {{csrf_field()}}
                        </div>
                    </div>




                    <button class="btn btn-primary" type="submit">SUBMIT</button>

                </form>

            </div>
        </div>
    </div>
@endsection