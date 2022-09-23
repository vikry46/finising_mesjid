@extends('layouts.backend')

@section('title')
    Lacon | {{ config('app.name') }}
@endsection

@section('title-page')
    Lacon
@endsection

@section('bg-color')
    background-color:#787A91;
@endsection

@section('breadcrumbs')
    Lacon
@endsection

@section('content-header')
<center><h2 class="text-light">Data Lacon</h2></center>
@can('lacon_create')
<a href="{{ route('lacon.create') }}" class="btn btn-dark mt-9 float-end">Tambah Data</a>
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
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                        <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lacon as $del)
                    <tr>
                    <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $del->nama }}</td>
                    <td class="text-center">{{ $del->alamat }}</td>
                    <td class="text-center">{{ $del->keterangan }}</td>
                    <td class="text-center">
                    @can('lacon_update')
                    <a href="{{ route('lacon.edit', ['lacon' => $del]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    @endcan
                    @can('lacon_delete')
                    <form action="{{ route('lacon.destroy', ['lacon' => $del]) }}" method="POST" class="d-inline">
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
