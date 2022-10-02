<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengurus = DB::table('penguruses')->count();
        $kegiatan = DB::table('kegiatans')->count();
        $lacon = DB::table('lacons')->count();
        $jkegiatan = DB::table('jeniskegiatans')->count();
        return view('dashboard.index', compact('kegiatan','pengurus','lacon','jkegiatan'));
    }


    public function keuangan()
    {
        $sumPemasukanMesjid =  DB::table('mesjids')->sum('pemasukan');
        $sumPengeluaranMesjid =  DB::table('mesjids')->sum('pengeluaran');
        $jumlahMesjid = $sumPemasukanMesjid -  $sumPengeluaranMesjid;
        $sumPemasukanSosial =  DB::table('sosials')->sum('pemasukan');
        $sumPengeluaranSosial =  DB::table('sosials')->sum('pengeluaran');
        $jumlahSosial = $sumPemasukanSosial -  $sumPengeluaranSosial;
        $sumPemasukanYatim =  DB::table('yatims')->sum('pemasukan');
        $sumPengeluaranYatim =  DB::table('yatims')->sum('pengeluaran');
        $jumlahYatim = $sumPemasukanYatim -  $sumPengeluaranYatim;
        return view('keuangan.index', compact(
            'sumPemasukanMesjid','sumPengeluaranMesjid','jumlahMesjid',
            'sumPemasukanSosial','sumPengeluaranSosial','jumlahSosial',
            'sumPemasukanYatim','sumPengeluaranYatim','jumlahYatim',
        ));
    }
}
