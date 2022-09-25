<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanKegiatanController extends Controller

{
    public function kegiatan(){ 
    return view('laporan.keuangan.kegiatan');
    }
}
