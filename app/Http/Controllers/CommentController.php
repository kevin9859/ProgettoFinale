<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class CommentController extends Controller
{
    public function index(Article $article)
    {
        $comments = $article->comments()->with('user')->get();

        return response()->json(['comments' => $comments]);
    }

    public function store(Request $request, Article $article)
    {
        $request->validate([
            'body' => 'required',
        ]);
    
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->article_id = $article->id;
        $comment->user_id = auth()->id(); // Assumendo che l'utente sia autenticato
        $comment->save();
    
        // Carica le informazioni dell'utente
        $comment->load('user');
    
        return response()->json(['comment' => $comment], 201);
    }
    public function destroy(Comment $comment)
{
   
    if(Auth::user()->id !== $comment->user_id){
        return back()->with('error', 'Non hai il permesso di eliminare questo commento.');
    }

    $comment->delete();

    return back()->with('success', 'Il commento è stato eliminato con successo.');
}
public function like($commentId)
{
    $comment = Comment::findOrFail($commentId);
    $userId = Auth::id(); 

    $like = Like::where('comment_id', $comment->id)->where('user_id', $userId)->first();

    if ($like) {
        
        $like->delete();
        $liked = false;
    } else {
    
        $like = new Like();
        $like->comment_id = $comment->id;
        $like->user_id = $userId;
        $like->save();
        $liked = true;
    }

    $comment = Comment::findOrFail($commentId);

    return response()->json(['likes' => $comment->likes->count(), 'liked' => $liked]);
}
public function likes()
{
    return $this->hasMany(Like::class);
}
}