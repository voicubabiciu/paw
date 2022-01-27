@extends('auth.layout')

@section('title')
    To do or not To do
@endsection

@section('subtitle')
    <h3> Reset Password </h3>
@endsection

@section('content')

    <form method="POST" action="{{route('resetPassword.update', $email)}}">
        @csrf
        @method('PUT')
        <h5>{{$email}}</h5>

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

        <input type="submit" class="btn btn-success w-100" value="Reset password">

    </form>
@endsection

