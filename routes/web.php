<?php

use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GejalaPenyakitController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ListPertanyaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Models\BasisPengetahuan;
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

Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('/konsultasi',[KonsultasiController::class,'index'])->name('konsultasi');
Route::post('/konsultasi-post',[KonsultasiController::class,'post'])->name('konsultasi-post');
Route::get('list-pertanyaan',[ListPertanyaanController::class,'index'])->name('list-pertanyaan');
Route::post('list-pertanyaan/post',[ListPertanyaanController::class,'save'])->name('list-pertanyaan.post');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    //basis pengetahuan
    Route::resource('basis-pengetahuan', BasisPengetahuanController::class);
    // gejala penyakit
    Route::resource('gejala-penyakit', GejalaPenyakitController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
