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
                {!! Form::open(['action'=>'FoodpackageController@search','class'=>'form']) !!}
                <div class="input-group">
                    {!! Form::text('searchform','',['class'=>'form-control','placeholder'=>'Input foodpackage','autocomplete'=>'off']) !!}
                    <button type="submit" class="btn btn-success btn-sm">Search Product</button>
                </div>
                {!! Form::close() !!}
                <ul class="list-unstyled">

                    @foreach($foodpackages as $foodpackage)
                        <h4 class="text-center"><a href="{{url('foodpackage/'.$foodpackage->id)}}" class="btn-link my-2">{{$foodpackage->name}}</a></h4>
                        <img src="{{asset($foodpackage->imagepath)}}" alt="">
                        <p class="m-2">{{$foodpackage->price}} RUB</p>
                        <p class="m-2">{{$foodpackage->description}}</p>
                        <p class="m-2">{{$foodpackage->kCal}} kCal</p>
                        <p class="m-2">{{$foodpackage->protein}} Proteins</p>
                        <p class="m-2">{{$foodpackage->fats}} Fats</p>
                        <p class="m-2">{{$foodpackage->carbohydrates}} Carbohydrates</p>
                        @if($is_admin !== 0)
                        <div class="d-flex">
                        {!! Form::open(['route'=>['foodpackage.destroy',$foodpackage->id]]) !!}
                        {!! Form::hidden('_method','DELETE') !!}
                        <button type="submit" class="btn btn-danger">DELETE</button>
                        {!! Form::close() !!}
                        <a href="{{url('foodpackage/'.$foodpackage->id.'/edit')}}" class="btn btn-success mt-2">Edit</a>
                        </div>
                        @endif
                    @endforeach
                </ul>
            </div>
@endsection