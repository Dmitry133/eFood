@extends('layouts.app')

@section('menu')
    @parent
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

        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
            <div class="col-12">
                {!! Form::model($foodpackage, ['action'=>'FoodpackageController@store','method'=>'post','files'=>true,'class'=>'form']) !!}
            <div class="form-group">
                {!! Form::label('foodpackagenameform','Foodpackage name:') !!}
                {!! Form::text('foodpackagenameform','',['class'=>'form-control']) !!}

                {!! Form::label('foodpackagebarcodeform','Barcode:') !!}
                {!! Form::text('foodpackagebarcodeform','',['class'=>'form-control']) !!}

                {!! Form::label('foodpackagedescriptionform','Description:') !!}
                {!! Form::text('foodpackagedescriptionform','',['class'=>'form-control']) !!}

                <div class="form-inline row mt-3">
                    <label for="foodpackageimagepathform" class="m-3">Add Image</label>
                    <input type="file" name="foodpackageimagepathform" id="foodpackageimagepathform" class="col-10">
                </div>

                {!! Form::label('foodpackagepriceform','Price:') !!}
                {!! Form::text('foodpackagepriceform','',['class'=>'form-control']) !!}

                {!! Form::label('foodpackagekcalform','kCal:') !!}
                {!! Form::text('foodpackagekcalform','',['class'=>'form-control']) !!}

                {!! Form::label('foodpackageproteinform','Protein:') !!}
                {!! Form::text('foodpackageproteinform','',['class'=>'form-control']) !!}

                {!! Form::label('foodpackagefatsform','fats:') !!}
                {!! Form::text('foodpackagefatsform','',['class'=>'form-control']) !!}

                {!! Form::label('foodpackagecarbohydratesform','Carbohydrates:') !!}
                {!! Form::text('foodpackagecarbohydratesform','',['class'=>'form-control']) !!}


            </div>
                {!! Form::submit('Add Foodpackage',['class'=>'btn btn-primary' ]) !!}
                {!! Form::close() !!}
            </div>


@endsection