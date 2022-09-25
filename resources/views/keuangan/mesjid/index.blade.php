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
    <center><h2 class="text-light">Data Keuangan Mesjid</h2></center>
    @can('mesjid_create')
    <a href="{{ route('mesjid.create') }}" class="btn btn-dark mt-9 float-end">Tambah Data</a>
    @endcan
  {{-- <div class="card" >
    {{ $sumPemasukan }} Ini Pemasukan <br>
    {{ $sumPengeluaran }} Ini Pengeluaran <br>
    {{ $jumlah }} Ini Total <br>
</div> --}}
@endsection
@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <div class="card-body">
        <div class="table-responsive p-0">
            <table class="table align-items-center mt-7">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Penulis</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Kegiatan</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pemasukan Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pengeluaran Kas</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                        <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($AziziShafaaAsadel as $sah)
                    <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $sah->tgl }}</td>
                    <td class="text-center">{{ $sah->pengurus->nama }}</td>
                    <td class="text-center">{{ $sah->kegiatan->nama }}</td>
                    <td class="text-center">{{ $sah->pemasukan }}</td>
                    <td class="text-center">{{ $sah->pengeluaran }}</td>
                    <td class="text-center">{{ $sah->keterangan }}</td>
                    <td class="text-center">
                    @can('mesjid_update')
                    <a href="{{ route('mesjid.edit', ['mesjid' => $sah]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    @endcan
                    @can('mesjid_delete')
                    <form action="{{ route('mesjid.destroy', ['mesjid' => $sah]) }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apa kamu yakin menghapus data ini Nah Ayoloh')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    @endcan
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
