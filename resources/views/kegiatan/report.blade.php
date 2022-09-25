@extends('layouts.backend')

@section('title')
    Report Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Report Kegiatan
@endsection

@section('bg-color')
    background-color:#2B4865;
@endsection

@section('breadcrumbs')
    Kegiatan
@endsection

@section('content-header')
<center><h2 class="text-light">Report Kegiatan</h2></center>

<div class="card mt-9" style="background-color: #EAF6F6">
    <div class="card-body">
        <div class="table-responsive p-0">
            <table class="table align-items-center mt-7">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Mulai</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Selesai</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama Kegiatan</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Jenis Kegiatan</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Imam</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Penceramah</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pengurus</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kegiatan as $syg)
                    <tr>
                    <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $syg->tgl_mulai }}</td>
                    <td class="text-center">{{ $syg->tgl_selesai }}</td>
                    <td class="text-center">{{ $syg->nama }}</td>
                    <td class="text-center">{{ $syg->jeniskegiatan->jenis_kegiatan }}</td>
                    <td class="text-center">{{ $syg->lacon->nama }}</td>
                    <td class="text-center">{{ $syg->penceramah->nama }}</td>
                    <td class="text-center">{{ $syg->pengurus->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container">
                <a href="{{ route('kegiatan.index') }}" class="btn btn-dark float-end" style="background-color:#2B4865; color:white">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
