<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\ArtikelModelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\MahasiswaController;
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


Auth::routes();
Route::get('logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HobiController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/aboutus', [AboutController::class, 'index']);
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

    Route::get('/hobi', [HobiController::class, 'index']);
    Route::get('/matkul', [MataKuliahController::class, 'index']);
    Route::get('/keluarga', [KeluargaController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::resource('/hobi', HobiController::class);
    Route::resource('/keluarga', KeluargaController::class);
    Route::resource('/matakuliah', MatakuliahController::class);
    Route::get('/mahasiswa/{id}/khs', [MahasiswaController::class, 'showKhs']);
    Route::resource('articles', ArticlesController::class);
    Route::get('/article/cetak_pdf', [ArticlesController::class, 'cetak_pdf']);
    Route::get('/mahasiswa/{id}/cetakpdf', [MahasiswaController::class, 'cetak_pdf']);

});
