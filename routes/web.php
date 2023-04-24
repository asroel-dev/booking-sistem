<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [IndexController::class,'index']);
Auth::routes();
Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::prefix('kegiatan')->group(function () {
            Route::prefix('provinsi')->group(function () {
                Route::get('', [App\Http\Controllers\KegiatanController::class, 'index'])->name('kegiatan.provinsi.index');
                Route::get('getpegawai', [App\Http\Controllers\KegiatanController::class, 'get_pegawai'])->name('kegiatan.provinsi.pegawai.get');
                Route::post('storePegawai', [App\Http\Controllers\KegiatanController::class, 'store_pegawai'])->name('kegiatan.provinsi.pegawai.store');
                Route::post('destroyPegawai', [App\Http\Controllers\KegiatanController::class, 'destroy_pegawai'])->name('kegiatan.provinsi.pegawai.destroy');
                Route::get('getdetailpegawai', [App\Http\Controllers\KegiatanController::class, 'get_pegawai_detail'])->name('kegiatan.provinsi.pegawai.get_detail');
                Route::post('penilaianUpdate', [App\Http\Controllers\KegiatanController::class, 'penilaian_update'])->name('kegiatan.provinsi.penilaian.update');
                Route::post('store', [App\Http\Controllers\KegiatanController::class, 'store'])->name('kegiatan.provinsi.store');
                Route::post('update', [App\Http\Controllers\KegiatanController::class, 'update'])->name('kegiatan.provinsi.update');
                Route::post('destroy', [App\Http\Controllers\KegiatanController::class, 'destroy'])->name('kegiatan.provinsi.destroy');
                Route::get('detail/{id_kegiatan}', [App\Http\Controllers\KegiatanController::class, 'detail'])->name('kegiatan.provinsi.detail');

                Route::post('edit_file', [App\Http\Controllers\KegiatanController::class, 'edit_file'])->name('kegiatan.provinsi.file.edit');
                Route::post('store_file', [App\Http\Controllers\KegiatanController::class, 'store_file'])->name('kegiatan.provinsi.file.store');
                Route::post('destroy_file', [App\Http\Controllers\KegiatanController::class, 'destroy_file'])->name('kegiatan.provinsi.file.destroy');
            });
            Route::prefix('kabkot')->group(function () {
                Route::get('', [App\Http\Controllers\KegiatanKabController::class, 'index'])->name('kegiatan.kabkot.index');
                Route::get('getKabKota', [App\Http\Controllers\KegiatanKabController::class, 'get_kabupaten_kota'])->name('kegiatan.provinsi.kabkota.get');
                Route::post('storePegawai', [App\Http\Controllers\KegiatanKabController::class, 'store_pegawai'])->name('kegiatan.kabkot.pegawai.store');
                Route::post('destroyPegawai', [App\Http\Controllers\KegiatanKabController::class, 'destroy_pegawai'])->name('kegiatan.kabkot.pegawai.destroy');

                Route::post('store', [App\Http\Controllers\KegiatanKabController::class, 'store'])->name('kegiatan.kabkot.store');
                Route::get('getdetailpegawai', [App\Http\Controllers\KegiatanKabController::class, 'get_pegawai_detail'])->name('kegiatan.kabkot.pegawai.get_detail');
                Route::post('penilaianUpdate', [App\Http\Controllers\KegiatanKabController::class, 'penilaian_update'])->name('kegiatan.kabkot.penilaian.update');
                Route::post('update', [App\Http\Controllers\KegiatanKabController::class, 'update'])->name('kegiatan.kabkot.update');
                Route::post('destroy', [App\Http\Controllers\KegiatanKabController::class, 'destroy'])->name('kegiatan.kabkot.destroy');
                Route::get('detail/{id_kegiatan}', [App\Http\Controllers\KegiatanKabController::class, 'detail'])->name('kegiatan.kabkot.detail');

                Route::post('edit_file', [App\Http\Controllers\KegiatanKabController::class, 'edit_file'])->name('kegiatan.kabkot.file.edit');
                Route::post('store_file', [App\Http\Controllers\KegiatanKabController::class, 'store_file'])->name('kegiatan.kabkot.file.store');
                Route::post('destroy_file', [App\Http\Controllers\KegiatanKabController::class, 'destroy_file'])->name('kegiatan.kabkot.file.destroy');
            });
        });
        Route::prefix('setting')->group(function () {
            Route::get('getunker', [App\Http\Controllers\SettingController::class, 'getUnker'])->name('get.unker');
        });
        Route::prefix('user')->group(function () {
            Route::get('', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
            Route::post('store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
            Route::post('edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
            Route::post('update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
            Route::post('destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
        });

    });
});
