<?php

namespace App\Http\Controllers;
use App\Models\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests = RoleRequest::where('role', 'admin')->get();
        $revisorRequests = RoleRequest::where('role', 'revisor')->get();
        $writerRequests = RoleRequest::where('role', 'writer')->get();

        
    
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user, RoleRequest $request)
{
    $user->update([
        'is_admin' => true
    ]);

    RoleRequest::where('user_id', $user->id)->where('role', 'admin')->delete();

    session()->flash('success', 'Ruolo impostato con successo come amministratore.');

    return redirect()->route('admin.dashboard');
}

public function setRevisor(User $user, RoleRequest $request)
{
    $user->update([
        'is_revisor' => true
    ]);

    RoleRequest::where('user_id', $user->id)->where('role', 'revisor')->delete();

    session()->flash('success', 'Ruolo impostato con successo come revisore.');

    return redirect()->route('admin.dashboard');
}

public function setWriter(User $user, RoleRequest $request)
{
    $user->update([
        'is_writer' => true
    ]);

    RoleRequest::where('user_id', $user->id)->where('role', 'writer')->delete();

    session()->flash('success', 'Ruolo impostato con successo come scrittore.');

    return redirect()->route('admin.dashboard');
}
   
   public function editTag(Request $request, Tag $tag)
   {
    $request->validate([
        'name' => 'required|unique:tags,name,' . $tag->id,
    ]);

    $tag->update([
        'name' => strtolower($request->name),
    ]);

    return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato il tag');
   }

   public function deleteTag(Tag $tag)
   {
    foreach($tag->articles as $article){
        $article->tags()->detach($tag);
    }

    $tag->delete();

    return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente eliminato il tag');
   }

   public function editCategory(Request $request, Category $category)
   {
    $request->validate([
        'name' => 'required|unique:categories,name,' . $category->id,
    ]);

    $category->update([
        'name' => strtolower($request->name),
    ]);

    return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato la categoria');
   }

   public function deleteCategory(Category $category)
   {
    $category->delete();

    return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente eliminato la categoria');
   }

   public function storeCategory(Request $request){
    
    Category::create([
        'name' => strtolower($request->name),
    ]);
    return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente inserito una nuova categoria');

   }
}
