@extends('layouts.backend')

@section('title')
    Jenis Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jenis Kegiatan
@endsection

@section('bg-color')
    background-color:#7D1935;
@endsection

@section('breadcrumbs')
    Jenis Kegiatan
@endsection

@section('content-header')
    <center><h2 class="text-light">Data Jenis Kegiatan</h2></center>
    <a href="{{ route('jeniskegiatan.create') }}" class="btn btn-dark mt-9 float-end">Tambah Data</a>
@endsection
@section('content')
<div class="card mt-9" style="background-color: #EAF6F6">
    <div class="card-body">
        <div class="table-responsive p-0">
            <table class="table align-items-center mt-7">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama Jenis Kegiatan</th>
                    <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deldel as $syg)
                    <tr>
                    <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $syg->jenis_kegiatan }}</td>
                    <td class="text-center">
                    <a href="{{ route('jeniskegiatan.edit', ['jeniskegiatan' => $syg]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('jeniskegiatan.destroy', ['jeniskegiatan' => $syg]) }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apa kamu yakin menghapus data ini Nah Ayoloh')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
