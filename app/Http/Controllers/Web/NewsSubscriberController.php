<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewSubscriber;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Web\NewSubscriberMail;

class NewsSubscriberController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'unique:new_subscribers,email']
        ]);
        $newSubscriber = NewSubscriber::create([
            'email' => $validated['email']
        ]);

        if (!$newSubscriber)
        {
            Session::flash('error','An error occurred while processing your request.');
            return redirect()->back();
        }

        Mail::to($request->email)->send(new NewSubscriberMail());

        Session::flash('success','subscribe successfully!');
        return redirect()->back();
    }
}
