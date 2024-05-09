<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Article\ArticleController;
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


// Route::get('/articles', function () {
// return 'Article List';
// });
// Route::get('/articles/detail', function () {
// return 'Article Detail';
// })->name('article.detail');
// Route::get('/articles/detail/{id}', function ( $id ) {
// return "Article Detail - $id";
// });


// Route::get('/articles/more', function() {
// return redirect()->route('article.detail');
// });

Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/detail/{id}', [
ArticleController::class,
'detail'
]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/articles/add', [ArticleController::class, 'add']);

Route::post('/articles/add', [
ArticleController::class,
'create'
]);



Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);

Route::post('/articles/edit/{id}', [
ArticleController::class,
'updateArticle'
]);




Route::get('/articles/delete/{id}', [
ArticleController::class,
'delete'
]);
