<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');


Route::middleware(['admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/setAdmin/{user}/{roleRequest}', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::get('/setRevisor/{user}/{roleRequest}', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::get('/setWriter/{user}/{roleRequest}', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::put('/admin/edit/{tag}/tag', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/{tag}/tag', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/{category}/category', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/{category}/category', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});
Route::middleware(['revisor', 'verified'])->group(function () {
    
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::get('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::get('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::get('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});
// Route::middleware(['writer', 'verified'])->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/writer/dashboard', [ArticleController::class, 'dashboard'])->name('writer.dashboard');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{article}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    
    
// });
Route::middleware('verified')->group(function () {
Route::get('/article.index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');
Route::get('/article/careers', [ArticleController::class, 'articleCareers'])->name('article.careers');
Route::get('article/byUser/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/articles/latest', [ArticleController::class, 'latest'])->name('articles.latest');
Route::post('/articles/{article}/like', [ArticleController::class , 'like'])->name('articles.like');
Route::get('/articles/{article}/comments', [CommentController::class ,'index'])->name('comments.index');
Route::post('/articles/{article}/comments', [CommentController::class ,'store'])->name('comments.store');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::post('/comments/{comment}/like', [CommentController::class, 'like'])->name('comment.like');


});

