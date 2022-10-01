@extends('layouts.backend')

@section('title')
    Keuangan Mesjid | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan Mesjid
@endsection

@section('bg-color')
    background-color:#8FD6E1;
@endsection

@section('breadcrumbs')
    Keuangan
@endsection

@section('content-header')

@endsection
@section('content')
<h2><center>Laporan Keungan Mesjid</center></h2>
<div class="card mt-9" style="background-color: #EAF6F6">
    <a href="{{ route('informasi.t') }}" class="btn btn-dark mt-5  float-end">Kembali</a>
    <div class="card-body">
        <div class="row">
            <form action="{{ route('mesjid.t') }}" method="GET">
                <div class="input-group ">
                    <input type="date"  value="{{ request()->get('start_date') }}" class="form-control mx-2" name="start_date">
                    <input type="date"  value="{{ request()->get('end_date') }}"  class="form-control mx-2" name="end_date">
                    <button class="btn btn-warning btn-md mx-3" type="submit">Cari</button>
                </div>
            </form>
        </div>
        <div class="table-responsive p-0">
            <table class="table align-items-center mt-4 ">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama kegitan</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Penulis</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pemasukan Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pengeluaran Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $sah)
                    <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $sah->tgl }}</td>
                    <td class="text-center">{{ $sah->kegiatan->nama }}</td>
                    <td class="text-center">{{ $sah->pengurus->nama }}</td>
                    <td class="text-center">{{ $sah->pemasukan }}</td>
                    <td class="text-center">{{ $sah->pengeluaran }}</td>
                    <td class="text-center">{{ $sah->keterangan }}</td>
                    {{-- <td class="text-center"> --}}
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br>
            <table>
                <tbody>
                    <tr>
                        <td>
                            Total Pemasukan 
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $sumpemasukan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Total Pengeluaran 
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $sumpengeluaran }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sisa Kas 
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $sisa }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <div class="float-end">
                    <p class="">Kamang Hilir, {{ $waktu_sekarang }} <p>
                    <p class="mx-6">Pengurus</p><br><br><br>

                    <p class="mx-5">{{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    