<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required',
        ]);
        $errors = new MessageBag();
        if ($data['password'] !== $data['c_password']) {
            $errors->add('passwords_does_not_match', 'Passwords does not match!');

        }
        $users = User::query()->where('email', '=', $data['email'])->count();
        if ($users > 0) {
            $errors->add('invalid _mail', 'Email already used!');
        }
        if ($errors->count() > 0) {
            return view('auth.register.index')->withErrors($errors);
        }
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect('/activationEmail?email='.$data['email'].'&name='.$data['name']);
    }
}
