<?php

namespace App\Http\Controllers;

use App\Mail\MyCustomEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        $emailData = [
            'title' => $title,
            'content' => $content
        ];


        $to = 'hassimiougueye05@gmail.com';
        Mail::to($to)->send(new MyCustomEmail($emailData));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
