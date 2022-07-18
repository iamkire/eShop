<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send()
    {
        $user = Auth::user();
        if ($user->email == request('email')) {
            Mail::to(Auth::user())->send(new WelcomeEmail());
            return new WelcomeEmail();
        } else {
            return redirect()->back()->with('message', 'Your email does not match our records.');
        }
    }
}
