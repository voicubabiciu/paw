<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function passwordResetEmail(Request $request)
    {
        //encrypt($request->secret)
        $data = array('resetLink' => 'http://localhost/resetPassword?email=' . encrypt($request['email']));
        Mail::send('mail', $data, function ($message) use ($request) {
            $message->to($request['email'], 'Password reset')->subject
            ('Password reset');
            $message->from('todoappproiect@gmail.com', 'No Reply');
        });
        return redirect('/login')->with('success', 'A password reset email has been sent to the specified email address!');
    }

    public function accountConfirmationEmail(Request $request)
    {
        $data = array('activation' => 'http://localhost/activateAccount?email=' . encrypt($request['email']),
            'name' => $request['name']);
        Mail::send('confirmAccountEmail', $data, function ($message) use ($request) {
            $message->to($request['email'], 'Account confirmation')->subject
            ('Account confirmation');
            $message->from('todoappproiect@gmail.com', 'No Reply');
        });
        return redirect('/register')->with('success', 'A confirmation email has been sent!');
    }
}
