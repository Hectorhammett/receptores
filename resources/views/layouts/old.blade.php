<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/bootstrap/3.3.6/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/jqgrid/css/ui.jqgrid-bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/select2/4.0.2/css/select2.min.css') }}"/>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::check())
                    @if ((Auth::User()))
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/skudata') }}">SKU Data</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/inventory') }}">Inventory</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/history') }}">History</a></li>
                        </ul>
                    @endif
                @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ asset('assets/jquery/2.2.1/jquery.min.js') }}"></script>
    <script type="text/ecmascript" src="{{ asset('assets/jqgrid/js/i18n/grid.locale-en.js') }}"></script>
    <script type="text/ecmascript" src="{{ asset('assets/jqgrid/js/jquery.jqGrid.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/select2/4.0.2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select').select2();
        });
    </script>
    @yield('scripts')
</body>
</html>
