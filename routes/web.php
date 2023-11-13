<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;



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
})->name('index');

Route::get('/contact', function () {
    return view('includes.contact');
})->name('contact');

Route::get('/about', function () {
    return view('includes.aboutMe');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/article', [ArticleController::class, 'index'])->name('articles');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');


    Route::get('/tags', [TagsController::class, 'index'])->name('tags');
    Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
    Route::get('/tags/{tag}/edit', [TagsController::class, 'edit'])->name('tags.edit');
    Route::put('/tags/{tag}', [TagsController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagsController::class, 'destory'])->name('tags.destroy');


});

require __DIR__ . '/auth.php';
