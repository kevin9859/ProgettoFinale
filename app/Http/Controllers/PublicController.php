<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerRequestMail;
use App\Models\User;


class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function __construct()
    {
        $this->middleware('auth')->except('homepage');
    }

    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
{
    $request->validate([
        'role' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    $role = $request->role;
    $email = $request->email;
    $message = $request->message;

    
    Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));

    
    if (Auth::check()) {
        $user = Auth::user();

        // Aggiorna il ruolo dell'utente solo dopo l'invio dell'email
        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;

            case 'revisor':
                $user->is_revisor = NULL;
                break;

            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        // Aggiorna il modello dell'utente solo se l'email è stata inviata con successo
        if (count(Mail::failures()) === 0) {
            //$user->save();
        }
    }

    return redirect(route('homepage'))->with('message', 'Grazie per averci contattato');
}

}
