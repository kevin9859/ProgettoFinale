<?php

namespace App\Http\Controllers;

use TeamTNT\TNTSearch\TNTSearch;
use Illuminate\Http\Request;
use App\Models\Article;

class RevisorController extends Controller
{
   function dashboard(){
    $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
    $acceptedArticles = Article::where('is_accepted', true)->get();
    $rejectedArticles = Article::where('is_accepted', false)->get();
    
        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
   }

   public function acceptArticle($articleId){
    $article = Article::findOrFail($articleId);
    $article->update([
        'is_accepted' => true,
    ]);
    return redirect(route('revisor.dashboard'))->with('message', 'hai accettato l\'articolo selezionato');
}

public function rejectArticle($articleId){
    $article = Article::findOrFail($articleId);
    $article->update([
        'is_accepted' => false,
    ]);
    return redirect(route('revisor.dashboard'))->with('message', 'hai rifiutato l\'articolo selezionato');
}

public function undoArticle($articleId){
    $article = Article::findOrFail($articleId);
    $article->update([
        'is_accepted' => NULL,
    ]);
    return redirect(route('revisor.dashboard'))->with('message', 'hai riportato l\'articolo selezionato di nuovo in revisione');
}

}
