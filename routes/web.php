<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LaconController;
use App\Http\Controllers\JeniskegiatanController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\MesjidController;
use App\Http\Controllers\YatimController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanSosialController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/telegram', [TelegramContoller::class, 'test']);


Auth::routes([
    'register' => false
]);

// Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::group(['prefix' => '/dashboard'], function(){


        Route::resource('/kegiatan', KegiatanController::class);
        Route::post('/kegiatan_ajax', [KegiatanController::class, 'ajax']);
        Route::get('/single_kegiatan', [KegiatanController::class, 'singleKegiatan']);
        Route::post('/kegiatan/delete', [KegiatanController::class, 'destroy'])->name('kegiatan.delete');
        Route::post('/kegiatan/ubah', [KegiatanController::class, 'ubah'])->name('kegiatan.ubah');

        Route::resource('/pengurus', PengurusController::class);
        Route::resource('/jabatan', JabatanController::class);
        Route::resource('/lacon', LaconController::class);
        Route::resource('/jeniskegiatan', JeniskegiatanController::class);
        Route::resource('/role', RoleController::class);
        Route::resource('/users', UserController::class);


        // Bagian keuangan mesjid
        Route::group(['prefix' => '/keuangan'], function(){
            Route::get('/', [DashboardController::class, 'keuangan'])->name('keuangan');
            Route::resource('/sosial', SosialController::class);
            Route::resource('/mesjid', MesjidController::class);
            Route::resource('/yatim', YatimController::class);
        });

        //laporan
        Route::group(['prefix'=>'laporan'], function(){
            Route::get('/sosial', [LaporanSosialController::class,'index']);
            Route::get('/mesjid', [MesjidController::class,'mesjid']);
            Route::get('/yatim', [YatimController::class,'yatim']);
        });
});

