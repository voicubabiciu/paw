<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product viewer</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-dark">

<div class="container-fluid p-3 ">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            @hasSection('home')
                <a class="navbar-brand active" aria-current="page" href="{{route('products.index')}}"><h3><i class="fas fa-home"></i> Home</h3></a>
            @else
                <a class="navbar-brand" aria-current="page" href="{{route('products.index')}}"><h3><i class="fas fa-home"></i> Home</h3></a>

            @endif
            @hasSection('title')
                <h1 class="navbar-brand">@yield('title')</h1>
            @endif
        </div>
    </nav>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 offset-lg-4">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
