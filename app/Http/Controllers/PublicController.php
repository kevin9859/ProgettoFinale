<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerRequestMail;
use App\Models\User;


class PublicController extends Controller
{
  public function homepage()
{
    $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();

   
    if (Auth::check() && !session('confetti')) {
        session(['confetti' => true]);
    }

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
    
        if (Auth::check()) {
            $user = Auth::user();
    
          
            $roleRequest = new RoleRequest;
            $roleRequest->user_id = $user->id;
            $roleRequest->role = $role;
            $roleRequest->status = 'pending';
            $roleRequest->save();
    
        
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
    
            $user->save();
        }
    
        try {
            Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));
            $mailSent = true;
        } catch (\Exception $e) {
            $mailSent = false;
        }
    
        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato');
    }
}
