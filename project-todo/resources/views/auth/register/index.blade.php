@extends('auth.layout')

@section('title')
    To do or not To do
@endsection

@section('subtitle')
    <div class="d-flex justify-content-between">
        <div>
            <h3> First todo: </h3>
            <p> Create an account</p>

        </div>
        <a class="btn btn-outline-success" style="height: 36px" href="{{route('login.index')}}">Already did it</a>
    </div>

@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> We couldn't create an account for you.<br><br>
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
    <form method="POST" action="{{route('register.store')}}">
        @csrf
        <label class="form-label ">Name</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-user"></i></span>
            <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name"
                   aria-describedby="name-icon">
        </div>

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

        <label class="form-label">Password confirmation</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-lock"></i></span>
            <input type="password" name="c_password" class="form-control" placeholder="Password Confirmation"
                   aria-label="Password Confirmation"
                   aria-describedby="name-icon" required/>
        </div>

        <input type="submit" class="btn btn-success w-100" value="Register">
    </form>
@endsection
@section('rightContent')
    <img class="img-fluid" src="{{asset('assets/images/undraw_product_teardown_re_m1pc.svg')}}"/>
@endsection
