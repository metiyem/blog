<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// me
Route::get('/home', function () {
    return view('home', [
        "owner" => "jack",
        "title" => "Home Page"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "owner" => "jack",
        "title" => "About Page"
    ]);
});

Route::get('/posts', function () {
    return view('posts', ["title" => "Blog Page", "posts" => Post::filter(request(['search','category','author']))->latest()->paginate(12)->withQueryString()]);
});

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', ["title" => "Single Post", "post" => $post]);
});

Route::get('author/{user:username}', function (User $user) {
    // $posts = $user->posts->load(['author','category']);
    // $posts = $user->posts->latest->get();
    return view('posts', ["title" => count($user->posts) . " Articles By " . $user->name, "posts" => $user->posts()->latest()->get()]);
});

Route::get('category/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load(['author','category']);
    return view('posts', ["title" => count($category->posts) . " Articles In : " . $category->name, "posts" => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact Page"
    ]);
});



require __DIR__ . '/auth.php';
