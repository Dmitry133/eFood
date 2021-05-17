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
        {!! Form::model($foodpackage,['route'=>['foodpackage.update',$foodpackage->id],'method'=>'PUT','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Edit name') !!}
            {!! Form::text('name',$foodpackage->name,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('barcode','Edit barcode') !!}
            {!! Form::text('barcode',$foodpackage->barcode,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Edit description') !!}
            {!! Form::text('description',$foodpackage->description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagepath','Edit image') !!}
            {!! Form::file('imagepath',['class'=>'form-control']) !!}
            <span>{{$foodpackage->imagepath}}</span>
            <img src="{{asset($foodpackage->imagepath)}}" alt="image" class="w-25">
        </div>
        <div class="form-group">
            {!! Form::label('price','Edit price') !!}
            {!! Form::text('price',$foodpackage->price,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('kCal','Edit kCal') !!}
            {!! Form::text('kCal',$foodpackage->kCal,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('protein','Edit protein') !!}
            {!! Form::text('protein',$foodpackage->protein,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fats','Edit fats') !!}
            {!! Form::text('fats',$foodpackage->fats,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('carbohydrates','Edit carbohydrates') !!}
            {!! Form::text('carbohydrates',$foodpackage->carbohydrates,['class'=>'form-control']) !!}
        </div>
    {!! Form::submit('Edit and Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection