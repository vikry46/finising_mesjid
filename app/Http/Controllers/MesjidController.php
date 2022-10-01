<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Mesjid;
use App\Models\Pengurus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MesjidController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:mesjid_show',['only' => 'index']);
        $this->middleware('permission:mesjid_create',['only' => 'create','store']);
        $this->middleware('permission:mesjid_update',['only' => 'edit','update']);
        $this->middleware('permission:mesjid_delete',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AziziShafaaAsadel = Mesjid::all();
        return view('keuangan.mesjid.index',compact('AziziShafaaAsadel'));
    }

    public function mesjid()
    {
        $AziziShafaaAsadel = Mesjid::all();
        return view('laporan.mesjid',compact('AziziShafaaAsadel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.mesjid.create',[
            'pengurus' => Pengurus::all(),
            'kegiatan' => Kegiatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl' =>'required',
            'id_pengurus' =>'required',
            'id_kegiatan' =>'required',
            'pemasukan' =>'required',
            'pengeluaran' =>'required',
            'keterangan'=>'required',

        ],[
            'tgl.required'=>'Tanggal wajib diisi!',
            'id_pengurus.required'=>'Pengurus wajib diisi!',
            'id_kegiatan.required'=>'Kegiatan wajib diisi!',
            'pemasukan.required'=>'Pemasukan wajib diisi!',
            'pengeluaran.required'=>'Pengeluaran wajib diisi!',
            'keterangan.required'=>'Keterangan wajib diisi!',
        ]);

        Mesjid::create([
            'tgl' =>  $request->tgl,
            'id_pengurus' =>  $request->id_pengurus,
            'id_kegiatan' =>  $request->id_kegiatan,
            'pemasukan' =>  $request->pemasukan,
            'pengeluaran' =>  $request->pengeluaran,
            'keterangan' =>  $request->keterangan,
        ]);
        return redirect()->route('mesjid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesjid  $mesjid
     * @return \Illuminate\Http\Response
     */
    public function show(Mesjid $mesjid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesjid  $mesjid
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesjid $mesjid)
    {
        return view('keuangan.mesjid.edit',[
            'jinan' => $mesjid,
            'marsha' => Pengurus::all(),
            'kegiatan' => Kegiatan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesjid  $mesjid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesjid $mesjid)
    {
        $request->validate([
            'tgl'=>'required',

        ],[
            'tgl'.'required'=>'Tanggal Wajib di Isi',
        ]);
        Mesjid::where('id',$mesjid->id)->update([
            'tgl' =>  $request->tgl,
            'id_pengurus' =>  $request->id_pengurus,
            'pemasukan' =>  $request->pemasukan,
            'pengeluaran' =>  $request->pengeluaran,
            'keterangan' =>  $request->keterangan,
        ]);
        return redirect()->route('mesjid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesjid  $mesjid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesjid $mesjid)
    {
        Mesjid::destroy($mesjid->id);
        return redirect()->route('mesjid.index');
    }
}
