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
use App\Http\Controllers\LaporanKegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\DB;
use App\Models\Mesjid;
use App\Models\Yatim;
use App\Models\Kegiatan;


use Carbon\Carbon;
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
Route::get('/about', function () {
    return view('about');
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
            Route::get('/sosial', [LaporanSosialController::class,'index'])->name('sosial.t');
            // Route::get('/mesjid', [MesjidController::class,'mesjid'])->name('mesjid.t');
            Route::get('/dashboard/laporan/pemesanan', function () {
                if (request()->start_date || request()->end_date) {
                    $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
                    $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
                    $data = Mesjid::whereBetween('tgl',[$start_date,$end_date])->get();
                    $sumpemasukan = Mesjid::whereBetween('tgl',[$start_date,$end_date])->sum('pemasukan');
                    $sumpengeluaran = Mesjid::whereBetween('tgl',[$start_date,$end_date])->sum('pengeluaran');
                } else {
                    $sumpemasukan = DB::table("mesjids")->sum('pemasukan');
                    $sumpengeluaran = DB::table("mesjids")->sum('pengeluaran');
                    $data = Mesjid::latest()->get();
                }
                    $sisa = $sumpemasukan - $sumpengeluaran;
                    $waktu_sekarang = Carbon::now()->isoFormat('dddd, D MMM Y');
                return view('laporan.mesjid', compact('data','sumpemasukan','sumpengeluaran','sisa','waktu_sekarang'));
            })->name('mesjid.t');
            // Route::get('/yatim', [YatimController::class,'yatim'])->name('yatim.t');
            Route::get('/dashboard/laporan/yatim', function () {
                if (request()->start_date || request()->end_date) {
                    $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
                    $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
                    $ShaniaGracia = Yatim::whereBetween('tgl',[$start_date,$end_date])->get();
                    $sumpemasukan = Yatim::whereBetween('tgl',[$start_date,$end_date])->sum('pemasukan');
                    $sumpengeluaran = Yatim::whereBetween('tgl',[$start_date,$end_date])->sum('pengeluaran');
                } else {
                    $sumpemasukan = DB::table("yatims")->sum('pemasukan');
                    $sumpengeluaran = DB::table("yatims")->sum('pengeluaran');
                    $ShaniaGracia = Yatim::latest()->get();
                }
                    $sisa = $sumpemasukan - $sumpengeluaran;
                return view('laporan.yatim', compact('ShaniaGracia','sumpemasukan','sumpengeluaran','sisa'));
            })->name('yatim.t');
            Route::get('/kegiatan', [LaporanKegiatanController::class,'kegiatan'])->name('kegiatan.t');
            Route::get('/informasi', [LaporanController::class,'index'])->name('informasi.t');
        });
        Route::get('/kontak', [KontakController::class,'index'])->name('kontak');
        Route::get('/kontak/hapus/{id}', [KontakController::class,'delete'])->name('kontak.hapus');
});

Route::get('/kontak/tambah', [KontakController::class,'tambah'])->name('kontak.tambah');
Route::post('/kontak/store', [KontakController::class,'store'])->name('kontak.store');

