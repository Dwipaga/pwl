<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\ArtikelModelController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/aboutus', [AboutController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'articles']);
Route::prefix('produk')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/kertas', [ProductController::class, 'kertas']);
    Route::get('/pulpen', [ProductController::class, 'pulpen']);
});
Route::get('/news/{nama_news}', [NewsController::class, 'index']);
Route::prefix('program')->group(function () {
    Route::get('/', [ProgramController::class, 'index']);
    Route::get('/penghijauan', [ProgramController::class, 'penghijauan']);
    Route::get('/konservasi', [ProgramController::class, 'konservasi']);
});
Route::get('/kontak', [ContactController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/pengalaman', [PengalamanController::class, 'index']);
Route::get('/Artikel', [ArtikelModelController::class, 'index']);