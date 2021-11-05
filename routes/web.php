<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;



use App\Http\Controllers\TopicController;
use App\Models\Form;
use App\Models\PrivateForm;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {


    return view('homepage', [
        'posts' => Post::latest()->get(),
        'users' => User::all(),
        'categories' => Category::all()
    ]);
});

Route::post('/', function () {
    Form::create([
        'name' => request('email'),
        'email' => request('email'),
        'question' => request('question')
    ]);
    return redirect('/');
});

Route::get('posts/{post}', function (Post $post) {

    // Find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => $post
    ]);


});


Route::get('categories/{category:slug}', function (Category $category) {

    // Find a post by its slug and pass it to a view called "post"

    return view('homepage', [
        'posts' => $category->posts,
        'users' => User::all(),
        'categories' => Category::all()
    ]);


});

Route::get('authors/{author:username}', function (User $author) {

    // Find a post by its slug and pass it to a view called "post"

    return view('homepage', [
        'posts' => $author->posts,
        'users' => User::all(),
        'categories' => Category::all()
    ]);


});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/layout', function () {
    return view('layout');
});
