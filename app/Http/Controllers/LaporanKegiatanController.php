<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class LaporanKegiatanController extends Controller

{
    public function kegiatan(Request $request)
    { 
        if ($request->has('search')) {
            $kegiatan = Kegiatan::where('nama','LIKE','%'.$request->search. '%')->paginate(4);
        }else{
            $kegiatan = Kegiatan::paginate(4);
        }
    return view('laporan.kegiatan',compact('kegiatan'));
    }
}
