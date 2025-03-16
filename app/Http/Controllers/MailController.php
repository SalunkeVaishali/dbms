<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public static function sendMail()
    {
        $data = [
            'name' => 'vaishali',
            'message' => 'Its Testing Mail Mar 14 09.53Pm'
        ];

        Mail::to('vs28051986@yopmail.com')->send(new TestMail($data));
    
        return back()->with('success', 'Email Sent Successfully!');
    }
}
