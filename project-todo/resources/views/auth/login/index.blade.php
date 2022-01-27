@extends('auth.layout')

@section('title')
    To do or Not To do
@endsection

@section('subtitle')
    <h3> Login to continue </h3>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}

        </div>

    @endif
    <form method="POST" action="{{route('login.store')}}">
        @csrf
        <label class="form-label ">Email</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                   aria-describedby="name-icon">
        </div>

        <label class="form-label">Password</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password"
                   aria-describedby="name-icon" required/>
        </div>
        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            I forgot my password!
        </a>
        <div class="row pt-3">
            <div class="col">
                <input type="submit" class="btn btn-success w-100" value="Login">

            </div>
            <div class="col">
                <a  class="btn btn-outline-success w-100" href="{{route('register.index')}}">Register</a>
            </div>
        </div>
    </form>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Request password reset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{config('app.url')}}/sendEmail" method="GET">
                        @csrf
                        <label class="form-label ">Email</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name-icon"><i class="fas fa-user"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                                   aria-describedby="name-icon">
                        </div>
                        <input type="submit" class="btn btn-success w-100" value="Reset password">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('rightContent')
    <img class="img-fluid" src="{{asset('assets/images/undraw_my_personal_files_re_3q0p.svg')}}"/>
@endsection

