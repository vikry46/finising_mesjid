@extends('layouts.backend')

@section('title')
    Yatim | {{ config('app.name') }}
@endsection

@section('title-page')
    Yatim
@endsection

@section('bg-color')
    background-color:#850E35;
@endsection

@section('breadcrumbs')
    Keuangan
@endsection

@section('content-header')
<center><h2 class="text-light">Data Keuangan Yatim</h2></center>
@endsection

@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <a href="{{ route('informasi.t') }}" class="btn btn-dark mt-9 float-end">Kembali</a>
    <div class="card-body">
        <div class="row">
            <form action="{{ route('yatim.t') }}" method="GET">
                <div class="input-group ">
                    <input type="date"  value="{{ request()->get('start_date') }}" class="form-control mx-2" name="start_date">
                    <input type="date"  value="{{ request()->get('end_date') }}"  class="form-control mx-2" name="end_date">
                    <button class="btn btn-warning btn-md mx-3" type="submit">Cari</button>
                </div>
            </form>
        </div>
        <div class="table-responsive p-0">
            <table class="table align-items-center mt-7">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Penulis</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pemasukan Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pengeluaran Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                        <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ShaniaGracia as $sah)
                    <tr>
                        <td class="text-center">{{ $sah->tgl }}</td>
                        <td class="text-center">{{ $sah->pengurus->nama }}</td>
                        <td class="text-center">{{ $sah->pemasukan }}</td>
                        <td class="text-center">{{ $sah->pengeluaran }}</td>
                        <td class="text-center">{{ $sah->keterangan }}</td>
                    <td class="text-center">
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
