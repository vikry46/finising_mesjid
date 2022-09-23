<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosial;

class LaporanSosialController extends Controller
{
    public function index()
    {
        $sosial = Sosial::all();
        return view('laporan.index',compact('sosial'));
    }
}
