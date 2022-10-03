<?php


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| ARTICLES
|--------------------------------------------------------------------------
*/
Route::get('/articles',           [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{slug}',    [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/tag/{tag}', [App\Http\Controllers\ArticleController::class, 'allByTag'])->name('article.tag');


Route::get('/resources/img/{filename}', static function ($filename) {
    $path = '/var/www/resources/img/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
