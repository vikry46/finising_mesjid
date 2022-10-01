<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:laporan_show',['only' => 'index']);
    }
    public function index()
    {
        return view('laporan.laporan');
    }
}
