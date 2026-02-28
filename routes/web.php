<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;

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

// Route::get('/hello', function () {
//     return 'Hello World';
// });
Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/world', function () {
    return 'World';
});

// Route::get('/', function () {
//     return 'Selamat Datang';
// });

Route::get('/', [PageController::class, 'index']);

// Route::get('/about', function () {
//     return 'NIM : 244107020133 <br> Nama : Marsyalia Fernanda';
// });

Route::get('/about', [WelcomeController::class, 'about']);

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . ' Komentar ke-' . $commentId;
});

// Route::get('/articles/{id}', function ($articlesId) {
//     return 'Halaman Artikel dengan ID ' . $articlesId;
// });

Route::get('/articles/{id}', [WelcomeController::class, 'articles']);

Route::get('/user/{name?}', function ($name=null) {
    return 'Nama saya ' . $name;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya ' . $name;
});
