<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class WriterController extends Controller
{
    public function dashboard()
    {
     $acceptedArticles = Article::where('user_id',Auth::user()->id)->where('is_accepted', true)->orderBy('created_at', 'desc');
     $rejectedArticles = Article::where('user_id',Auth::user()->id)->where('is_accepted', false)->orderBy('created_at', 'desc');
     $unrevisionedArticles = Article::where('user_id',Auth::user()->id)->where('is_accepted', NULL)->orderBy('created_at', 'desc');

     return view('writer.dashboard', compact('acceptedArticles', 'rejectedArticles', "unrevisionedArticles"));
 
}

public function destroy(Article $article)
{
    $article->tags()->detach();
    Storage::delete($article->image);
    $article->delete();

    return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente cancellato l\'articolo scelto');
}

public function edit(Article $article)
{
    return view('article.edit', compact('article'));
}
   
}