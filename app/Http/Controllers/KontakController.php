<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use RealRashid\SweetAlert\Facades\Alert;

class KontakController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kontak_delete',['only' => 'delete']);
    }   
    public function index()
    {
        $kontak= Kontak::all();
        return view('kontak.index',compact('kontak'));
    }

    public function tambah()
    {
        return view('kontak');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required', 
            'email'=>'required', 
            'masukan'=>'required', 
        ]);

        Kontak::create($validatedData);
        Alert::success('Terima kasih', 'Semoga hari anda menyenangkan!');
        return redirect()->back();        
    }

    public function delete($id)
    {
        Kontak::destroy($id);

         return redirect()->back();
    }
}
