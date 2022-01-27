<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo app</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-dark h-100">

<div class="container-fluid p-3 h-100">
    <div class="row h-100">
        <div class="col-lg-6 col-sm-12 p-5 align-self-center">
            @hasSection('title')
                <h1 class="text-light" style="font-size: 64px;">@yield('title')</h1>
            @endif
            @yield('rightContent')

        </div>
        <div class="col-lg-6 col-sm-12 p-5 align-self-center">
            <div class="card p-3">
                <div class="card-body ">
                    @yield('subtitle')
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
