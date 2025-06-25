<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\MessageController;

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


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::group(['prefix'=>'/ideas', 'as'=>'ideas.', 'middleware'=>['auth']],  function () {
    
//     // Route::post('', [IdeaController::class, 'store'])->name('store');

//     // Route::get('/{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware(['auth']);

//     // Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

//     // Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

//     // Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

//     // Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');

// });

// Route::get('/profile', [ProfileController::class, 'index'])->name('ideas.index');


Route::get('/terms', function(){
    return view('terms');
})->name('terms');

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::resource('users', UserController::class)->only(['show']);

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');

Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

// Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware(['auth'])->name('admin.dashboard');

Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    // Route::get('users', [AdminUserController::class, 'index'])->name('users');
    Route::resource('users', AdminUserController::class)->only(['index']);
    Route::resource('ideas', AdminIdeaController::class)->only(['index']);
    Route::resource('comments', AdminCommentController::class)->only(['index', 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    Route::get ('/users/{user}/messages', [MessageController::class, 'show'])->name('messages.show'); 
    Route::post('/users/{user}/messages', [MessageController::class, 'store'])->name('messages.store'); 
    Route::get('/messages', [MessageController::class, 'inbox'])->name('messages.inbox'); 
});
