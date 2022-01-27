<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        $errors = new MessageBag();

        if (!auth()->attempt($data)) {
            $errors->add('invalid_credentials', 'Invalid email or password!');
            return view('auth.login.index')->withErrors($errors);
        }
        $user = auth()->user();
        if($user->email_verified_at == null){
            $errors->add('verification_needed', 'Please verify your account!');
            return view('auth.login.index')->withErrors($errors);
        }
        $token = $user->createToken('API Token')->accessToken;
        session()->put('userSession', $token);
        session()->put('userId', $user->id);

        return redirect('/home');

    }

}
