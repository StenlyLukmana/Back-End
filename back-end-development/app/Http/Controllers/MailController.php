<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail() {
        Mail::to('stenlyluk@gmail.com')->send(new testMail());
        return "email has been sent";
    }
}
