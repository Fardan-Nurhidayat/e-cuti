<?php

use App\Http\Controllers\admin\PengajuanController;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\PegawaiController;
use App\Http\Controllers\pegawai\CutiController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PegawaiMiddleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function () {
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::get('/datapegawai', [PegawaiController::class, 'index'])->name('pegawai');
        Route::get('/tambahpegawai', [PengajuanController::class, 'addPegawai'])->name('tambah-pegawai');

        Route::post('/tambahpegawai', [PegawaiController::class, 'storePegawai'])->name('post-pegawai');
        Route::post('/update-status', [PengajuanController::class , 'updateStatus'])->name('update.status');

        Route::post('/update-pegawai/{id}', [PegawaiController::class , 'updatePegawai'])->name('update-pegawai');

        Route::get('/delete/{id}', [PegawaiController::class, 'deletePegawai'])->name('hapus-pegawai');

    });
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::prefix('pegawai')->name('pegawai.')->middleware(PegawaiMiddleware::class)->group(function () {
        Route::get('/', [CutiController::class, 'index'])->name('dashboard');
        Route::post('/kirim-cuti', [CutiController::class, 'kirimCuti'])->name('kirim.cuti');
        Route::get('/pengajuan-cuti', [CutiController::class, 'pengajuanCuti'])->name('pengajuan.cuti');
    });
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
