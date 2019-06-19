@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create category</h1>

                <form method="POST" action="{{Route('categories.store')}}">

                    <div class="form-group">
                        <label for="name">category</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Naam van de category"/>
                            {{csrf_field()}}
                        </div>
                    </div>




                    <button class="btn btn-primary" type="submit">SUBMIT</button>

                </form>


            </div>
        </div>
    </div>
@endsection
