<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Like;

class ArticleController extends Controller
{

    function dashboard()
    {
        $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();

        return view('writer.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }
    public function create()
{
    $categories = Category::all();
    return view('article.create', ['categories' => $categories]);
}

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(Request $request)
    {
        $date = $request->input('date');

        $query = Article::where('is_accepted', true);

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        $articles = $query->orderBy('created_at', 'desc')->paginate(6);

        return view('article.index', compact('articles'));
    }
    public function latest()
    {
        $articles = Article::where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('article.latest', compact('articles'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|unique:articles|min:5',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category' => 'required|array',
            'tags' => 'required',
        ]);
    
        $imagePath = $request->file('image')->store('', 'public');
    
        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $imagePath,
            'category_id' => $request->category[0], // Get the first element of the array
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
        ]);
    
        $tags = explode(', ', $request->tags);
    
        foreach ($tags as $tag) {
            if (!empty($tag)) {
                $newTag = Tag::updateOrCreate(['name' => $tag]);
                $article->tags()->attach($newTag->id); // Pass the ID of the tag
            }
        }
    
        return redirect(route('homepage'))->with('message', 'Articolo creato con successo');
    }

    public function show($articleId)
    {
        $article = Article::findOrFail($articleId);
        return view('article.show', compact('article'));
    }

    // public function show($articleId)
    // {
    //     $article = Article::findOrFail($articleId);
    //     return response()->json(['article' => $article]);
    // }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5|unique:articles,subtitle,' . $article->id,
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title),
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('public/images'),
            ]);
        }

        $tags = explode(',', $request->tags);
        $newTags = [];
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            $newTags[] = $newTag->id;
        }
        $article->tags()->sync($newTags);

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente aggiornato l\'articolo');
    }

    public function destroy(Article $article)
    {
        Log::info('Destroy method called for article ID: ' . $article->id);
        $article->tags()->detach();
        Storage::delete($article->image);
        $article->delete();

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente cancellato l\'articolo scelto');
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.by-category', compact('category', 'articles'));
    }

    public function byWriter(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.by-user', compact('user', 'articles'));
    }

    public function articleSearch(Request $request)
    {
        $query = $request->input('query');

        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.search-index', compact('articles', 'query'));
    }

    public function articleCareers()
    {

        return view('article.careers');
    }

    public function like($articleId)
    {
        $article = Article::findOrFail($articleId);
        $userId = Auth::id(); // Assumendo che l'utente sia autenticato

        $like = Like::where('article_id', $article->id)->where('user_id', $userId)->first();

        if ($like) {
            // Se l'utente ha già messo "mi piace" all'articolo, rimuovi il "mi piace"
            $like->delete();
            $liked = false;
        } else {
            // Altrimenti, aggiungi un "mi piace"
            $like = new Like();
            $like->article_id = $article->id;
            $like->user_id = $userId;
            $like->save();
            $liked = true;
        }

        // Ricarica l'articolo dal database per ottenere il conteggio dei "mi piace" aggiornato
        $article = Article::findOrFail($articleId);

        return response()->json(['likes' => $article->likes->count(), 'liked' => $liked]);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}


