@extends('layouts.master')
@section('menu')
<div class="col-12">
    <ul class="nav nav-justified">
        <li class="nav">
            <a href="{{url('product/')}}" class="nav-link">Products</a>
        </li>
        <li class="nav">
            <a href="{{url('foodpackage/')}}" class="nav-link">Foodpackages</a>
        </li>
        <li class="nav">
            <a href="{{url('cart/')}}" class="nav-link">Cart</a>
        </li>
        @if($is_admin !== 0)
        <li class="nav-item">
            <a href="{{url('foodpackage/create')}}" class="nav-link">Content control</a>
        </li>
    @endif
</div>
        @endsection
        @section('content')
            <div class="col-12">
                {!! Form::open(['action'=>'ProductController@search','class'=>'form']) !!}
                <div class="input-group">
                    {!! Form::text('searchform','',['class'=>'form-control','placeholder'=>'Input product','autocomplete'=>'off']) !!}
                    <button type="submit" class="btn btn-success btn-sm">Search Product</button>
                </div>
                {!! Form::close() !!}
                <ul class="list-unstyled">

                    @foreach($products as $product)
                        <div class="p-2">
                            <h4 class="text-center"><a href="{{url('product/'.$product->id)}}" class="btn-link my-2">{{$product->name}}</a></h4>
                            <img src="{{asset($product->imagepath)}}" alt="">
                            <p class="m-2">{{$product->price}} RUB</p>
                            <p class="m-2">{{$product->description}}</p>
                            <p class="m-2">{{$product->kCal}} kCal</p>
                            <p class="m-2">{{$product->protein}} Proteins</p>
                            <p class="m-2">{{$product->fats}} Fats</p>
                            <p class="m-2">{{$product->carbohydrates}} Carbohydrates</p>

                            @if($is_admin !== 0)
                            <div class="d-flex">
                            {!! Form::open(['route'=>['product.destroy',$product->id]]) !!}
                            {!! Form::hidden('_method','DELETE') !!}
                            <button type="submit" class="btn btn-danger">DELETE</button>
                            {!! Form::close() !!}
                            <a href="{{url('product/'.$product->id.'/edit')}}" class="btn btn-success mt-2">Edit</a>
                            <a href="{{url('cart/addItem/'.$product->id)}}" class="btn btn-success mt-2">Add to cart</a>
                            </div>
                            @endif
                        </div>
                    @endforeach
                </ul>
            </div>
@endsection