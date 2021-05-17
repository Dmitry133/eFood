<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyFood</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
@section('menu')
    <div class="col-12">
        <ul class="nav nav-justified">
            <li class="nav-item">
                <a href="{{url('product')}}" class="nav-link">Product</a>
            </li>
            <li class="nav-item">
                <a href="{{url('product/create')}}" class="nav-link">Product create</a>
            </li>
            <li class="nav-item">
                <a href="{{url('foodpackage/create')}}" class="nav-link">Content control</a>
            </li>

        </ul>
    </div>
@show
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
</body>
</html>