<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function handleForm(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'message_body' => 'required|min:5'
            ],
            [
                'name.required' => 'Podaj chociaż swoję imię',
                'name.max' => 'Podaj skrótową wersję Twojego imienia (do 50 znaków) ;) ',
                'email.required' => 'Musisz podać swój email (chcę Ci móc odpisać)',
                'email.email' => 'Podany email nie jest prawidłowy',
                'message_body.required' => 'Wiadomość jest wymagana',
                'message_body.min' => 'Napisz coś więcej w swojej wiadomości ;)'
            ]
        );

        $data = ['name' => $request->get('name'), 'email' => $request->get('email'), 'messageBody' => $request->get('message_body')];

        Mail::send('emails.email', $data, function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->to('almalicka@gmail.com', 'Admin')
                ->subject('Wiadomość z mamwlodowce');
        });

        return redirect()
            ->back()
            ->with('message', 'Dziękuję za Twoją wiadomość.');
    }
}
