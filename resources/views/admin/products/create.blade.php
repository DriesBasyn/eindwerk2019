@extends('layouts.dashboard')
@section('content')
    <h1>Edit product</h1>
    <div class="row">

        <div class="col-md-12">
            {!! Form::open(['method'=>'POST', 'action'=>['ProductsController@store'],
            'files'=>true])
             !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('Price', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [''=>'Choose options'] + $categories,null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('brand_id', 'Brand:') !!}
                {!! Form::select('brand_id', [''=>'Choose options'] + $brands,null, ['class'=>'form-control']) !!}
            </div>
            {{--photo--}}

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::submit('Create Product', ['class'=>'btn btn-danger col-md-12']) !!}
            </div>
            {!! Form::close() !!}

            <div class="col-md-12">
                {!! Form::open(['method'=>'POST', 'action'=>['ProductsController@store'],
                'files'=>true])
                 !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price:') !!}
                    {!! Form::text('Price', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', [''=>'Choose options'] + $categories,null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('brand_id', 'Brand:') !!}
                    {!! Form::select('brand_id', [''=>'Choose options'] + $brands,null, ['class'=>'form-control']) !!}
                </div>
                {{--photo--}}

                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id',null,['class'=>'form-control'])!!}
                </div>


                <div class="form-group">
                    {!! Form::submit('Create Product', ['class'=>'btn btn-danger col-md-12']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>

@stop