<?php

namespace App\Http\Controllers;

use App\Mail\AttachmentMail;
use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    // Send email
    public function sendEmail()
    {
        $user = auth()->user();
        Mail::to($user['email'])->send(new TestEmail());
        return new TestEmail();
    }
}
