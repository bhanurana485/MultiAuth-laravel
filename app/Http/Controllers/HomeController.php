<?php

namespace App\Http\Controllers;

use App\Events\SendMailEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function event()
    {
        event(new SendMailEvent("Hello"));
    }
    public function sendMail(Request $request)
    {
        $data = ['name' => "bhanu", 'data' => "test"];
        $user = ['to' => 'bp89880@gmail.com'];
        Mail::send('mail', $data, function ($message) use ($user) {
            $message->to("bp89880@gmail.com");
            $message->subject('Test mail');
        });
    }
}
