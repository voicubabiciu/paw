<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo app</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-dark">

<div class="container-fluid p-3 ">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            @hasSection('title')
                <h1 class="navbar-brand">@yield('title')</h1>
            @endif
            <form action="http://localhost/logout" method="POST">
                @csrf
                <button class="btn btn-outline-danger" type="submit"><i class="fas fa-sign-out-alt"></i></button>
            </form>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-6 col-sm-12 p-5">

            @yield('right_content')

        </div>
        <div class="col-lg-6 col-sm-12 p-5">
            <div class="card p-3">
                <div class="card-body ">
                    @yield('subtitle')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @yield('modalBody')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
