@extends('layouts.master')
@section('menu')
    <div class="col-12">
        <ul class="nav nav-justified ">
            <li class="nav-item">
                <a href="{{url('product/')}}" class="nav-link">Products</a>
            </li>
            <li class="nav-item">
                <a href="{{url('foodpackage/')}}" class="nav-link">Foodpackages</a>
            </li>
            <li class="nav-item">
                <a href="{{url('foodpackage/create')}}" class="nav-link">Content control</a>
            </li>
    </div>
@endsection
@section('content')
    <div class="col-12">
        @if(session('errors'))
            @foreach(session('errors')->all() as $error)
                <div class="alert alert-danger">
                    {{$error }}<br>
                </div>
            @endforeach
        @endif
    {!! Form::model($product,['route'=>['product.update',$product->id],'method'=>'PUT','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Edit name') !!}
            {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('barcode','Edit barcode') !!}
            {!! Form::text('barcode',$product->barcode,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Edit description') !!}
            {!! Form::text('description',$product->description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagepath','Edit image') !!}
            {!! Form::file('imagepath',['class'=>'form-control']) !!}
            <span>{{$product->imagepath}}</span>
            <img src="{{asset($product->imagepath)}}" alt="image" class="w-25">
        </div>
        <div class="form-group">
            {!! Form::label('price','Edit price') !!}
            {!! Form::text('price',$product->price,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('kCal','Edit kCal') !!}
            {!! Form::text('kCal',$product->kCal,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('protein','Edit protein') !!}
            {!! Form::text('protein',$product->protein,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fats','Edit fats') !!}
            {!! Form::text('fats',$product->fats,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('carbohydrates','Edit carbohydrates') !!}
            {!! Form::text('carbohydrates',$product->carbohydrates,['class'=>'form-control']) !!}
        </div>
    {!! Form::submit('Edit and Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection