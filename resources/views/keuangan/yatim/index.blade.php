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
@can('yatim_create')
<a href="{{ route('yatim.create') }}" class="btn btn-dark mt-9 float-end">Tambah Data</a>
@endcan
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
                    @can('yatim_update')
                    <a href="{{ route('yatim.edit', ['yatim' => $sah]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    @endcan
                    @can('yatim_delete')
                    <form action="{{ route('yatim.destroy', ['yatim' => $sah]) }}" method="POST" class="d-inline">
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
