<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;



use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Auth;
use App\Models\Form;
use App\Models\PrivateForm;
use Illuminate\Support\Facades\Route;
use Faker\Generator as Faker;

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
        'name' => request('name'),
        'email' => request('email'),
        'question' => request('question')
    ]);
    return redirect('/');
});

Route::post('/create-post', function (Faker $faker) {
    Post::create([
        'user_id' => Auth::id(),
        'category_id' => request('category_id'),
        'title' => request('title'),
        'excerpt' => request('excerpt'),
        'slug' => $faker->uuid(),
        'body' => request('body'),
    ]);
    return redirect('/');
});

Route::post('/create-category', function (Faker $faker) {
    Category::create([
        'name' => request('name'),
        'slug' => $faker->uuid()
    ]);
    return redirect('/');
});

Route::post('/update-user', function () {
    $user_id = request('user_id');
    User::find($user_id)->fill([
        'access' => 1,                
     ])->save();
    return redirect('/');
});

Route::post('/update-admin-user', function () {
    $user_id = request('user_id');
    User::find($user_id)->fill([
        'admin' => 1,                
     ])->save();
    return redirect('/');
});

Route::post('/delete-user', function () {
    $user_id = request('user_id');
    $user = User::find($user_id);
    $user->delete();
    return redirect('/');
});

Route::post('/delete-post', function () {
    $post_id = request('post_id');
    $post = Post::find($post_id);
    $post->delete();
    return redirect('/');
});

Route::post('/delete-topic', function () {
    $category_id = request('category_id');
    $category = Category::find($category_id);
    $category->delete();
    return redirect('/');
});

Route::post('/delete-question', function () {
    $form_id = request('form_id');
    $form = Form::find($form_id);
    $form->delete();
    return redirect('/dashboard');
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
    return view('dashboard', [
        'categories' => Category::all(),
        'users' => User::all(),
        'posts' => Post::all(),
        'forms' => Form::all()
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/layout', function () {
    return view('layout');
});
