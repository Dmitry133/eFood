<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EasyFood</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

{{--    <!-- Styles -->--}}
{{--    //<link href="/css/app.css" rel="stylesheet">--}}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
            <div class="container">
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
                @show

                    <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Login</a></li>
                            <li class="nav-item"><a href="{{ url('/register') }}" class="nav-link">Register</a></li>
                        @else
                            <li >
                                <a href="#" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul >
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                        </div>

            </div>


        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
