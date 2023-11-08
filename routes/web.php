<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/service', [PageController::class, 'services']);

Route::get('/hello', function () {
    // return view('welcome');
    return "Hello world";
});

// Route::get('/about', function () {
//     return view('pages.about');
// });

Route::get('/users/{name}/{id}', function ($name, $id) {
    return 'User : ' . $name . ' With id = ' . $id;
});