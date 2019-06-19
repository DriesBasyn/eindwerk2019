@extends('layouts.dashboard')
@section('content')
    <h1>Edit product</h1>
    <div class="row">

        <div class="col-md-12">
            {!! Form::model($product,['method'=>'PATCH', 'action'=>['ProductsController@update', $product->id],
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

            {{--submit--}}
            <div class="form-group">
                {!! Form::submit('Update Product', ['class'=>'btn btn-primary col-md-6']) !!}
            </div>

            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE', 'action'=>['ProductsController@destroy', $product->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Product', ['class'=>'btn btn-danger col-md-6']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@stop